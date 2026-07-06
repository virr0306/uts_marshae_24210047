@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-mortarboard-fill"></i>

                Tambah Data Mahasiswa

            </h4>

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

            <form action="{{ route('mahasiswa.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="fullname"
                            class="form-control"
                            value="{{ old('fullname') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            NIM

                        </label>

                        <input
                            type="text"
                            name="NIM"
                            class="form-control"
                            value="{{ old('NIM') }}"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            NIDN

                        </label>

                        <input
                            type="text"
                            name="NIDN"
                            class="form-control"
                            value="{{ old('NIDN') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tempat Lahir

                        </label>

                        <input
                            type="text"
                            name="tempat_lahir"
                            class="form-control"
                            value="{{ old('tempat_lahir') }}"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tanggal Lahir

                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            class="form-control"
                            value="{{ old('tanggal_lahir') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="3"
                            class="form-control"
                            required>{{ old('alamat') }}</textarea>

                    </div>

                </div>

                <div class="text-end">

                    <a href="{{ route('mahasiswa.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                    <button
                        type="reset"
                        class="btn btn-warning">

                        <i class="bi bi-arrow-clockwise"></i>

                        Reset

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection