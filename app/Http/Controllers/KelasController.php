<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Menampilkan seluruh data kelas
     */
    public function index()
    {
        $kelas = Kelas::with([
            'dosen',
            'mataKuliah'
        ])->latest()->get();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Form tambah kelas
     */
    public function create()
    {

        return view('kelas.create', [

            'dosen' => Dosen::all(),

            'mataKuliah' => MataKuliah::all(),

            'hari' => Kelas::ListHari(),

            'jam' => Kelas::ListJam(),

        ]);
    }

    /**
     * Simpan data kelas
     */
    public function store(Request $request)
    {
        $request->validate([

            'kode_kelas' => 'required|max:20|unique:kelas,kode_kelas',

            'kode_mata_kuliah' => 'required|exists:mata_kuliahs,id',

            'kode_dosen' => 'required|exists:dosens,id',

            'hari' => 'required',

            'jam' => 'required',

            'tahun_ajaran' => 'required',

            'ruang_kelas' => 'required',

            'jumlah_max' => 'required|integer|min:1',

            'semester' => 'required',

        ]);

        Kelas::create([

            'kode_kelas' => $request->kode_kelas,

            'kode_mata_kuliah' => $request->kode_mata_kuliah,

            'kode_dosen' => $request->kode_dosen,

            'hari' => $request->hari,

            'jam' => $request->jam,

            'tahun_ajaran' => $request->tahun_ajaran,

            'ruang_kelas' => $request->ruang_kelas,

            'jumlah_max' => $request->jumlah_max,

            'jumlah_mahasiswa' => 0,

            'semester' => $request->semester,

        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Detail kelas
     */
    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Form edit kelas
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', [

            'kelas' => $kelas,

            'dosen' => Dosen::all(),

            'mataKuliah' => MataKuliah::all(),

            'hari' => Kelas::ListHari(),

            'jam' => Kelas::ListJam(),

        ]);
    }

    /**
     * Update data kelas
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([

            'kode_kelas' => 'required|max:20|unique:kelas,kode_kelas,' . $kelas->id,

            'kode_mata_kuliah' => 'required|exists:mata_kuliahs,id',

            'kode_dosen' => 'required|exists:dosens,id',

            'hari' => 'required',

            'jam' => 'required',

            'tahun_ajaran' => 'required',

            'ruang_kelas' => 'required',

            'jumlah_max' => 'required|integer|min:1',

            'semester' => 'required',

        ]);

        $kelas->update([

            'kode_kelas' => $request->kode_kelas,

            'kode_mata_kuliah' => $request->kode_mata_kuliah,

            'kode_dosen' => $request->kode_dosen,

            'hari' => $request->hari,

            'jam' => $request->jam,

            'tahun_ajaran' => $request->tahun_ajaran,

            'ruang_kelas' => $request->ruang_kelas,

            'jumlah_max' => $request->jumlah_max,

            'semester' => $request->semester,

        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Hapus kelas
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}