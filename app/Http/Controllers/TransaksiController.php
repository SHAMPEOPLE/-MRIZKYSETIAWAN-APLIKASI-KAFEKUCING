<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use App\Models\Barang;
use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('user')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $makanans = Makanan::all();
        $minumans = Minuman::all();

        return view('transaksi.create', compact('barangs', 'makanans', 'minumans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.type' => 'required|in:barang,makanan,minuman',
            'items.*.id' => 'required|integer',
            'items.*.jumlah' => 'required|integer|min:1',
            'bayar' => 'required|numeric|min:0',
        ]);

        // Mulai transaksi database
        \DB::beginTransaction();

        try {
            // Hitung total harga
            $total_harga = 0;
            $items = [];

            foreach ($request->items as $item) {
                switch ($item['type']) {
                    case 'barang':
                        $product = Barang::findOrFail($item['id']);
                        break;
                    case 'makanan':
                        $product = Makanan::findOrFail($item['id']);
                        break;
                    case 'minuman':
                        $product = Minuman::findOrFail($item['id']);
                        break;
                }

                $subtotal = $product->harga * $item['jumlah'];
                $total_harga += $subtotal;

                $items[] = [
                    'item_id' => $product->id,
                    'item_type' => $item['type'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $product->harga,
                    'subtotal' => $subtotal,
                ];

                // Kurangi stok
                if (isset($product->stok)) {
                    if ($product->stok < $item['jumlah']) {
                        throw new \Exception("Stok {$product->nama} tidak mencukupi.");
                    }
                    $product->stok -= $item['jumlah'];
                    $product->save();
                }
            }

            if ($request->bayar < $total_harga) {
                throw new \Exception("Jumlah bayar kurang dari total harga.");
            }

            $kembalian = $request->bayar - $total_harga;

            // Buat kode transaksi unik
            $kode_transaksi = 'TRX-' . strtoupper(Str::random(8));

            // Simpan transaksi
            $transaksi = Transaksi::create([
                'kode_transaksi' => $kode_transaksi,
                'user_id' => Auth::id(),
                'total_harga' => $total_harga,
                'bayar' => $request->bayar,
                'kembalian' => $kembalian,
                'tanggal_transaksi' => Carbon::now(),
            ]);

            // Simpan detail transaksi
            foreach ($items as $item) {
                $item['transaksi_id'] = $transaksi->id;
                TransaksiItem::create($item);
            }

            \DB::commit();

            return redirect()->route('transaksi.show', $transaksi->id)->with('success', 'Transaksi berhasil dilakukan.');
        } catch (\Exception $e) {
            \DB::rollback();
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('items.item', 'user');
        return view('transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
