<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Pembeli;
use App\Models\Penjualan;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Penjualan::with(['pembeli', 'kasir']);

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('pembeli', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $penjualan = $query->get();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembeli = Pembeli::all();
        $kasir = Kasir::all();
        return view('penjualan.create',compact('pembeli','kasir'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pembeli_id'=>'required|exists:pembeli,id',
            'kasir_id'=>'required|exists:kasir,id',
            'tanggal_pesan'=>'required|date',
        ]);
        Penjualan::create($request->all());
        return redirect()->route('penjualan.index')->with('success','Berhasil tambah data !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
      $penjualan->load(['pembeli','kasir']);
      return view('penjualan.show',compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $pembeli = Pembeli::all();
        $kasir = Kasir::all();
        return view('penjualan.edit',compact('penjualan','pembeli','kasir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'pembeli_id'=>'required|exists:pembeli,id',
            'kasir_id'=>'required|exists:kasir,id',
            'tanggal_pesan'=>'required|date',
        ]);

        $penjualan->update($request->all());
        return redirect()->route('penjualan.index')->with('success','Berhasil update data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success','Berhasil hapus data !');
    }
}