@extends('layouts.app')

@section('title','Data Mata Kuliah')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Data Mata Kuliah
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh data mata kuliah ITBSS.
            </p>

        </div>

        <a href="{{ route('matakuliah.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Mata Kuliah

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th width="70">No</th>

                            <th>Kode MK</th>

                            <th>Nama Mata Kuliah</th>

                            <th>SKS</th>

                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($matakuliah as $mk)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $mk->kode_matkul }}</td>

                            <td>
                                <strong>{{ $mk->nama_matkul }}</strong>
                            </td>

                            <td>{{ $mk->sks }}</td>

                            <td>

                                <a href="{{ route('matakuliah.edit',$mk->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form
                                    action="{{ route('matakuliah.destroy',$mk->id) }}"
                                    method="POST"
                                    class="d-inline">

                                @csrf
                                @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted">

                                Belum ada data mata kuliah.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection