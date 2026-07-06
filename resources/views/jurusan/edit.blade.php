@extends('layouts.app')

@section('title','Edit Jurusan')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-pencil-square"></i>

                Edit Data Jurusan

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

            <form action="{{ route('jurusan.update',$jurusan->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Nama Jurusan

                        </label>

                        <input
                            type="text"
                            name="nama_jurusan"
                            class="form-control"
                            value="{{ old('nama_jurusan',$jurusan->nama_jurusan) }}"
                            placeholder="Masukkan nama jurusan"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Kode Jurusan

                        </label>

                        <input
                            type="text"
                            name="kode_jurusan"
                            class="form-control"
                            value="{{ old('kode_jurusan',$jurusan->kode_jurusan) }}"
                            placeholder="Masukkan kode jurusan"
                            required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Ketua Jurusan

                    </label>

                    <input
                        type="text"
                        name="ketua_jurusan"
                        class="form-control"
                        value="{{ old('ketua_jurusan',$jurusan->ketua_jurusan) }}"
                        placeholder="Masukkan nama ketua jurusan"
                        required>

                </div>

                <div class="text-end">

                    <a href="{{ route('jurusan.index') }}"
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