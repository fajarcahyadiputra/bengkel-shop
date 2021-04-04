<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = ['nama', 'jenis_kelamin', 'email', 'password', 'role', 'status_aktif', 'avatar'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function alamat()
    {
        return $this->belongsTo('App\Models\AlamatUser', 'users_id');
    }
}
