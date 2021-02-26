<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $fillable = ['transaksi_id', 'nama_barang', 'jumblah', 'harga', 'berat', 'kondisi'];
}
