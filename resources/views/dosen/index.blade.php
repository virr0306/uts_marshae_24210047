@extends('layouts.app')

@section('title','Data Dosen')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Data Dosen</h3>
            <p class="text-muted mb-0">
                Kelola seluruh data dosen ITBSS.
            </p>
        </div>

        <a href="{{ route('dosen.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Dosen
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th width="70">No</th>

                            <th>Nama Dosen</th>

                            <th>NIP</th>

                            <th>Alamat</th>

                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($dosen as $d)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <strong>{{ $d->nama_dosen }}</strong>

                            </td>

                            <td>{{ $d->nip }}</td>

                            <td>{{ $d->alamat }}</td>

                            <td>

                                <a href="{{ route('dosen.edit',$d->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ route('dosen.destroy',$d->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center text-muted">

                                Belum ada data dosen.

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