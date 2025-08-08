<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    // Menampilkan semua order_items
    public function index()
    {
        $items = OrderItem::with('orders', 'paketwisata')->get();
        return view('admin.order.index', compact('items'));
    }

    // Tampilkan form tambah data order_item
    public function create(Request $request)
    {
        $orders = $request->order_id; // ambil dari query string
        $order = Order::findOrFail($orders);
        $paketwisata = PaketWisata::all();

        return view('admin.orderitem.create', compact('order', 'paketwisata'));
    }


    // Simpan data order_item
    public function store(Request $request)
    {
        $orderId = $request->input('order_id');
        $paketIds = $request->input('paket_id');
        $jumlahs  = $request->input('jumlah');


        for ($i = 0; $i < count($paketIds); $i++) {
            if (!empty($paketIds[$i]) && !empty($jumlahs[$i])) {
                $paket = PaketWisata::find($paketIds[$i]);
                if ($paket) {
                    OrderItem::create([
                        'order_id' => $orderId,
                        'paket_id' => $paket->id,
                        'jumlah'   => $jumlahs[$i], // diperbaiki: ambil per index
                        'harga'    => $paket->harga * $jumlahs[$i],
                    ]);
                }
            }
        }

        return redirect()->route('admin.order.index')->with('success', 'Order item berhasil ditambahkan');
    }
}
