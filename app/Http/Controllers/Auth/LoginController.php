<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('auth.login');
    }


    /**
     * Proses login
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {

            // Regenerasi session setelah login
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Login berhasil.');
        }


        return back()
            ->withErrors([
                'email' => 'Email atau Password salah.',
            ])
            ->onlyInput('email');
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();

        // Buat CSRF token baru
        $request->session()->regenerateToken();

        // Kembali ke halaman login
        return redirect()
            ->route('login')
            ->with('success', 'Logout berhasil.');
    }
}