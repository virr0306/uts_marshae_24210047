<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'nama_matkul',
        'kode_matkul',
        'sks'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi ke Kelas
    |--------------------------------------------------------------------------
    */

    public function kelas()
    {
        return $this->hasMany(
            Kelas::class,
            'kode_mata_kuliah',
            'id'
        );
    }
}