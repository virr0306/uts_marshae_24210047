@extends('layouts.app')

@section('title','Tambah Dosen')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-person-plus-fill"></i>

                Tambah Data Dosen

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

            <form action="{{ route('dosen.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Dosen

                        </label>

                        <input
                            type="text"
                            name="nama_dosen"
                            class="form-control"
                            value="{{ old('nama_dosen') }}"
                            placeholder="Masukkan nama dosen"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            NIP

                        </label>

                        <input
                            type="text"
                            name="nip"
                            class="form-control"
                            value="{{ old('nip') }}"
                            placeholder="Masukkan NIP"
                            required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control"
                        placeholder="Masukkan alamat lengkap"
                        required>{{ old('alamat') }}</textarea>

                </div>

                <div class="text-end">

                    <a href="{{ route('dosen.index') }}"
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