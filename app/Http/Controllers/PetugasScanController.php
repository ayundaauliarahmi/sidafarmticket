<?php

namespace App\Http\Controllers;

use App\Models\PetugasScan;
use Illuminate\Http\Request;

class PetugasScanController extends Controller
{
    // Menampilkan data pwtugas scan
    public function index()
    {
        $petugasscans = PetugasScan::all(); 
        return view('admin.petugasscan.index',compact('petugasscans'));
    }

    public function create()
    {
        return view('admin.petugasscan.create');
    }

    // Menyimpan data sampah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'email' => 'required|string|max:200',
            'no_hp' => 'required|string',
            'password' => 'required|string'
        ]);
        PetugasScan::create($validated);
        return redirect()->route('admin.petugasscan.index')->with('pesan', 'petugasscan berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data paket wisata
    public function edit($id)
    {
        $dataPetugasScan = PetugasScan::findOrFail($id);
        return view('admin.petugasscan.edit', compact('dataPetugasScan'));
    }

    // Memperbarui data paket wisata
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'email' => 'required|string|max:200',
            'no_hp' => 'required|string',
            'password' => 'required|string'
        ]);

        $dataPetugasScan= PetugasScan::findOrFail($id);

            $dataPetugasScan->nama = $request->nama;
            $dataPetugasScan->username = $request->username;
            $dataPetugasScan->email = $request->email;
            $dataPetugasScan->no_hp = $request->no_hp;
            $dataPetugasScan->password = $request->password;
            $dataPetugasScan->save();

            return redirect()->route('admin.petugasscan.index')->with('success', 'Data petugas scan berhasil diperbarui.');
    }

    // Menghapus data pengunjung
    public function destroy($id)
    {
        PetugasScan::destroy($id);
        return redirect()->route('admin.petugasscan.index')->with('pesan','Data berhasil dihapus');
    }
}
