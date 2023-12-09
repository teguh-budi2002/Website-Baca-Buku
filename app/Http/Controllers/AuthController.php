<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $redirectTo = '/admin';
    
    public function login() {
        return view("Login");
    }

    public function loginProcess(Request $request) { 
        $validation = $request->validate([ 
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Tidak Boleh Kosong.',
            'password.required' => 'Password Tidak Boleh Kosong.'
        ]);

        $remember_me = $request->remember_me ? true : false;
        if (Auth::attempt($validation, $remember_me)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        toastr()->error('Username Atau Password Salah!', 'LOGIN GAGAL');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        
        toastr()->error('Logout Berhasil', 'LOGOUT');
        return redirect('/login');
    }
}
