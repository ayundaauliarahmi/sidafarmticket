<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjungs';
    protected $primaryKey = 'pengunjung_id';

    protected $fillable = [
        'nama_lengkap', 'email', 'no_hp', 'password'
    ];
}
