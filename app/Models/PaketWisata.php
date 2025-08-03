<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $table = 'paket_wisatas';
    protected $primaryKey = 'paket_id';

    protected $fillable = [
        'nama_paket', 'kuota_minimal', 'deskripsi', 'harga', 'include_susu'
    ];
}
