<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AlamatUser;
use App\Models\DetailTransaksi;
use App\Models\Rekening;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        // dd(Session('transaksi'));
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
        $alamat = AlamatUser::with('user')->where('users_id', auth()->user()->id)->first();
        $rekening = Rekening::all();
        return view('users.checkout.index_checkout', compact('alamat', 'provinsi', 'kabupaten', 'kecamatan', 'rekening'));
    }
    public function pushTransaksi()
    {
        if (request()->session()->exists('transaksi')) {
            $data = request()->session()->get('transaksi');
            if (request()->input('isAlamat')) {
                $data['alamat'] = request()->except(['_token', 'isAlamat']);
                request()->session()->put('transaksi', $data);
            } else if (request()->input('isPengeriman')) {
                $data['pengiriman'] = request()->except(['_token', 'isPengeriman']);
                request()->session()->put('transaksi', $data);
            } else if (request()->input('isPembayaran')) {
                //action for submit data to database
                $dataPembayaran = request()->except('_token', 'isPembayaran');
                $dateNow = date('Y-m-d h:i:s');
                $datetime   = new DateTime("$dateNow + 2 day");
                $batas = $datetime->format('Y-m-d h:m:s');
                $kodeUnik = rand(100, 999);
                $dataPembayaran['kode_unik'] = $kodeUnik;
                $dataPembayaran['batas_pembayaran'] = $batas;
                $data['pembayaran'] = $dataPembayaran;
                request()->session()->put('transaksi', $data);
                //action for submit data to database
                DB::beginTransaction();
                try {
                    $transaksi = new Transaksi();
                    $transaksi->users_id = $data['user_id'];
                    $transaksi->alamat_user_id = $data['alamat']['alamat_id'];
                    $transaksi->alamat_user_id = $data['alamat']['alamat_id'];
                    $transaksi->rekening_id = $data['pembayaran']['rekening_id'];
                    $transaksi->invoice = time();
                    $transaksi->status = 'pending';
                    $transaksi->kode_unik = $data['pembayaran']['kode_unik'];
                    $transaksi->kurir = $data['pengiriman']['kurir'];
                    $transaksi->jenis_pengiriman = $data['pengiriman']['jenis_pengiriman'];
                    $transaksi->atas_nama = $data['pembayaran']['atas_nama'];
                    $transaksi->nomer_rekening = $data['pembayaran']['nomer_rekening'];
                    $transaksi->batas_pembayaran = $data['pembayaran']['batas_pembayaran'];
                    $transaksi->catatan = $data['catatan'];
                    $transaksi->tagihan = (int) preg_replace("/[^0-9]/", '', $data['total']);
                    $transaksi->save();
                    foreach ($data['barang'] as $barang) {
                        DetailTransaksi::create([
                            'transaksi_id' => $transaksi->id,
                            'barang_id' => $barang['id'],
                            'nama_barang' => $barang['nama'],
                            'jumblah' => $barang['qty'],
                            'harga' => $barang['harga'],
                            'kondisi' => $barang['kondisi'],
                            'berat' => $barang['berat'],
                        ]);
                    }
                    AlamatUser::where('id', $data['alamat']['alamat_id'])->update([
                        'nama_penerima' => $data['alamat']['nama_penerima'],
                        'kecamatan' => $data['alamat']['kecamatan'],
                        'kabupaten' => $data['alamat']['kabupaten'],
                        'kode_pos' => $data['alamat']['kode_pos'],
                        'provinsi' => $data['alamat']['provinsi'],
                        'kab_id' => $data['alamat']['kabupaten_id'],
                        'prov_id' => $data['alamat']['provinsi_id'],
                        'nomer_hp' => $data['alamat']['nomer_hp'],
                        'patokan' => $data['alamat']['patokan'],
                        'alamat' => $data['alamat']['alamat'],
                    ]);
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'id_transaksi' => $transaksi->id
                    ]);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json([
                        'status' => false,
                    ]);
                }
                //end iaction to database
                return response()->json($data);
            }
            return response()->json($data);
        } else {
            return response()->json(false);
        }
    }
    public function checkCostRajaongkir()
    {
        if (request()->session()->exists('transaksi')) {
            $dataTransaksi = request()->session()->get('transaksi');
            $dataCost = getCost($dataTransaksi['alamat']['kabupaten_id'], $dataTransaksi['totalBerat'], request()->input('kurir'));
            return response()->json($dataCost);
        } else {
            return response()->json(false);
        }
    }
}
