<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%');
        }

        $supplier = $query->get();
        $jumlahSupplier = $supplier->count();

        return view('supplier.index', compact('supplier', 'jumlahSupplier'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'kode_pos'=>'required',
        ]);
        Supplier::create([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'kode_pos'=>$request->kode_pos,
        ]);

        return redirect()->route('supplier.index')->with('success','Berhasil tambah data!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'kode_pos'=>'required',
        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'kode_pos'=>$request->kode_pos,
        ]);
        return redirect()->route('supplier.index')->with('success','Berhasil update data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success','Berhasil hapus data!');
    }
}