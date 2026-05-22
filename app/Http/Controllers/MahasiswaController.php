<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index', [

            'mahasiswa' => Mahasiswa::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([

            'fullname'       => 'required',
            'NIM'            => 'required',
            'NIDN'           => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required',

        ]);

        // Simpan data
        Mahasiswa::create([

            'fullname'       => $request->fullname,
            'NIM'            => $request->NIM,
            'NIDN'           => $request->NIDN,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,

        ]);

        // Redirect
        return redirect()
                ->action([MahasiswaController::class, 'index'])
                ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Mahasiswa::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mahasiswa.edit', [

            'mahasiswa' => Mahasiswa::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([

            'fullname'       => 'required',
            'NIM'            => 'required',
            'NIDN'           => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required',

        ]);

        // Update data
        Mahasiswa::find($id)->update([

            'fullname'       => $request->fullname,
            'NIM'            => $request->NIM,
            'NIDN'           => $request->NIDN,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,

        ]);

        // Redirect
        return redirect()
                ->action([MahasiswaController::class, 'index'])
                ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect('/mahasiswa')
                ->with('success', 'Data berhasil dihapus');
    }
}