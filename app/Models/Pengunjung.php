<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjungs';
    protected $primaryKey = 'pengunjung_id';

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    public function orders()
    {
        return $this->hasMany(Order::class, 'pengunjung_id');
    }
}
