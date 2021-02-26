<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Rekening;
use Illuminate\Support\Facades\Validator;

class RekeningController extends Controller
{
    public function index(Request $request)
    {
        $rekening = Rekening::all();
        return view('admin.rekening.index', compact('rekening'));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $rule = [
                    'foto' => 'mimes:jpg,png,jpeg,gift|max:2000'
                ];
                $validate = validator::make($request->file(), $rule);
                if ($validate->fails()) {
                    return response()->json(false);
                }
                $data = $request->except('_token');
                $extension = $request->foto->extension();
                $fileName = time() . '-' . date('M') . "." . $extension;
                $request->foto->move(public_path('foto/rekening'), $fileName);
                $data['foto'] = $fileName;
                $newRekening = Rekening::create($data);
                if ($newRekening) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            }
        }
        return response()->json($request->all());
    }
    public function destroy($id, Request $request)
    {
        $rekening = Rekening::find($id);
        if ($rekening) {
            $rekening->delete();
            unlink(public_path('foto/rekening/' . $request->input('img')));
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
