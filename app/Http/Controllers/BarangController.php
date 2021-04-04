<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('admin.barang.index', compact('barang', 'kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['kode_barang'] = time();
        $create = Barang::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
        // return response()->json($data);
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }
    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $data = $request->except('_token');
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function searchProduct()
    {
        $barang = Barang::query();
        $search  = request()->query('search');
        $barang->when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
        return view('users.partials.product', ['barang' => $barang->get()]);
    }
}
