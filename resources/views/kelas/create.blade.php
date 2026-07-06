@extends('layouts.app')

@section('title','Tambah Kelas')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-plus-circle"></i>

                Tambah Data Kelas

           \ </h4>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('kelas.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Kode Kelas

                        </label>

                        <input
                            type="text"
                            name="kode_kelas"
                            class="form-control"
                            value="{{ old('kode_kelas') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Mata Kuliah

                        </label>

                        <select
                            name="kode_mata_kuliah"
                            class="form-select"
                            required>

                            <option value="">

                                -- Pilih Mata Kuliah --

                            </option>

                            @foreach($mataKuliah as $mk)

                                <option
                                    value="{{ $mk->id }}"
                                    {{ old('kode_mata_kuliah')==$mk->id?'selected':'' }}>

                                    {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Dosen Pengajar

                        </label>

                    <select name="kode_dosen" class="form-select" required>

                        <option value="">-- Pilih Dosen --</option>

                        @foreach($dosen as $d)

                            <option value="{{ $d->id }}">

                                {{ $d->id }} - {{ $d->nama_dosen }}

                            </option>

                        @endforeach

                    </select>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Hari

                        </label>

                        <select
                            name="hari"
                            class="form-select"
                            required>

                            <option value="">

                                -- Pilih Hari --

                            </option>

                            @foreach($hari as $h)

                                <option
                                    value="{{ $h }}"
                                    {{ old('hari')==$h?'selected':'' }}>

                                    {{ $h }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Jam

                        </label>

                        <select
                            name="jam"
                            class="form-select"
                            required>

                            <option value="">

                                -- Pilih Jam --

                            </option>

                            @foreach($jam as $j)

                                <option
                                    value="{{ $j }}"
                                    {{ old('jam')==$j?'selected':'' }}>

                                    {{ $j }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tahun Ajaran

                        </label>

                        <input
                            type="text"
                            name="tahun_ajaran"
                            class="form-control"
                            placeholder="Contoh : 2025/2026"
                            value="{{ old('tahun_ajaran') }}"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Semester

                        </label>

                        <select
                            name="semester"
                            class="form-select"
                            required>

                            <option value="">

                                -- Pilih Semester --

                            </option>

                            <option value="Ganjil">

                                Ganjil

                            </option>

                            <option value="Genap">

                                Genap

                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Ruang Kelas

                        </label>

                        <input
                            type="text"
                            name="ruang_kelas"
                            class="form-control"
                            value="{{ old('ruang_kelas') }}"
                            required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Jumlah Maksimal Mahasiswa

                    </label>

                    <input
                        type="number"
                        name="jumlah_max"
                        class="form-control"
                        value="{{ old('jumlah_max') }}"
                        min="1"
                        required>

                </div>

                <div class="text-end">

                    <a
                        href="{{ route('kelas.index') }}"
                        class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                    <button
                        type="reset"
                        class="btn btn-warning">

                        Reset

                    </button>

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="bi bi-check-circle"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


{{ $d->fullname }}
