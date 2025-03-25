<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KomoditasController extends Controller
{
    public function index()
    {
        $komoditas = Komoditas::paginate('10');
        $title = 'Hapus Klasifikasi!';
        $text = "Apakah anda yakin akan menghapus data ini?";
        confirmDelete($title, $text);
        return view('pages.dashboard.komoditas.index', compact('komoditas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.komoditas.create');
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

            Komoditas::create([
                'nama' => $request->nama,
            ]);

            Alert::success('Success', 'Komoditas berhasil dibuat');

            return redirect('/dashboard/komoditas');
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
        $komoditas = Komoditas::find($id);

        return view('pages.dashboard.komoditas.edit', compact('komoditas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komoditas = Komoditas::find($id);

        if (!$komoditas) {
            Alert::error('Error', 'Klasifikasi tidak ditemukan');

            return redirect('/dashboard/komoditas');
        }

        $komoditas->update([
            'nama' => $request->nama,
        ]);

        Alert::success('Success', 'Komoditas berhasil diupdate');

        return redirect('/dashboard/komoditas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komoditas = Komoditas::find($id);

        $komoditas->delete();

        Alert::success('Success', 'Komoditas berhasil dihapus');

        return redirect()->back();
    }
}
