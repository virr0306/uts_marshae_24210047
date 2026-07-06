<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KrsDetailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menampilkan Detail KRS
    |--------------------------------------------------------------------------
    */

    public function index($krs_id)
    {
        $krs = Krs::with('mahasiswa')->findOrFail($krs_id);

        $detail = KrsDetail::with('kelas')
                    ->where('krs_id', $krs_id)
                    ->get();

        return view('krs_detail.index', compact(
            'krs',
            'detail'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Form Tambah Mata Kuliah
    |--------------------------------------------------------------------------
    */

    public function create($krs_id)
    {
        $krs = Krs::findOrFail($krs_id);

        $kelas = Kelas::all();

        return view('krs_detail.create', compact(
            'krs',
            'kelas'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Mata Kuliah
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'krs_id'   => 'required|exists:krs,id',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        KrsDetail::create([

            'krs_id'   => $request->krs_id,

            'kelas_id' => $request->kelas_id,

            'status'   => 'pending'

        ]);

        /*
        |-------------------------------------------------------
        | Hitung Total SKS Otomatis
        |-------------------------------------------------------
        */

        $krs = Krs::find($request->krs_id);

        $total = KrsDetail::where('krs_id', $krs->id)
                    ->join('kelas', 'kelas.id', '=', 'krs_detail.kelas_id')
                    ->sum('kelas.sks');

        $krs->update([
            'total_sks' => $total
        ]);

        return redirect()
                ->route('krs.detail.index', $krs->id)
                ->with(
                    'success',
                    'Mata kuliah berhasil ditambahkan.'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Mata Kuliah
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $detail = KrsDetail::findOrFail($id);

        $krs_id = $detail->krs_id;

        $detail->delete();

        /*
        |-------------------------------------------------------
        | Update Total SKS Lagi
        |-------------------------------------------------------
        */

        $krs = Krs::find($krs_id);

        $total = KrsDetail::where('krs_id', $krs_id)
                    ->join('kelas', 'kelas.id', '=', 'krs_detail.kelas_id')
                    ->sum('kelas.sks');

        $krs->update([
            'total_sks' => $total
        ]);

        return redirect()
                ->route('krs.detail.index', $krs_id)
                ->with(
                    'success',
                    'Mata kuliah berhasil dihapus.'
                );
    }

}