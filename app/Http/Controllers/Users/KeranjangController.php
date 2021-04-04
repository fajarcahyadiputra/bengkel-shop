<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\AlamatUser;
use App\Models\Barang;
use App\Models\FotoBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeranjangController extends Controller
{
    public function index($id)
    {
        $keranjang = null;
        if (request()->session()->exists('barang')) {
            $keranjang = request()->session()->get('barang');
        }
        $alamat = AlamatUser::where('users_id', $id)->first();
        return view('users.keranjang.index_keranjang', compact('keranjang', 'alamat'));
    }
    public function addToCart($id)
    {
        $barang = Barang::find($id);
        $dataBarang = [
            'user_id' => auth()->user()->id,
            'id'   => $id,
            'foto' => FotoBarang::where('barang_id', $id)->first(),
            'nama' => $barang->nama,
            'harga' => $barang->harga,
            'berat' => $barang->berat,
            'kondisi' => $barang->kondisi,
            'kode_barang' => $barang->kode_barang,
            'qty'  => 1
        ];

        if (request()->session()->exists('barang')) {
            foreach (request()->session()->get('barang') as $br) {
                // if ($br['user_id'] != auth()->user()->id) {
                //     request()->session()->push('barang', $dataBarang);
                // } else {

                // }
                if ($br['id'] == $barang->id) {
                    return response()->json(false);
                }
                request()->session()->push('barang', $dataBarang);
            }
        } else {
            request()->session()->put('barang', []);
            request()->session()->push('barang', $dataBarang);
        }
        return response(true);
    }
    public function addQty()
    {
        $sessionBarang = [];
        $subTotal = 0;
        $total = 0;
        if (request()->session()->exists('barang')) {
            foreach (request()->session()->get('barang') as $br) {
                $subTotal += $br['harga'] * request()->input('qty');
                $total   += $br['harga'] * request()->input('qty');
                if ($br['id'] == request()->input('id')) {
                    $br['qty'] = request()->input('qty');
                }
                array_push($sessionBarang, $br);
            }
        }
        request()->session()->put('barang', $sessionBarang);
        return response()->json(['total' => $total, 'subtotal' => $subTotal]);
    }
    public function hapusBarang($id)
    {
        if (request()->session()->exists('barang')) {
            $dataSession = request()->session()->get('barang');
            foreach (request()->session()->get('barang') as $index => $br) {
                if ($br['id'] == $id) {
                    unset($dataSession[$index]);
                }
            }
            request()->session()->put('barang', $dataSession);
            return response()->json(true);
        }
        return response()->json(false);
    }
    public function goToCheckout()
    {
        if (request()->session()->exists('transaksi')) {
            request()->session()->forget('transaksi');
        }
        $transaksi = [];
        $transaksi['user_id'] = auth()->user()->id;
        Validator::make(request()->all(), [
            'catatan' => 'string'
        ]);
        if (request()->session()->has('barang')) {
            $transaksi['barang'] = request()->session()->get('barang');
        }
        $transaksi['subtotal'] = request()->input('subtotal');
        $transaksi['total'] = request()->input('total');
        $transaksi['catatan'] = request()->input('catatan');
        $transaksi['totalBerat'] = request()->input('totalBerat');
        request()->session()->put('transaksi', $transaksi);
        return redirect('/proses-checkout');
    }
}
