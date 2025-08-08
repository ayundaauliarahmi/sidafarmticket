<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    // Menampilkan form registrasi nasabah
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:50|unique:users', 
            'no_hp' => 'required|string|max:15',
            'password' => 'required|string|confirmed',  
            'level' => 'required|in:pengunjung',  
        ]);

        Log::info('Registering user:', $request->all());

        $user = User::create([
            'nama' => $request->nama, 
            'email' => $request->email,
            'no_hp' => $request->no_hp, 
            'password' => bcrypt($request->password), 
            'level' => $request->level
        ]);

        Log::info('User registered successfully.', ['id' => $user->id]);

        return redirect()->route('register.index')->with('success', 'Registrasi berhasil!');
    }
}
