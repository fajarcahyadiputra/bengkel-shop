<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlamatUser extends Model
{
    protected $table = 'alamat_user';
    protected $fillable = ['users_id', 'nama_penerima', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos', 'nomer_hp', 'patokan', 'kab_id', 'prov_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
