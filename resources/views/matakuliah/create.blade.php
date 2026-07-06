@extends('layouts.app')

@section('title','Tambah Mata Kuliah')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">

                <i class="bi bi-book-half"></i>

                Tambah Data Mata Kuliah

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

            <form action="{{ route('matakuliah.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Kode Mata Kuliah

                    </label>

                <input
                    type="text"
                    name="kode_matkul"
                    class="form-control"
                    value="{{ old('kode_matkul') }}"
                    required>
                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Nama Mata Kuliah

                    </label>

                <input
                    type="text"
                    name="nama_matkul"
                    class="form-control"
                    value="{{ old('nama_matkul') }}"
                    required>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        SKS

                    </label>

                    <input
                        type="number"
                        name="sks"
                        class="form-control"
                        value="{{ old('sks') }}"
                        required>

                </div>

                <div class="text-end">

                    <a href="{{ route('matakuliah.index') }}"
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