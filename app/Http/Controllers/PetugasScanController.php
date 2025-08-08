<?php

namespace App\Http\Controllers;

use App\Models\PetugasScan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasScanController extends Controller
{
    // Menampilkan semua data petugas scan
    public function index()
    {
        $users = User::where('level', 'petugas_scan')->get();
        $petugasscans = PetugasScan::with('user')
        ->whereHas('user', function ($query) {
            $query->where('level', 'petugas_scan');
        })
        ->get();

        return view('admin.petugasscan.index', compact('petugasscans','users'));
    }


    // Menampilkan form tambah petugas scan
    public function create()
    {
        $users = User::where('level', 'petugas_scan')->get();
        return view('admin.petugasscan.create', compact('users'));
    }

    // Menyimpan data petugas scan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
        ]);

        PetugasScan::create($validated);
        return redirect()->route('admin.petugasscan.index')->with('pesan', 'Petugas scan berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $users = User::where('level', 'petugas_scan')->get();
        $dataPetugasScan = PetugasScan::with('user')->findOrFail($id);
        return view('admin.petugasscan.edit', compact('dataPetugasScan', 'users'));
    }

    // Memperbarui data petugas scan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
        ]);

        $petugasScan = PetugasScan::findOrFail($id);
        $petugasScan->update($validated);

        return redirect()->route('admin.petugasscan.index')->with('success', 'Data petugas scan berhasil diperbarui.');
    }

    // Menghapus data petugas scan
    public function destroy($id)
    {
        PetugasScan::destroy($id);
        return redirect()->route('admin.petugasscan.index')->with('pesan', 'Data petugas scan berhasil dihapus.');
    }
}