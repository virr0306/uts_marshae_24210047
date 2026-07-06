<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Menampilkan seluruh data dosen
     */
    public function index()
    {
        $dosen = Dosen::latest()->get();

        return view('dosen.index', compact('dosen'));
    }

    /**
     * Form tambah dosen
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Simpan data dosen
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required|max:100',
            'nip' => 'required|max:30|unique:dosens,nip',
            'alamat' => 'required'
        ]);

        Dosen::create([
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
            'alamat' => $request->alamat
        ]);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Detail dosen
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    /**
     * Form edit dosen
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update data dosen
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama_dosen' => 'required|max:100',
            'nip' => 'required|max:30|unique:dosens,nip,' . $dosen->id,
            'alamat' => 'required'
        ]);

        $dosen->update([
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
            'alamat' => $request->alamat
        ]);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Hapus data dosen
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}