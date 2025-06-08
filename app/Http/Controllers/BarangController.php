<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $barang = $query->get();
        $jumlahBarang = $barang->count();

        return view('barang.index', compact('barang', 'jumlahBarang'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'kategori_id'=>'required|exists:kategori,id',
            'stok'=>'required|integer',
            'harga'=>'required|numeric',
        ]);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        Barang::create($data);
        return redirect()->route('barang.index')->with('success','Berhasil tambah data !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.edit',compact('barang','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);
        $request->validate([
            'nama'=>'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'kategori_id'=>'required|exists:kategori,id',
            'stok'=>'required|integer',
            'harga'=>'required|numeric',
        ]);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }
        $barang->update($data);
        return redirect()->route('barang.index')->with('success','Berhasil update data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success','Berhasil hapus data !');
    }
}