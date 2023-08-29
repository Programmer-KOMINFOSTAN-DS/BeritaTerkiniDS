<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user(); // Mengambil objek pengguna yang akan diperbarui

        // Mengupdate nama dengan data yang dikirim dari formulir
        $user->nama_lengkap = $request->input('nama_lengkap');

        // Menyimpan perubahan ke dalam basis data
        $user->save();

        // Mengisi atribut pengguna dengan data yang diterima dari formulir yang sudah divalidasi
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Menyimpan perubahan ke dalam basis data
        $user->save();

        // Mengarahkan kembali pengguna ke halaman edit profil dengan pesan sukses
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/landingpage');
    }
}
