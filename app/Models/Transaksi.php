<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['user_id', 'alamat_user_id', 'rekening_id', 'invoice', 'status', 'total_transfer', 'kode_unik', 'batas_pembayaran'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];
    public function user()
    {
        return $this->belongsTo('App\Modles\User');
    }
    public function alamat_user()
    {
        return $this->belongsTo('App\Models\AlamatUser', 'alamat_user_id');
    }
    public function rekening()
    {
        return $this->belongsTo('App\Models\Rekening');
    }
    public function detailTransaksi()
    {
        return $this->hasMany('App\Models\DetailTransaksi', 'transaksi_id');
    }
}
