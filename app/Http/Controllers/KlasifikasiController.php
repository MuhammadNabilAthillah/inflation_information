<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::paginate('10');
        $title = 'Hapus Klasifikasi!';
        $text = "Apakah anda yakin akan menghapus data ini?";
        confirmDelete($title, $text);
        return view('pages.dashboard.klasifikasi.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $request->validate([
                'nama' => 'required|string',
            ]);

            Klasifikasi::create([
                'nama' => $request->nama,
            ]);

            Alert::success('Success', 'Klasifikasi berhasil dibuat');

            return redirect('/dashboard/klasifikasi');
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
        $klasifikasi = Klasifikasi::find($id);

        return view('pages.dashboard.klasifikasi.edit', compact('klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $klasifikasi = Klasifikasi::find($id);

        if (!$klasifikasi) {
            Alert::error('Error', 'Klasifikasi tidak ditemukan');

            return redirect('/dashboard/klasifikasi');
        }

        $klasifikasi->update([
            'nama' => $request->nama,
        ]);

        Alert::success('Success', 'Klasifikasi berhasil diupdate');

        return redirect('/dashboard/klasifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $klasifikasi = Klasifikasi::find($id);

        $klasifikasi->delete();

        Alert::success('Success', 'Klasifikasi berhasil dihapus');

        return redirect()->back();
    }
}
