<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // Menampilkan data pengunjung
    public function index()
    {
        $pengunjungs = Pengunjung::all(); 
        $jumlahPengunjung = Pengunjung::count();
        return view('admin.pengunjung.index',compact('pengunjungs','jumlahPengunjung'));
    }

    public function create()
    {
        return view('admin.pengunjung.create');
    }

    // Menyimpan data sampah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|string|max:200',
            'no_hp' => 'required|string'
        ]);
        Pengunjung::create($validated);
        return redirect()->route('admin.pengunjung.index')->with('pesan', 'Pengunjung berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data paket wisata
    public function edit($id)
    {
        $dataPengunjung = Pengunjung::findOrFail($id);
        return view('admin.pengunjung.edit', compact('dataPengunjung'));
    }

    // Memperbarui data paket wisata
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|string|max:200',
            'no_hp' => 'required|string'
        ]);

        $dataPengunjung= Pengunjung::findOrFail($id);

            $dataPengunjung->nama_lengkap = $request->nama_lengkap;
            $dataPengunjung->email = $request->email;
            $dataPengunjung->no_hp = $request->no_hp;
            $dataPengunjung->save();

            return redirect()->route('admin.pengunjung.index')->with('success', 'Data pengunjung berhasil diperbarui.');
    }

    // Menghapus data pengunjung
    public function destroy($id)
    {
        Pengunjung::destroy($id);
        return redirect()->route('admin.pengunjung.index')->with('pesan','Data berhasil dihapus');
    }
}
