<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan seluruh data mata kuliah
     */
    public function index()
    {
        $matakuliah = MataKuliah::latest()->get();

        return view('matakuliah.index', compact('matakuliah'));
    }

    /**
     * Form tambah mata kuliah
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Simpan data mata kuliah
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required|max:100',
            'kode_matkul' => 'required|max:20|unique:mata_kuliahs,kode_matkul',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        MataKuliah::create([
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'sks' => $request->sks,
        ]);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Detail mata kuliah
     */
    public function show(MataKuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Form edit mata kuliah
     */
    public function edit(MataKuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update data mata kuliah
     */
    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'nama_matkul' => 'required|max:100',
            'kode_matkul' => 'required|max:20|unique:mata_kuliahs,kode_matkul,' . $matakuliah->id,
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matakuliah->update([
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'sks' => $request->sks,
        ]);

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Hapus data mata kuliah
     */
    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()
            ->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}