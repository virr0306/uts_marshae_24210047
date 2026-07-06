<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MahasiswaMenuController extends Controller
{
    public function profil()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        return view('mahasiswa.profil', compact('mahasiswa'));
    }

    public function jadwal()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $krs = $mahasiswa->krs()
            ->latest()
            ->first();

        return view('mahasiswa.jadwal', compact('krs'));
    }

    public function hasilStudi()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $krs = $mahasiswa->krs()
            ->latest()
            ->first();

        return view('mahasiswa.hasil_studi', compact('krs'));
    }
}