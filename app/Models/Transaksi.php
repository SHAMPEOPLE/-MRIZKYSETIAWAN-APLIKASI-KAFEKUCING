<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'total_harga',
        'bayar',
        'kembalian',
        'tanggal_transaksi',
    ];

    // Relasi ke TransaksiItem
    public function items()
    {
        return $this->hasMany(TransaksiItem::class);
    }

    // Relasi ke User (kasir)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

