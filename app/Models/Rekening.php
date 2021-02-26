<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekening';
    protected $fillable = ['atas_nama', 'nomer_rekening', 'nama_bank', 'foto'];
}
