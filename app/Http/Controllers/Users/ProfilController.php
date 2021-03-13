<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index($id)
    {
        $provinsi = getProvinces();
        $kabupaten = getCities();
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "Cookie: foo=bar\r\n"
            )
        );

        $context = stream_context_create($opts);
        $kecamatan = json_decode(file_get_contents(public_path('kecamatan.json'), false, $context));
        $user = User::with('alamat')->find($id);
        return view('users.profil.index', compact('user', 'provinsi', 'kabupaten', 'kecamatan'));
    }
}
