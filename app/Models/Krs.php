<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'kode_mahasiswa',
        'tahun_ajaran',
        'semester',
        'status',
        'total_sks'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi ke Mahasiswa
    |--------------------------------------------------------------------------
    */

    public function mahasiswa()
    {
        return $this->belongsTo(
            Mahasiswa::class,
            'kode_mahasiswa',
            'id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi ke Detail KRS
    |--------------------------------------------------------------------------
    */

    public function detail()
    {
        return $this->hasMany(
            KrsDetail::class,
            'krs_id',
            'id'
        );
    }
}