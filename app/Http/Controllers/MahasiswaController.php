<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan seluruh data mahasiswa
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Form tambah mahasiswa
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Simpan data mahasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:100',
            'NIM' => 'required|unique:mahasiswas,NIM',
            'NIDN' => 'required|unique:mahasiswas,NIDN',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required'
        ]);

        Mahasiswa::create([
            'fullname' => $request->fullname,
            'NIM' => $request->NIM,
            'NIDN' => $request->NIDN,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Detail mahasiswa
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Form edit
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'fullname' => 'required|max:100',
            'NIM' => 'required|unique:mahasiswas,NIM,' . $mahasiswa->id,
            'NIDN' => 'required|unique:mahasiswas,NIDN,' . $mahasiswa->id,
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required'
        ]);

        $mahasiswa->update([
            'fullname' => $request->fullname,
            'NIM' => $request->NIM,
            'NIDN' => $request->NIDN,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Hapus data mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}