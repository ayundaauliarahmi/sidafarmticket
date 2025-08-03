<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    // Menampilkan data paket wisata untuk admin
    public function index()
    {
        $paketwisatas = PaketWisata::all(); 
        return view('admin.paketwisata.index',compact('paketwisatas'));
    }

    public function create()
    {
        return view('admin.paketwisata.create');
    }

    // Menyimpan data sampah
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'kuota_minimal' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'include_susu' => 'nullable|boolean'
        ]);

        $validated['include_susu'] = $request->has('include_susu');
        PaketWisata::create($validated);
        return redirect()->route('admin.paketwisata.index')->with('pesan', 'Paket Wisata berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data paket wisata
    public function edit($id)
    {
        $dataPaketWisata = PaketWisata::findOrFail($id);
        return view('admin.paketwisata.edit', compact('dataPaketWisata'));
    }

    // Memperbarui data paket wisata
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:100',
            'kuota_minimal' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'include_susu' => 'required|boolean'
        ]);

        $dataPaketWisata= PaketWisata::findOrFail($id);

            $dataPaketWisata->nama_paket = $request->nama_paket;
            $dataPaketWisata->kuota_minimal = $request->kuota_minimal;
            $dataPaketWisata->deskripsi = $request->deskripsi;
            $dataPaketWisata->harga = $request->harga;
            $dataPaketWisata->include_susu = $request->include_susu;
            $dataPaketWisata->save();

            return redirect()->route('admin.paketwisata.index')->with('success', 'Data paket wisata berhasil diperbarui.');
    }

    // Menghapus data paket wisata
    public function destroy($id)
    {
        PaketWisata::destroy($id);
        return redirect()->route('admin.paketwisata.index')->with('pesan','Data berhasil dihapus');
    }
}
