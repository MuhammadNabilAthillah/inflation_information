<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SektorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sektors = Sektor::paginate('10');
        $title = 'Hapus Sektor!';
        $text = "Apakah anda yakin akan menghapus data ini?";
        confirmDelete($title, $text);
        return view('pages.dashboard.sektor.index', compact('sektors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.sektor.create');
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
    
            Sektor::create([
                'nama' => $request->nama,
            ]);
    
            Alert::success('Success', 'Sektor berhasil dibuat');
    
            return redirect('/dashboard/sektor');
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
        $sektor = Sektor::find($id);

        return view('pages.dashboard.sektor.edit', compact('sektor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sektor = Sektor::find($id);

        if(!$sektor) {
            Alert::error('Error', 'Sektor tidak ditemukan');
    
            return redirect('/dashboard/sektor');
        }

        $sektor->update([
            'nama' => $request->nama,
        ]);

        Alert::success('Success', 'Sektor berhasil diupdate');
    
        return redirect('/dashboard/sektor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sektor = Sektor::find($id);

        $sektor->delete();

        Alert::success('Success', 'Sektor berhasil dihapus');
    
        return redirect()->back();
    }
}
