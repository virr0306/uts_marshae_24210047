@extends('layouts.app')

@section('title','Approval KRS')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold">
                Approval KRS Mahasiswa
            </h3>

            <p class="text-muted mb-0">
                Daftar pengajuan KRS mahasiswa yang menunggu persetujuan.
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>

                            <th>Mahasiswa</th>

                            <th>Tahun Ajaran</th>

                            <th>Semester</th>

                            <th>Total SKS</th>

                            <th>Status</th>

                            <th width="170">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($krs as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <strong>

                                    {{ $item->mahasiswa->fullname }}

                                </strong>

                            </td>

                            <td>

                                {{ $item->tahun_ajaran }}

                            </td>

                            <td>

                                {{ ucfirst($item->semester) }}

                            </td>

                            <td>

                                {{ $item->total_sks }}

                            </td>

                            <td>

                                @if($item->status=='approved')

                                    <span class="badge bg-success">

                                        Approved

                                    </span>

                                @elseif($item->status=='ditolak')

                                    <span class="badge bg-danger">

                                        Ditolak

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        Pending

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('approval.show',$item->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center">

                                Belum ada pengajuan KRS.

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