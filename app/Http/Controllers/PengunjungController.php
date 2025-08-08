<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // Menampilkan data pengunjung
    public function index()
    {
        $users = User::where('level', 'pengunjung')->get();
        $pengunjungs = Pengunjung::with('user')
        ->whereHas('user', function ($query) {
            $query->where('level', 'pengunjung');
        })
        ->get();

        $jumlahPengunjung = Pengunjung::count();
        return view('admin.pengunjung.index',compact('users','pengunjungs','jumlahPengunjung'));
    }

    public function create()
    {
        $users = User::where('level', 'pengunjung')->get();
        return view('admin.pengunjung.create', compact('users'));
    }

    // Menyimpan data pengunjung
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
        ]);

        Pengunjung::create($validated);
        return redirect()->route('admin.pengunjung.index')->with('pesan', 'Pengunjung berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data paket wisata
    public function edit($id)
    {
        $dataPengunjung = Pengunjung::with('user')->findOrFail($id);
        $users = User::where('level', 'pengunjung')->get();
        return view('admin.pengunjung.edit', compact('dataPengunjung','users'));
    }

    // Memperbarui data paket wisata
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //        'user_id' => 'required|exists:users,user_id',
    //     ]);

    //     $dataPengunjung= Pengunjung::findOrFail($id);

    //         $dataPengunjung->nama_lengkap = $request->nama_lengkap;
    //         $dataPengunjung->email = $request->email;
    //         $dataPengunjung->no_hp = $request->no_hp;
    //         $dataPengunjung->save();

    //     return redirect()->route('admin.pengunjung.index')->with('success', 'Data pengunjung berhasil diperbarui.');
    // }

    // Menghapus data pengunjung
    // public function destroy($id)
    // {
    //     Pengunjung::destroy($id);
    //     return redirect()->route('admin.pengunjung.index')->with('pesan','Data berhasil dihapus');
    // }
}
