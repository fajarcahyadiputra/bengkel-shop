<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class HomeController extends Controller
{
    public $kategori;
    public function __construct()
    {
        $this->kategori = Kategori::get();
    }

    public function index()
    {
        $data = (object) [
            "barang" => Barang::with("foto_barang")->get(),
            "kategori" => $this->kategori
        ];
        // dd($data);
        return view("users.index", compact("data"));
    }

    public function kategoris($id)
    {

        $data = (object) [
            "barang" => Barang::with(["foto_barang", "kategori"])->where(["kategori_id" => $id])->get(),
            "kategoriCurrent" => Kategori::where(["id" => $id])->first(),
            "kategori" => $this->kategori
        ];
        // dd($data);
        return view("users.kategori", compact("data"));
    }
}