<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Barang;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $create = Kategori::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }
    public function update($id, Request $request)
    {
        $barang = Kategori::find($id);
        $data = $request->except('_token');
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
