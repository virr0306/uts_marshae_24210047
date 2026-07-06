@extends('layouts.app')

@section('title','Detail Kelas')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-eye"></i>

                Detail Data Kelas

            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Kode Kelas

                    </label>

                    <div class="form-control">

                        {{ $kelas->kode_kelas }}

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Mata Kuliah

                    </label>

                    <div class="form-control">

                        {{ $kelas->mataKuliah->kode_matkul ?? '-' }}
                        -
                        {{ $kelas->mataKuliah->nama_matkul ?? '-' }}

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Dosen

                    </label>

                    <div class="form-control">

                        {{ $kelas->dosen->nama_dosen ?? '-' }}

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Hari

                    </label>

                    <div class="form-control">

                        {{ ucfirst($kelas->hari) }}

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Jam

                    </label>

                    <div class="form-control">

                        {{ $kelas->jam }}

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Semester

                    </label>

                    <div class="form-control">

                        {{ ucfirst($kelas->semester) }}

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Tahun Ajaran

                    </label>

                    <div class="form-control">

                        {{ $kelas->tahun_ajaran }}

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="fw-bold">

                        Ruang Kelas

                    </label>

                    <div class="form-control">

                        {{ $kelas->ruang_kelas }}

                    </div>

                </div>

            </div>

            <div class="mb-4">

                <label class="fw-bold">

                    Kapasitas Mahasiswa

                </label>

                <div class="form-control">

                    {{ $kelas->jumlah_mahasiswa }} / {{ $kelas->jumlah_max }}

                </div>

            </div>

            <div class="text-end">

                <a href="{{ route('kelas.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <a href="{{ route('kelas.edit',$kelas->id) }}"
                   class="btn btn-primary">

                    <i class="bi bi-pencil-square"></i>

                    Edit

                </a>

            </div>

        </div>

    </div>

</div>

@endsection