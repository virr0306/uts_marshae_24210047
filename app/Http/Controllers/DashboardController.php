<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function dosen()
    {
        return view('dashboard.dosen', [

            'mahasiswa' => Mahasiswa::count(),

            'dosen' => Dosen::count(),

            'jurusan' => Jurusan::count(),

            'matakuliah' => MataKuliah::count(),

            'kelas' => Kelas::count(),

            'krsPending' => Krs::where('status', 'pending')->count()

        ]);
    }

    public function mahasiswa()
    {
        $mahasiswa = auth()->user()->mahasiswa;

        $krs = null;

        if ($mahasiswa) {
            $krs = $mahasiswa->krs()->latest()->first();
        }

        return view('dashboard.mahasiswa', [

            'jumlahMatkul' => $krs ? $krs->detail()->count() : 0,

            'totalSKS' => $krs ? $krs->total_sks : 0,

            'semester' => $krs ? ucfirst($krs->semester) : '-',

            'statusKRS' => $krs ? ucfirst($krs->status) : '-'

        ]);
    }
}