<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'trx_id';

    protected $fillable = [
        'order_id', 'jumlah_bayar', 'metode_pembayaran', 'tgl_bayar'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }

}
