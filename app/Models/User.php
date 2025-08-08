<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Pengunjung;
use App\Models\PetugasScan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'email', 'password', 'no_hp', 'level'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function petugasScan()
    {
        return $this->hasOne(PetugasScan::class, 'user_id');
    }

    public function pengunjung()
    {
        return $this->hasOne(Pengunjung::class, 'user_id');
    }

}
