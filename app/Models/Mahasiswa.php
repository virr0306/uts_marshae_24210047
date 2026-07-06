<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Krs;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'user_id',
        'fullname',
        'NIM',
        'NIDN',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi User
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi KRS
    |--------------------------------------------------------------------------
    */

    public function krs()
    {
        return $this->hasMany(
            Krs::class,
            'kode_mahasiswa',
            'id'
        );
    }
}