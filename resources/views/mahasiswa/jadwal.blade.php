@extends('layouts.app')

@section('title','Jadwal Kuliah')

@section('content')

<style>

.schedule-card{
    border:none;
    border-radius:20px;
    transition:.35s;
    overflow:hidden;
}

.schedule-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 45px rgba(13,110,253,.18);
}

.gradient-header{
    background:linear-gradient(135deg,#0d6efd,#4f8dfd);
    color:white;
    border-radius:20px;
}

.stat-card{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.icon-box{

    width:55px;
    height:55px;

    border-radius:15px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:rgba(255,255,255,.18);

    font-size:24px;

}

.info-label{

    font-size:13px;
    color:#6c757d;

}

.course-title{

    font-size:18px;
    font-weight:700;

}

.badge-soft{

    background:#eef5ff;
    color:#0d6efd;
    border-radius:20px;
    padding:8px 14px;

}

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="gradient-header shadow p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-2">

                    <i class="bi bi-calendar2-week-fill"></i>

                    Jadwal Kuliah

                </h2>

                <p class="mb-0 opacity-75">

                    Semester {{ ucfirst($krs->semester ?? '-') }}
                    •
                    Tahun Akademik {{ $krs->tahun_ajaran ?? '-' }}

                </p>

            </div>

            <i class="bi bi-mortarboard-fill display-4 opacity-50"></i>

        </div>

    </div>

@if(!$krs)

<div class="card border-0 shadow rounded-4">

    <div class="card-body text-center py-5">

        <i class="bi bi-calendar-x display-1 text-secondary"></i>

        <h3 class="mt-4">

            Belum Ada Jadwal Kuliah

        </h3>

        <p class="text-muted">

            Anda belum melakukan pengisian KRS.

        </p>

        <a href="{{ route('krs.index') }}"
           class="btn btn-primary px-4">

            Isi KRS

        </a>

    </div>

</div>

@else

{{-- STATISTIK --}}
<div class="row g-4 mb-4">

    <div class="col-lg-3">

        <div class="card stat-card bg-primary text-white shadow">

            <div class="card-body d-flex justify-content-between">

                <div>

                    <small>Total Mata Kuliah</small>

                    <h2 class="fw-bold">

                        {{ $krs->detail->count() }}

                    </h2>

                </div>

                <i class="bi bi-book-half display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card stat-card bg-success text-white shadow">

            <div class="card-body d-flex justify-content-between">

                <div>

                    <small>Total SKS</small>

                    <h2 class="fw-bold">

                        {{ $krs->total_sks }}

                    </h2>

                </div>

                <i class="bi bi-award-fill display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card stat-card bg-info text-white shadow">

            <div class="card-body d-flex justify-content-between">

                <div>

                    <small>Status</small>

                    <h5 class="fw-bold mt-2">

                        {{ ucfirst($krs->status) }}

                    </h5>

                </div>

                <i class="bi bi-patch-check-fill display-6"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card stat-card bg-warning text-white shadow">

            <div class="card-body d-flex justify-content-between">

                <div>

                    <small>Tahun Ajaran</small>

                    <h5 class="fw-bold mt-2">

                        {{ $krs->tahun_ajaran }}

                    </h5>

                </div>

                <i class="bi bi-calendar3 display-6"></i>

            </div>

        </div>

    </div>

</div>

{{-- LIST MATA KULIAH --}}

<div class="row">

@foreach($krs->detail as $detail)

<div class="col-lg-6 mb-4">

<div class="card schedule-card shadow">

<div class="card-body p-4">

<div class="d-flex justify-content-between">

<div>

<div class="badge-soft mb-3">

{{ $detail->kelas->kode_kelas }}

</div>

<div class="course-title">

{{ $detail->kelas->mataKuliah->nama_matkul }}

</div>

<p class="text-muted mb-0">

{{ $detail->kelas->dosen->nama_dosen }}

</p>

</div>

<div class="icon-box">

<i class="bi bi-journal-bookmark-fill text-white"></i>

</div>

</div>

<hr>

<div class="row">

<div class="col-6 mb-3">

<div class="info-label">

Hari

</div>

<strong>

{{ $detail->kelas->hari }}

</strong>

</div>

<div class="col-6 mb-3">

<div class="info-label">

Jam

</div>

<strong>

{{ $detail->kelas->jam }}

</strong>

</div>

<div class="col-6">

<div class="info-label">

Ruangan

</div>

<strong>

{{ $detail->kelas->ruang_kelas }}

</strong>

</div>

<div class="col-6">

<div class="info-label">

SKS

</div>

<span class="badge bg-primary">

{{ $detail->kelas->mataKuliah->sks }} SKS

</span>

</div>

</div>

</div>

</div>

</div>

@endforeach

</div>

@endif

</div>

@endsection