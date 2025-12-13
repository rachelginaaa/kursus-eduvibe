<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    // tampilkan form edit profil
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('profile.edit_profileAdmin', compact('admin'));
    }

    // simpan perubahan profil
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // validasi
        $request->validate([
            'nama_admin' => 'required|string|max:100',
            'username'   => 'required|string|max:50',
            'email'      => 'required|email',
            'password'   => 'nullable|min:6|confirmed'
        ]);

        // update data profil
        $admin->nama_admin = $request->nama_admin;
        $admin->username   = $request->username;
        $admin->email      = $request->email;

        // update password jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect('/admin/profile')->with('success', 'Profil berhasil diperbarui');
    }
}
