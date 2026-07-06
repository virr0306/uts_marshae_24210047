@extends('layouts.app')

@section('title','Hasil Studi')

@section('content')

<style>

.gradient-header{
    background:linear-gradient(135deg,#0d6efd,#4f8dfd);
    color:#fff;
    border-radius:20px;
}

.summary-card{
    border:none;
    border-radius:18px;
    transition:.35s;
}

.summary-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 45px rgba(13,110,253,.18);
}

.study-card{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.study-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.icon-circle{
    width:60px;
    height:60px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
}

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="gradient-header shadow p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-2">

                    <i class="bi bi-award-fill"></i>

                    Hasil Studi

                </h2>

                <p class="mb-0 opacity-75">

                    Ringkasan akademik semester yang sedang ditempuh.

                </p>

            </div>

            <i class="bi bi-mortarboard-fill display-4 opacity-50"></i>

        </div>

    </div>

@if(!$krs)

<div class="card shadow border-0 rounded-4">

    <div class="card-body text-center py-5">

        <i class="bi bi-journal-x display-1 text-secondary"></i>

        <h3 class="mt-4">

            Belum Ada Data Akademik

        </h3>

        <p class="text-muted">

            Anda belum memiliki data KRS.

        </p>

        <a href="{{ route('krs.index') }}"
           class="btn btn-primary px-4">

            <i class="bi bi-journal-plus"></i>

            Isi KRS

        </a>

    </div>

</div>

@else

{{-- SUMMARY --}}
<div class="row g-4 mb-4">

    <div class="col-lg-3">

        <div class="card summary-card bg-primary text-white shadow">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small>Tahun Akademik</small>

                    <h4 class="fw-bold mt-2">

                        {{ $krs->tahun_ajaran }}

                    </h4>

                </div>

                <i class="bi bi-calendar-event-fill display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card summary-card bg-success text-white shadow">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small>Semester</small>

                    <h3 class="fw-bold mt-2">

                        {{ ucfirst($krs->semester) }}

                    </h3>

                </div>

                <i class="bi bi-layers-fill display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card summary-card bg-info text-white shadow">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small>Total SKS</small>

                    <h3 class="fw-bold mt-2">

                        {{ $krs->total_sks }}

                    </h3>

                </div>

                <i class="bi bi-book-half display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card summary-card
            @if($krs->status=='approved')
                bg-success
            @elseif($krs->status=='pending')
                bg-warning
            @else
                bg-danger
            @endif text-white shadow">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small>Status KRS</small>

                    <h5 class="fw-bold mt-2">

                        {{ ucfirst($krs->status) }}

                    </h5>

                </div>

                <i class="bi bi-patch-check-fill display-6"></i>

            </div>

        </div>

    </div>

</div>

{{-- DETAIL --}}
<div class="card study-card shadow mb-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            <i class="bi bi-card-checklist"></i>

            Ringkasan Akademik

        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-4">

                <div class="d-flex">

                    <div class="icon-circle bg-primary text-white me-3">

                        <i class="bi bi-calendar-event"></i>

                    </div>

                    <div>

                        <small class="text-muted">

                            Tahun Akademik

                        </small>

                        <h5 class="fw-bold">

                            {{ $krs->tahun_ajaran }}

                        </h5>

                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="d-flex">

                    <div class="icon-circle bg-success text-white me-3">

                        <i class="bi bi-layers"></i>

                    </div>

                    <div>

                        <small class="text-muted">

                            Semester

                        </small>

                        <h5 class="fw-bold">

                            {{ ucfirst($krs->semester) }}

                        </h5>

                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="d-flex">

                    <div class="icon-circle bg-info text-white me-3">

                        <i class="bi bi-book-half"></i>

                    </div>

                    <div>

                        <small class="text-muted">

                            Total SKS

                        </small>

                        <h5 class="fw-bold">

                            {{ $krs->total_sks }} SKS

                        </h5>

                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="d-flex">

                    <div class="icon-circle
                    @if($krs->status=='approved')
                    bg-success
                    @elseif($krs->status=='pending')
                    bg-warning
                    @else
                    bg-danger
                    @endif
                    text-white me-3">

                        <i class="bi bi-patch-check-fill"></i>

                    </div>

                    <div>

                        <small class="text-muted">

                            Status Akademik

                        </small>

                        <h5 class="fw-bold">

                            @if($krs->status=='approved')

                                <span class="badge bg-success px-3 py-2">

                                    Disetujui

                                </span>

                            @elseif($krs->status=='pending')

                                <span class="badge bg-warning px-3 py-2">

                                    Menunggu Approval

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Ditolak

                                </span>

                            @endif

                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- PROGRESS AKADEMIK --}}
<div class="card study-card shadow">

    <div class="card-header bg-white">

        <h5 class="mb-0 text-primary">

            <i class="bi bi-graph-up-arrow"></i>

            Progress Akademik

        </h5>

    </div>

    <div class="card-body">

        <div class="d-flex justify-content-between">

            <span>Total SKS Saat Ini</span>

            <strong>{{ $krs->total_sks }} / 144 SKS</strong>

        </div>

        <div class="progress mt-3" style="height:14px;border-radius:20px;">

            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"

                 style="width: {{ min(($krs->total_sks/144)*100,100) }}%">

            </div>

        </div>

        <small class="text-muted mt-3 d-block">

            Progress ini dihitung berdasarkan target kelulusan 144 SKS.

        </small>

    </div>

</div>

@endif

</div>

@endsection