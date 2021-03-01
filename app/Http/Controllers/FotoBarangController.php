<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\FotoBarang;
use Illuminate\Support\Facades\Validator;

class FotoBarangController extends Controller
{
    public function index($id)
    {
        $fotoBarang = FotoBarang::where('barang_id', $id)->get();
        $barang_id  = $id;
        return view('admin.barang.fotoBarang', compact('fotoBarang', 'barang_id'));
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
                $fileName = time() . '-' . date('M') . '.' . $request->foto->extension();
                $request->foto->move(public_path('foto/barang'), $fileName);
                $fotoBaru = FotoBarang::create([
                    'barang_id' => $request->input('id_barang'),
                    'foto'      => $fileName
                ]);
                if ($fotoBaru) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            }
        }
    }
    public function destroy($id)
    {
        $foto = FotoBarang::find($id);
        unlink(public_path('foto/barang/' . $foto->foto));
        if ($foto->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
