<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\Data;
use App\Models\Klasifikasi;
use App\Models\Komoditas;
use App\Models\Sektor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Data::with(['sektor', 'komoditas', 'klasifikasi']);

        if ($request->filled('sektor')) {
            $query->where('id_sektor', $request->sektor);
        }

        if ($request->filled('komoditas')) {
            $query->where('id_komoditas', $request->komoditas);
        }

        if ($request->filled('klasifikasi')) {
            $query->where('id_klasifikasi', $request->klasifikasi);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $datas = $query->paginate(10);

        $sektors = Sektor::all();
        $komoditas = Komoditas::all();
        $klasifikasi = Klasifikasi::all();
        $tahun_list = Data::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin akan menghapus data ini?";
        confirmDelete($title, $text);

        return view('pages.dashboard.data.index', compact('datas', 'sektors', 'komoditas', 'klasifikasi', 'tahun_list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sektors = Sektor::all();
        $komoditas = Komoditas::all();
        $klasifikasi = Klasifikasi::all();
        return view('pages.dashboard.data.create', compact('sektors', 'komoditas', 'klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $request->validate([
                'tahun' => 'required|integer',
                'bulan' => 'required|integer',
                'minggu' => 'required|integer',
                'harga' => 'required|integer',
                'inflasi' => 'required|numeric',
                'sektor' => 'required|integer',
                'komoditas' => 'required|integer',
                'klasifikasi' => 'required|integer',
            ]);

            Data::create([
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'minggu' => $request->minggu,
                'harga' => $request->harga,
                'inflasi' => $request->inflasi,
                'id_sektor' => $request->sektor,
                'id_komoditas' => $request->komoditas,
                'id_klasifikasi' => $request->klasifikasi,
            ]);

            Alert::success('Success', 'Data berhasil dibuat');

            return redirect('/dashboard/data');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Data::find($id);

        return view('pages.dashboard.data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'bulan' => 'required|integer',
            'minggu' => 'required|integer',
            'harga' => 'required|integer',
            'inflasi' => 'required|numeric',
            'sektor' => 'required|integer',
            'komoditas' => 'required|integer',
            'klasifikasi' => 'required|integer',
        ]);

        $data = Data::find($id);

        if (!$data) {
            Alert::error('Error', 'Data tidak ditemukan');

            return redirect('/dashboard/data');
        }

        $data->update([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'minggu' => $request->minggu,
            'harga' => $request->harga,
            'inflasi' => $request->inflasi,
            'id_sektor' => $request->sektor,
            'id_komoditas' => $request->komoditas,
            'id_klasifikasi' => $request->klasifikasi,
        ]);

        Alert::success('Success', 'Data berhasil diupdate');

        return redirect('/dashboard/data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Data::find($id);

        $data->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect()->back();
    }

    public function export(Request $request)
    {
        return Excel::download(new DataExport($request->all()), 'data.xlsx');
    }
}
