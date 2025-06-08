<?php

namespace App\Http\Controllers;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pembeli::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $pembeli = $query->get();
        $jumlahPembeli = $pembeli->count();

        return view('pembeli.index', compact('pembeli', 'jumlahPembeli'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|string|max:270',
            'jenis_kelamin'=>'required|in:laki_laki,perempuan',
            'alamat'=>'required|string',
            'no_hp'=>'required|string|max:20',
        ]);
        Pembeli::create([
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        ]);

        return redirect()->route('pembeli.index')->with('success', 'Berhasil tambah data !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit',compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required|string|max:270',
            'jenis_kelamin'=>'required|in:laki_laki,perempuan',
            'alamat'=>'required|string',
            'no_hp'=>'required|string|max:20',
        ]);
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->update([
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
        ]);
        return redirect()->route('pembeli.index')->with('success', 'Berhasil update data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.index')->with('success','Berhasil hapus data !');
    }
}