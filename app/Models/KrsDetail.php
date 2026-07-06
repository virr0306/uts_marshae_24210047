<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KrsDetail extends Model
{
    protected $table = 'krs_detail';

    protected $fillable = [
        'krs_id',
        'kelas_id',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi ke KRS
    |--------------------------------------------------------------------------
    */

    public function krs()
    {
        return $this->belongsTo(
            Krs::class,
            'krs_id',
            'id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi ke Kelas
    |--------------------------------------------------------------------------
    */

    public function kelas()
    {
        return $this->belongsTo(
            Kelas::class,
            'kelas_id',
            'id'
        );
    }
} 