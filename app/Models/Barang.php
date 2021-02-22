<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['kategori_id', 'nama', 'kode_barang', 'status_aktif', 'harga', 'deskripsi', 'kondisi', 'berat'];
    public function kategori()
    {
        return $this->belongsTo('App\Modles\Kategori');
    }
}
