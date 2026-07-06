<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nama_dosen',
        'nip',
        'alamat'
    ];

    public function kelas()
    {
        return $this->hasMany(
            Kelas::class,
            'kode_dosen',
            'id'
        );
    }
}
