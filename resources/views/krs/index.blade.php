@extends('layouts.app')

@section('title','Kartu Rencana Studi')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Kartu Rencana Studi
            </h3>

            <p class="text-muted">
                Daftar pengambilan mata kuliah.
            </p>

        </div>

        <a href="{{ route('krs.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Isi KRS

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Total SKS</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($krs as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->tahun_ajaran }}</td>

                            <td>{{ ucfirst($item->semester) }}</td>

                            <td>{{ $item->total_sks }}</td>

                            <td>

                                <span class="badge bg-info">

                                    {{ ucfirst($item->status) }}

                                </span>

                            </td>

                            <td>

                                <a href="#"
                                   class="btn btn-success btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                Belum ada data KRS.

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