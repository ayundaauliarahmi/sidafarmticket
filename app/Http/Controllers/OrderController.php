<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaketWisata;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    // Menampilkan data order
    public function index()
    {
        $orders = Order::with('pengunjung','items')->get();
        return view('admin.order.index', compact('orders'));
    }

    
    public function create()
    {
        $pengunjung = Pengunjung::all();
        $paketwisata = PaketWisata::all();

        return view('admin.order.create', compact('pengunjung', 'paketwisata'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pengunjung_id'   => 'required|integer',
            'tgl_kunjungan'   => 'required|date',
        ]);

        $order = Order::create([
            'pengunjung_id'     => $validated['pengunjung_id'],
            'tgl_kunjungan'     => $validated['tgl_kunjungan'],
            'tgl_order'         => now(),
            'total_harga'       => 0, // default dulu, dihitung setelah input item
            'status_pembayaran' => 'belum bayar'
        ]);

        return redirect()->route('admin.orderitem.create', $order->order_id)
                        ->with('pesan', 'Data pembeli berhasil ditambahkan, lanjut pilih paket wisata');
    }

    // Menampilkan form untuk edit data order
    public function edit($id)
    {
        $dataOrder = Order::findOrFail($id);
        $pengunjung = Pengunjung::all();
        return view('admin.order.edit', compact('dataOrder','pengunjung'));
    }

    // Memperbarui data order
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pengunjung_id' => 'required|integer',
            'tgl_kunjungan' => 'required|date',
            'status_pembayaran' => 'required|string|max:200'
        ]);
        $dataOrder= Order::findOrFail($id);
        $dataOrder->update([
            'pengunjung_id'     => $validated['pengunjung_id'],
            'total_harga'       => $validated['total_harga'],
            'tgl_kunjungan'     => $validated['tgl_kunjungan'],
            'status_pembayaran' => $validated['status_pembayaran'],
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Data order berhasil diperbarui.');
    }

    // Menghapus data order
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('admin.order.index')->with('pesan','Data berhasil dihapus');
    }
}
