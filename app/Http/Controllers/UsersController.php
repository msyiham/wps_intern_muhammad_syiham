<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.add-user');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6', // tambahkan `password_confirmation` di form jika pakai ini
            'role' => 'required|in:director,manager',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']); // Spatie role assign

        return redirect()->route('admin.create-user')->with('success', 'User berhasil ditambahkan!');
    }
}
