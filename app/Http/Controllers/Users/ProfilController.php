<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($id)
    {
        $user = User::with('alamat')->find($id);
        return view('users.profil.index', compact('user'));
    }
}
