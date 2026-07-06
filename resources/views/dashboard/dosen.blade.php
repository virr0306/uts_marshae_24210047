@extends('layouts.app')

@section('title','Dashboard Dosen')

@section('content')

<div class="container-fluid">

    {{-- Welcome --}}
    <div class="card border-0 shadow rounded-4 mb-4">
        <div class="card-body">
            <h2 class="fw-bold">
                Selamat Datang,
                {{ Auth::user()->name }} 👋
            </h2>

            <p class="text-muted mb-0">
                Anda login sebagai <strong>Dosen</strong>.
            </p>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white shadow border-0 rounded-4">
                <div class="card-body">

                    <small>Total Mahasiswa</small>

                    <h2 class="fw-bold">
                        {{ $mahasiswa }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white shadow border-0 rounded-4">
                <div class="card-body">

                    <small>Total Dosen</small>

                    <h2 class="fw-bold">
                        {{ $dosen }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white shadow border-0 rounded-4">
                <div class="card-body">

                    <small>Jurusan</small>

                    <h2 class="fw-bold">
                        {{ $jurusan }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white shadow border-0 rounded-4">
                <div class="card-body">

                    <small>Mata Kuliah</small>

                    <h2 class="fw-bold">
                        {{ $matakuliah }}
                    </h2>

                </div>
            </div>
        </div>

    </div>

    {{-- Grafik --}}
    <div class="card shadow border-0 rounded-4 mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">
                Statistik Akademik
            </h5>

        </div>

        <div class="card-body">

            <canvas id="dashboardChart"></canvas>

        </div>

    </div>

    {{-- Aktivitas --}}
    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">

                Aktivitas Terbaru

            </h5>

        </div>

        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    📘 Mata kuliah berhasil ditambahkan
                </li>

                <li class="list-group-item">
                    👨‍🏫 Data dosen diperbarui
                </li>

                <li class="list-group-item">
                    🎓 Mahasiswa baru terdaftar
                </li>

                <li class="list-group-item">
                    🏫 Jurusan berhasil diperbarui
                </li>

            </ul>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

const ctx=document.getElementById('dashboardChart');

new Chart(ctx,{

    type:'bar',

    data:{

        labels:[
            'Mahasiswa',
            'Dosen',
            'Jurusan',
            'Mata Kuliah'
        ],

        datasets:[{

            data:[
                {{ $mahasiswa }},
                {{ $dosen }},
                {{ $jurusan }},
                {{ $matakuliah }}
            ]

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
                beginAtZero:true
            }

        }

    }

});

</script>

@endpush