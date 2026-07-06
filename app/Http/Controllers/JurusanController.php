<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Menampilkan seluruh data jurusan
     */
    public function index()
    {
        $jurusan = Jurusan::latest()->get();

        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Form tambah jurusan
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Simpan data jurusan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|max:100',
            'kode_jurusan' => 'required|max:20|unique:jurusans,kode_jurusan',
            'ketua_jurusan' => 'required|max:100',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
            'ketua_jurusan' => $request->ketua_jurusan,
        ]);

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Detail jurusan
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Form edit jurusan
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update data jurusan
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required|max:100',
            'kode_jurusan' => 'required|max:20|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'ketua_jurusan' => 'required|max:100',
        ]);

        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
            'ketua_jurusan' => $request->ketua_jurusan,
        ]);

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Hapus data jurusan
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}