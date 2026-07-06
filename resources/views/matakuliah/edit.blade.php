@extends('layouts.app')

@section('title','Edit Mata Kuliah')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-pencil-square"></i>

                Edit Data Mata Kuliah

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

            <form action="{{ route('matakuliah.update',$matakuliah->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Kode Mata Kuliah

                        </label>

                        <input
                            type="text"
                            name="kode_matkul"
                            class="form-control"
                            value="{{ old('kode_matkul',$matakuliah->kode_matkul) }}"
                            placeholder="Masukkan kode mata kuliah"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Mata Kuliah

                        </label>

                        <input
                            type="text"
                            name="nama_matkul"
                            class="form-control"
                            value="{{ old('nama_matkul',$matakuliah->nama_matkul) }}"
                            placeholder="Masukkan nama mata kuliah"
                            required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Jumlah SKS

                    </label>

                    <input
                        type="number"
                        name="sks"
                        class="form-control"
                        value="{{ old('sks',$matakuliah->sks) }}"
                        placeholder="Contoh: 3"
                        min="1"
                        max="6"
                        required>

                </div>

                <div class="text-end">

                    <a href="{{ route('matakuliah.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection