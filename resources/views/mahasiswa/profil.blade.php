@extends('layouts.app')

@section('title','Profil Mahasiswa')

@section('content')

<div class="container-fluid">

    <div class="row">

        {{-- ===========================
            PROFILE CARD
        ============================ --}}
        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

                <div class="bg-primary"
                     style="height:130px;">
                </div>

                <div class="card-body text-center mt-n5">

                    <div class="rounded-circle bg-primary text-white d-inline-flex
                                justify-content-center align-items-center shadow"
                         style="
                         width:120px;
                         height:120px;
                         font-size:48px;
                         font-weight:700;
                         border:5px solid #fff;
                         ">

                        {{ strtoupper(substr($mahasiswa->fullname,0,1)) }}

                    </div>

                    <h3 class="fw-bold mt-3 mb-1">

                        {{ $mahasiswa->fullname }}

                    </h3>

                    <p class="text-muted">

                        Mahasiswa ITBSS

                    </p>

                    <hr>

                    <div class="row text-center">

                        <div class="col-6">

                            <h5 class="fw-bold text-primary">

                                {{ $mahasiswa->NIM }}

                            </h5>

                            <small class="text-muted">

                                NIM

                            </small>

                        </div>

                        <div class="col-6">

                            <h5 class="fw-bold text-success">

                                Aktif

                            </h5>

                            <small class="text-muted">

                                Status

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===========================
            BIODATA
        ============================ --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">

                        <i class="bi bi-person-vcard-fill"></i>

                        Informasi Mahasiswa

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                Nama Lengkap

                            </small>

                            <h6 class="fw-bold">

                                {{ $mahasiswa->fullname }}

                            </h6>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                Email

                            </small>

                            <h6 class="fw-bold">

                                {{ Auth::user()->email }}

                            </h6>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                NIM

                            </small>

                            <h6 class="fw-bold">

                                {{ $mahasiswa->NIM }}

                            </h6>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                NIDN

                            </small>

                            <h6 class="fw-bold">

                                {{ $mahasiswa->NIDN }}

                            </h6>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                Tempat Lahir

                            </small>

                            <h6 class="fw-bold">

                                {{ $mahasiswa->tempat_lahir }}

                            </h6>

                        </div>

                        <div class="col-md-6 mb-4">

                            <small class="text-muted">

                                Tanggal Lahir

                            </small>

                            <h6 class="fw-bold">

                                {{ optional($mahasiswa->tanggal_lahir)->format('d F Y') }}

                            </h6>

                        </div>

                        <div class="col-12">

                            <small class="text-muted">

                                Alamat

                            </small>

                            <h6 class="fw-bold">

                                {{ $mahasiswa->alamat }}

                            </h6>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ===========================
                QUICK INFO
            ============================ --}}

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="card border-0 shadow rounded-4">

                        <div class="card-body text-center">

                            <i class="bi bi-book-half display-5 text-primary"></i>

                            <h3 class="fw-bold mt-2">

                                {{ optional($mahasiswa->krs()->latest()->first())->total_sks ?? 0 }}

                            </h3>

                            <p class="text-muted mb-0">

                                Total SKS

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card border-0 shadow rounded-4">

                        <div class="card-body text-center">

                            <i class="bi bi-calendar-week display-5 text-success"></i>

                            <h3 class="fw-bold mt-2">

                                {{ ucfirst(optional($mahasiswa->krs()->latest()->first())->semester ?? '-') }}

                            </h3>

                            <p class="text-muted mb-0">

                                Semester

                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card border-0 shadow rounded-4">

                        <div class="card-body text-center">

                            <i class="bi bi-patch-check-fill display-5 text-warning"></i>

                            <h3 class="fw-bold mt-2">

                                {{ ucfirst(optional($mahasiswa->krs()->latest()->first())->status ?? '-') }}

                            </h3>

                            <p class="text-muted mb-0">

                                Status KRS

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection