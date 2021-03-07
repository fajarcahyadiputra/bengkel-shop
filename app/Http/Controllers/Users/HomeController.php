<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class HomeController extends Controller
{

    public function index()
    {
        $data = (object) [
            "barang" => Barang::with("foto_barang")->get(),
            "kategori" => Kategori::get()
        ];
        // dd($data);
        return view("users.index", compact("data"));
    }
}
