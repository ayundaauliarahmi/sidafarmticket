<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'order_id', 'paket_id', 'harga', 'jumlah'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function paketwisata()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_id');
    }
}
