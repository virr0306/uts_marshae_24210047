@extends('layouts.app')

@section('title','Dashboard Mahasiswa')

@section('content')

<div class="container-fluid">

    {{-- ==========================
        WELCOME
    =========================== --}}
    <div class="card border-0 shadow rounded-4 mb-4">

        <div class="card-body p-4">

            <h3 class="fw-bold">

                Selamat Datang,

                {{ Auth::user()->name }}

                👋

            </h3>

            <p class="text-muted mb-0">

                Selamat datang di

                <strong>Sistem Informasi Akademik ITBSS.</strong>

                Silakan melihat jadwal kuliah, mata kuliah, serta informasi akademik Anda.

            </p>

        </div>

    </div>

    {{-- ==========================
        CARD STATISTIK
    =========================== --}}
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="card stat-card bg-primary text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Mata Kuliah</small>

                            <h2 class="fw-bold mt-2">

                                    {{ $jumlahMatkul }}

                            </h2>

                        </div>

                        <i class="bi bi-book-half fs-1 opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card stat-card bg-success text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Total SKS</small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalSKS }}

                            </h2>

                        </div>

                        <i class="bi bi-journal-check fs-1 opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card stat-card bg-warning text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>Semester</small>

                            <h2 class="fw-bold mt-2">

                                {{ $semester }}

                            </h2>

                        </div>

                        <i class="bi bi-mortarboard-fill fs-1 opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card stat-card bg-danger text-white">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small>IPK</small>

                            <h2 class="fw-bold mt-2">

                                3.82

                            </h2>

                        </div>

                        <i class="bi bi-award-fill fs-1 opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>
        {{-- =====================================
        GRAFIK + JADWAL
    ====================================== --}}
    <div class="row mt-4">

        {{-- Grafik --}}
        <div class="col-lg-8 mb-4">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-white">

                    <h5 class="fw-bold mb-0">
                        Statistik Akademik Saya
                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="chartMahasiswa" height="110"></canvas>

                </div>

            </div>

        </div>

        {{-- Jadwal Hari Ini --}}
        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-header bg-white">

                    <h5 class="fw-bold mb-0">

                        Jadwal Hari Ini

                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex mb-3">

                        <div class="me-3">

                            <span class="badge bg-primary p-3">
                                08.00
                            </span>

                        </div>

                        <div>

                            <strong>Pemrograman Web</strong>

                            <div class="text-muted">
                                Ruang Lab Komputer
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex mb-3">

                        <div class="me-3">

                            <span class="badge bg-success p-3">
                                10.00
                            </span>

                        </div>

                        <div>

                            <strong>Basis Data</strong>

                            <div class="text-muted">
                                Ruang 305
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex">

                        <div class="me-3">

                            <span class="badge bg-warning text-dark p-3">
                                13.00
                            </span>

                        </div>

                        <div>

                            <strong>Digital Marketing</strong>

                            <div class="text-muted">
                                Ruang 210
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- =====================================
        PENGUMUMAN
    ====================================== --}}
    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                Pengumuman Kampus

            </h5>

        </div>

        <div class="card-body">

            <div class="alert alert-primary">

                📢 Pengisian KRS dibuka tanggal
                <strong>1 - 10 Agustus 2026.</strong>

            </div>

            <div class="alert alert-success">

                🎓 Jadwal UTS Semester Ganjil
                telah dipublikasikan.

            </div>

            <div class="alert alert-warning">

                📚 Pastikan seluruh administrasi
                akademik telah diselesaikan.

            </div>

        </div>

    </div>

@endsection

@push('scripts')

<script>

const ctx = document.getElementById('chartMahasiswa');

new Chart(ctx,{

    type:'line',

    data:{

        labels:[
            'Semester 1',
            'Semester 2',
            'Semester 3',
            'Semester 4',
            'Semester 5'
        ],

        datasets:[{

            label:'IPK',

            data:[
                3.10,
                3.25,
                3.45,
                3.60,
                3.72
            ],

            borderColor:'#0d6efd',

            backgroundColor:'rgba(13,110,253,.15)',

            fill:true,

            tension:.4,

            pointRadius:5

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{
                display:false
            }

        },

        scales:{

            y:{

                min:2,

                max:4

            }

        }

    }

});

</script>

@endpush

3.82