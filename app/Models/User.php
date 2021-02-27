<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama', 'email', 'password', 'role', 'status_aktif'];
    public function alamat()
    {
        return $this->belongsTo('App\Models\AlamatUser');
    }
}
