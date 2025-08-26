<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        // Validasi input
        $validation = $request->validate([
            'name'     => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success-message', 'Anda Berhasil login.');
        }

        return redirect()->route('login')->with('error-message', 'Periksa Kembali nama atau password!');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard', [
                'kategori' => Category::get(),
                'berita'   => News::get(),
            ]);
        }

        return redirect()->route('login')->with('error-message', 'Anda harus login terlebih dahulu.');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success-message', 'Anda berhasil logout.');
    }
}
