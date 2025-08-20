<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProses(Request $request)
    {
        $request -> validate([
            'email' => ['required'],
            'password' => ['required', 'min:8'],
        ], [
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password arus di isi',
            'password.min' => 'Minimal password 8 karakter',
        ]);
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Password atau Email Salah');
        }
}
    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome')->with('success', 'Anda berhasil logout');
    }
}