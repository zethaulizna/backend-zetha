<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user ke dashboard
    public function dashboardIndex()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('dashboard.user')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('dashboard.user')->with('success', 'User berhasil diperbarui!');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.user')->with('success', 'User berhasil dihapus!');
    }
}
