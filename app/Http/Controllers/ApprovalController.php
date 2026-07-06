<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Daftar Pengajuan KRS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $krs = Krs::with([
            'mahasiswa',
            'detail'
        ])
        ->latest()
        ->get();

        return view(
            'approval.index',
            compact('krs')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Detail KRS
    |--------------------------------------------------------------------------
    */

    public function show(Krs $krs)
    {
        $krs->load([
            'mahasiswa',
            'detail.kelas.mataKuliah',
            'detail.kelas.dosen'
        ]);

        return view(
            'approval.show',
            compact('krs')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Approve
    |--------------------------------------------------------------------------
    */

    public function approve(Krs $krs)
    {
        $krs->update([

            'status' => 'approved'

        ]);

        $krs->detail()->update([

            'status' => 'approved'

        ]);

        return redirect()
                ->route('approval.index')
                ->with(
                    'success',
                    'KRS berhasil disetujui.'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | Reject
    |--------------------------------------------------------------------------
    */

    public function reject(Krs $krs)
    {
        $krs->update([

            'status' => 'ditolak'

        ]);

        $krs->detail()->update([

            'status' => 'ditolak'

        ]);

        return redirect()
                ->route('approval.index')
                ->with(
                    'success',
                    'KRS berhasil ditolak.'
                );
    }
}