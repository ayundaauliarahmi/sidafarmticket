<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class PetugasScan extends Model
{
    use HasFactory;

    protected $table = 'petugas_scans';
    protected $primaryKey = 'petugas_id';

    protected $fillable = [
        'user_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




