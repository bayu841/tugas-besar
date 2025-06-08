<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Detail_penjualan;
use App\Models\Penjualan;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


    class DetailjualController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            $query = Detail_penjualan::with(['penjualan', 'barang']);

            if ($request->has('search') && $request->search != '') {
                $query->whereHas('barang', function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%');
                });
            }

            $detail_penjualan = $query->get();
            $jumlahPenjualan = $detail_penjualan->count();
            $totalHarga = $detail_penjualan->sum('total_harga');

            return view('detailjual.index', compact('detail_penjualan', 'jumlahPenjualan', 'totalHarga'));
        }


        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $penjualan = Penjualan::all();
            $barang = Barang::all();
            return view('detailjual.create',compact('penjualan','barang'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                'penjualan_id'=>'required',
                'barang_id'=>'required',
                'jumlah'=>'required|integer|min:1',
                'total_harga'=>'required|numeric|min:0',
            ]);
            $barang = Barang::findOrFail($request->barang_id);

                if ($barang->stok < $request->jumlah) {
                    return redirect()->back()->withErrors(['jumlah' => 'Stok barang tidak mencukupi. Stok tersedia: ' . $barang->stok]);
                }

                Detail_penjualan::create($request->all());
                $barang->stok -= $request->jumlah;
                $barang->save();
                return redirect()->route('detailjual.index')->with('success', 'Berhasil tambah data!');
        }

        /**
         * Display the specified resource.
         */
        public function show($id)
        {
            $detail_penjualan = Detail_penjualan::with(['penjualan','barang'])->findOrFail($id);
            return view('detailjual.show', compact('detail_penjualan'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $detail_penjualan = Detail_penjualan::findOrFail($id);
            $penjualan = Penjualan::all();
            $barang = Barang::all();
            return view('detailjual.edit',compact('detail_penjualan','penjualan','barang'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Detail_penjualan $detail_penjualan)
        {
            $request->validate([
                'penjualan_id'=>'required',
                'barang_id'=>'required',
                'jumlah'=>'required|integer|min:1',
                'total_harga'=>'required|numeric|min:0',
            ]);
            $detail_penjualan->update($request->all());
            return redirect()->route('detailjual.index')->with('success', 'Berhasil update data!');

        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {
            $detail_penjualan = Detail_penjualan::findOrFail($id);
            $barang = $detail_penjualan->barang;


            $barang->stok += $detail_penjualan->jumlah;
            $barang->save();

            $detail_penjualan->delete();
            return redirect()->route('detailjual.index')->with('success', 'Berhasil hapus data!');
        }

        public function exportPdf()
{
            $data = Detail_penjualan::with(['penjualan', 'barang'])->get();
            $pdf = Pdf::loadView('detailjual.pdf', compact('data'));
            return $pdf->download('detailjual.pdf');
        }
    }