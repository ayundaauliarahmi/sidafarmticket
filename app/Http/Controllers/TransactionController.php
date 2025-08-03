<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Psy\Readline\Transient;

class TransactionController extends Controller
{
    // Menampilkan data transaction
    public function index()
    {
        $transactions = Transaction::with('orders.pengunjung')->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    public function create()
    {
        $orders = Transaction::all();
        return view('admin.transaction.create', compact('orders'));
    }

    // Menyimpan data transaction
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'jumlah_bayar' => 'required|numeric',
            'metode_pembayaran' => 'required|string'
        ]);
        Transaction::create([
            'order_id'=> $validated['order_id'],
            'jumlah_bayar' => 'required|numeric',
            'metode_pembayaran' => 'belum bayar',
            'tgl_bayar'=> now()
        ]);

        return redirect()->route('admin.transaction.index')->with('pesan', 'Transaksi berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data order
    public function edit($id)
    {
        $dataTransaction = Transaction::findOrFail($id);
        $orders = Order::all();
        return view('admin.transaction.edit', compact('dataTransaction','orders'));
    }

    // Memperbarui data order
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'jumlah_bayar' => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:200'
        ]);
        // dd($validated);

        $dataTransaction= Transaction::findOrFail($id);
        $dataTransaction->update([
            'order_id'     => $validated['order_id'],
            'jumlah_bayar' => 'required|numeric',
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'tgl_bayar'     => $validated['tgl_bayar']
        ]);

        return redirect()->route('admin.transaction.index')->with('success', 'Data transaction berhasil diperbarui.');
    }

    // Menghapus data  Transaction
    public function destroy($id)
    {
        Transaction::destroy($id);
        return redirect()->route('admin.transaction.index')->with('pesan','Data berhasil dihapus');
    }
}
