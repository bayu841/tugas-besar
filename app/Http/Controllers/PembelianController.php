<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Pembeli;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Pembelian::with(['barang', 'supplier']);

    if ($request->has('search') && $request->search != '') {
        $query->whereHas('barang', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        })->orWhereHas('supplier', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    $pembelian = $query->get();

    return view('pembelian.index', compact('pembelian'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.create',compact('barang','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id'=>'required',
            'supplier_id'=>'required',
            'jumlah'=>'required|integer|min:1',
            'tanggal'=>'required|date',
            'status'=>'required|string',
        ]);

        Pembelian::create($request->all());
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('pembelian.index')->with('success','Berhasil tambah data !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        $pembelian->load(['barang', 'supplier']);
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.edit',compact('pembelian','barang','supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'barang_id'=>'required',
            'supplier_id'=>'required',
            'jumlah'=>'required|integer|min:1',
            'tanggal'=>'required|date',
            'status'=>'required|string',
        ]);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success','Berhasil update data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success','Berhasil hapus data !');
    }
}