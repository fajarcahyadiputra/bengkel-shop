<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $rekening = Rekening::find($id);
        return response()->json($rekening);
    }
    public function update($id, Request $request)
    {
        $rekening = Rekening::find($id);
        $data = $request->except('_token');
        $rekening->fill($data);
        if ($rekening->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function editFoto(Request $request)
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
                $request->foto->move(public_path('foto/rekening'), $fileName);
                $edit = Rekening::where('id', $request->input('id'))->update([
                    'foto' => $fileName
                ]);
                if ($edit) {
                    unlink(public_path('foto/rekening/' . $request->input('foto_lama')));
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(false);
            }
        }
    }
}
