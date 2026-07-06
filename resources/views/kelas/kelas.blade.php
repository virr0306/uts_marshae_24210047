@extends('layouts.app')

@section('title','Tambah Kelas')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>Tambah Kelas</h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('kelas.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">Kode Kelas</label>

                    <input
                        type="text"
                        name="kode_kelas"
                        class="form-control"
                        value="{{ old('kode_kelas') }}"
                        required>

                </div>

                <div class="mb-3">

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

                            <option value="{{ $mk->id }}">

                                {{ $mk->kode_matkul }}
                                -
                                {{ $mk->nama_matkul }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Dosen

                    </label>

                    <select
                        name="kode_dosen"
                        class="form-select"
                        required>

                        <option value="">

                            -- Pilih Dosen --

                        </option>

                        @foreach($dosen as $d)

                            <option value="{{ $d->id }}">

                                {{ $d->fullname }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Hari

                    </label>

                    <select
                        name="hari"
                        class="form-select"
                        required>

                        @foreach($hari as $h)

                            <option value="{{ $h }}">

                                {{ $h }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Jam

                    </label>

                    <select
                        name="jam"
                        class="form-select"
                        required>

                        @foreach($jam as $j)

                            <option value="{{ $j }}">

                                {{ $j }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Tahun Ajaran

                    </label>

                    <input
                        type="text"
                        name="tahun_ajaran"
                        class="form-control"
                        placeholder="2025/2026"
                        value="{{ old('tahun_ajaran') }}"
                        required>

                </div>

                <div class="mb-3">

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

                <div class="mb-3">

                    <label class="form-label">

                        Jumlah Maksimal

                    </label>

                    <input
                        type="number"
                        name="jumlah_max"
                        class="form-control"
                        min="1"
                        value="{{ old('jumlah_max') }}"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label d-block">

                        Semester

                    </label>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="semester"
                            value="Ganjil">

                        <label class="form-check-label">

                            Ganjil

                        </label>

                    </div>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="semester"
                            value="Genap">

                        <label class="form-check-label">

                            Genap

                        </label>

                    </div>

                </div>

                <button class="btn btn-success">

                    Simpan

                </button>

                <a
                    href="{{ route('kelas.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection