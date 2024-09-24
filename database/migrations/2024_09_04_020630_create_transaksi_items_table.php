<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiItemsTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('item_id'); // ID dari barang, makanan, atau minuman
            $table->string('item_type'); // Tipe item: 'barang', 'makanan', 'minuman'
            $table->integer('jumlah');
            $table->decimal('harga', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();

            // Relasi ke tabel transaksis
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_items');
    }
}
