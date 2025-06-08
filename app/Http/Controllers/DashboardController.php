<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail_penjualan;
use App\Models\Supplier;
use App\Models\Pembeli;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(){
        $jumlahBarang = Barang::count();
        $jumlahSupplier = Supplier::count();
        $totalHarga = Detail_penjualan::sum('total_harga');
        $jumlahPembeli = Pembeli::count();
        $jumlahPenjualan = Detail_penjualan::count();
        return view('dashboard',compact('jumlahBarang','jumlahSupplier','jumlahPembeli','jumlahPenjualan','jumlahPenjualan','totalHarga'));
    }
}