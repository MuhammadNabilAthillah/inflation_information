<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate('10');
        $title = 'Hapus User!';
        $text = "Apakah anda yakin akan menghapus data ini?";
        confirmDelete($title, $text);
        return view('pages.dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email'
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password')
            ]);
    
            Alert::success('Success', 'User berhasil dibuat');
    
            return redirect('/dashboard/user');
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
        $user = User::find($id);

        return view('pages.dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user) {
            Alert::error('Error', 'User tidak ditemukan');
    
            return redirect('/dashboard/user');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        Alert::success('Success', 'User berhasil diupdate');
    
        return redirect('/dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        Alert::success('Success', 'User berhasil dihapus');
    
        return redirect()->back();
    }
}
