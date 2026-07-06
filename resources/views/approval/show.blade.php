@extends('layouts.app')

@section('title','Detail Approval KRS')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4>

                Detail Pengajuan KRS

            </h4>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">

                                Nama Mahasiswa

                            </th>

                            <td>

                                {{ $krs->mahasiswa->fullname }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Tahun Ajaran

                            </th>

                            <td>

                                {{ $krs->tahun_ajaran }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Semester

                            </th>

                            <td>

                                {{ ucfirst($krs->semester) }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Total SKS

                            </th>

                            <td>

                                {{ $krs->total_sks }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <h5 class="mb-3">

                Mata Kuliah yang Diambil

            </h5>

            <table class="table table-bordered">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>Kode</th>

                        <th>Mata Kuliah</th>

                        <th>SKS</th>

                        <th>Dosen</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($krs->detail as $detail)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $detail->kelas->mataKuliah->kode_matkul }}

                        </td>

                        <td>

                            {{ $detail->kelas->mataKuliah->nama_matkul }}

                        </td>

                        <td>

                            {{ $detail->kelas->mataKuliah->sks }}

                        </td>

                        <td>

                            {{ $detail->kelas->dosen->nama_dosen }}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <div class="mt-4 d-flex justify-content-between">

                <a href="{{ route('approval.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                @if($krs->status=='pending')

                <div>

                    <form action="{{ route('approval.approve',$krs->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-success">

                            <i class="bi bi-check-circle"></i>

                            Approve

                        </button>

                    </form>

                    <form action="{{ route('approval.reject',$krs->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-danger">

                            <i class="bi bi-x-circle"></i>

                            Tolak

                        </button>

                    </form>

                </div>

                @else

                    @if($krs->status=='approved')

                        <span class="badge bg-success fs-6">

                            KRS Sudah Disetujui

                        </span>

                    @else

                        <span class="badge bg-danger fs-6">

                            KRS Ditolak

                        </span>

                    @endif

                @endif

            </div>

        </div>

    </div>

</div>

@endsection