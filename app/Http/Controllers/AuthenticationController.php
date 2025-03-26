<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginAction(Request $request) {
        try {
            //code...
            $validated = $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);

            $remember = $request->has('remember-me');

            if (Auth::attempt($validated, $remember)) {
                Alert::success('Success', 'Login Berhasil');
                return redirect('/dashboard');
            } else {
                Alert::error('Error', 'Email atau password salah');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
