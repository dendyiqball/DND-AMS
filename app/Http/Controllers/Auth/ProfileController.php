<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman Profile
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Update data Profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id)
            ]
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with(
            'success',
            'Profile berhasil diperbarui.'
        );
    }

    /**
     * Update Password
     */
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required'
            ],

            'new_password' => [
                'required',
                'string',
                'min:6',
                'confirmed'
            ]
        ]);

        $user = Auth::user();

        /**
         * Cek password lama
         */
        if (!Hash::check(
            $request->old_password,
            $user->password
        )) {

            return back()
                ->withErrors([
                    'old_password' => 'Password lama salah.'
                ])
                ->withInput();
        }

        /**
         * Simpan password baru
         */
        $user->update([
            'password' => Hash::make(
                $request->new_password
            )
        ]);

        return back()->with(
            'success',
            'Password berhasil diubah.'
        );
    }
}