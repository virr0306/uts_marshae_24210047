<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()
                ->route('dashboard.mahasiswa')
                ->with('error', 'Data mahasiswa belum terhubung.');
        }

        $krs = Krs::with([
            'detail.kelas.mataKuliah',
            'detail.kelas.dosen'
        ])
        ->where('kode_mahasiswa', $mahasiswa->id)
        ->latest()
        ->get();

        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $kelas = Kelas::with([
            'mataKuliah',
            'dosen'
        ])
        ->orderBy('kode_kelas')
        ->get();

        return view('krs.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:ganjil,genap',
            'kelas' => 'required|array|min:1'
        ]);

        $mahasiswa = auth()->user()->mahasiswa;

        if (!$mahasiswa) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        DB::beginTransaction();

        try {

            $totalSKS = 0;

            $krs = Krs::create([
                'kode_mahasiswa' => $mahasiswa->id,
                'tahun_ajaran' => $request->tahun_ajaran,
                'semester' => $request->semester,
                'status' => 'pending',
                'total_sks' => 0
            ]);

            foreach ($request->kelas as $kelasId) {

                $kelas = Kelas::with('mataKuliah')->findOrFail($kelasId);

                $totalSKS += $kelas->mataKuliah->sks;

                KrsDetail::create([
                    'krs_id' => $krs->id,
                    'kelas_id' => $kelas->id,
                    'status' => 'pending'
                ]);
            }

            $krs->update([
                'total_sks' => $totalSKS
            ]);

            DB::commit();

            return redirect()
                ->route('krs.index')
                ->with('success', 'KRS berhasil disimpan.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);

        $krs->delete();

        return back()->with('success', 'KRS berhasil dihapus.');
    }
/*
|--------------------------------------------------------------------------
| Approval KRS
|--------------------------------------------------------------------------
*/

    public function approval()
    {
        $krs = Krs::with([
            'mahasiswa',
            'detail.kelas.mataKuliah'
        ])
        ->latest()
        ->get();

        return view('krs.approval', compact('krs'));
    }

    /*
    |--------------------------------------------------------------------------
    | Approve KRS
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $krs = Krs::findOrFail($id);

        $krs->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'KRS berhasil disetujui.'
        );
    }
    }