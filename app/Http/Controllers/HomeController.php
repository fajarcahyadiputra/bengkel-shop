<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $jumblahTransaksi = Transaksi::all()->count();
        $jumblahBarang = Barang::all()->count();
        $jumblahUser = User::all()->count();
        return view('admin/dashboard', compact('jumblahTransaksi', 'jumblahBarang', 'jumblahUser'));
    }
}
