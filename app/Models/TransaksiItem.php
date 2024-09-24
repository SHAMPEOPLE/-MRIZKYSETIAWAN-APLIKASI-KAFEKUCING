<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'item_id',
        'item_type',
        'jumlah',
        'harga',
        'subtotal',
    ];

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    // Polymorphic relation ke item (barang, makanan, minuman)
    public function item()
    {
        return $this->morphTo();
    }
}
