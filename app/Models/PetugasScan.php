<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasScan extends Model
{
    use HasFactory;

    protected $table = 'petugas_scans';
    protected $primaryKey = 'petugas_id';

    protected $fillable = [
        'nama', 'username', 'email', 'no_hp', 'password'
    ];
}
