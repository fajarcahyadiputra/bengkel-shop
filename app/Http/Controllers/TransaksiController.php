<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }
    public function detailTransaksi($id)
    {
        $transaksi = Transaksi::with('rekening', 'detailTransaksi.barang.foto_barang')->find($id);
        return view('users.transaksi.detail_transkasi', compact('transaksi'));
    }
    public function buktiTransfer()
    {
        $transaksi = Transaksi::find(request()->input('id'));
        if ($transaksi->bukti_transfer != NULL) {
            unlink(public_path('foto/bukti_transfer/' . $transaksi->bukti_transfer));
        }
        if (request()->hasFile('bukti_transfer')) {
            if (request()->file('bukti_transfer')->isValid()) {
                $validate = Validator::make(request()->all(), [
                    'bukti_transfer' =>  'mimes:jpg,png,jpeg,gift|max:2000'
                ]);
                if ($validate->fails()) {
                    return response()->json(false);
                }
                $fileName =  time() . '-' . date('M') . '.' . request()->bukti_transfer->extension();
                request()->bukti_transfer->move(public_path('foto/bukti_transfer'), $fileName);
                $transaksi->fill([
                    'bukti_transfer' => $fileName
                ]);
                if ($transaksi->save()) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            }
        }
        return response()->json(false);
    }
    public function indexDetailTransaksi()
    {
        return view('users.transaksi.index_detail_transaksi');
    }
}
