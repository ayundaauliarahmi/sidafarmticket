<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'pengunjung_id', 'total_harga', 'tgl_kunjungan', 'tgl_order', 'status_pembayaran'
    ];

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id','order_id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaction::class, 'order_id', 'order_id');
    }


}
