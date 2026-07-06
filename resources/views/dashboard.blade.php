<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar{
            background-color: white;
            padding-top: 12px;
            padding-bottom: 10px;
            padding-left: 18px;
            padding-right: 18px;
            border-bottom: 1px solid #e9e9e9;
        }

        .logo-kampus{
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .navbar-nav .nav-link{
            font-size: 15px;
            color: #444;
            margin-right: 10px;
        }

        .navbar-nav .nav-link:hover{
            color: black;
        }

        /* Search */
        .form-control-sm{
            height: 31px;
            font-size: 13px;
        }

        .btn-search{
            font-size: 13px;
            height: 31px;
            padding-left: 12px;
            padding-right: 12px;
        }

        /* Content */
        .content-area{
            padding-left: 22px;
            padding-right: 22px;
            margin-top: 20px;
        }

        /* Button Create */
        .btn-create{
            font-size: 13px;
            padding: 5px 12px;
            border-radius: 3px;
            border: 1px solid #bcbcbc;
            background-color: #f8f9fa;
            color: #333;
            margin-bottom: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-create:hover{
            background-color: #eeeeee;
        }

        /* Table */
        .table{
            margin-bottom: 0;
        }

        .table thead th{
            border-bottom: none !important;
            font-size: 15px;
            font-weight: 600;
            color: #333;
            padding-top: 0;
            padding-bottom: 14px;
        }

        .table tbody td{
            border-top: none !important;
            font-size: 14px;
            color: #444;
            padding-top: 14px;
        }

        /* Width Kolom */
        .col-no{
            width: 80px;
        }

        .col-kode{
            width: 280px;
        }

        .col-nama{
            width: 360px;
        }

        .col-tanggal{
            width: 260px;
        }

        .col-aksi{
            width: 150px;
            text-align: center;
        }

    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid p-0">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center m-0"
               href="{{ route('dashboard') }}">

                <img src="{{ asset('images/logo.png') }}"
                     alt="Logo"
                     class="rounded-circle logo-kampus">

            </a>

            <!-- Toggle -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse"
                 id="navbarNav">

                <ul class="navbar-nav">

                    <!-- Home -->
                    <li class="nav-item">

                        <a class="nav-link active"
                           href="{{ route('dashboard') }}">

                            Home

                        </a>

                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            Menu

                        </a>

                        <ul class="dropdown-menu">

                            <!-- Mahasiswa -->
                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('mahasiswa.index') }}">

                                    Mahasiswa

                                </a>

                            </li>

                            <!-- Dosen -->
                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('dosen.index') }}">

                                    Dosen

                                </a>

                            </li>

                            <!-- Jurusan -->
                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('jurusan.index') }}">

                                    Jurusan

                                </a>

                            </li>

                            <!-- Mata Kuliah -->
                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('matakuliah.index') }}">

                                    Mata Kuliah

                                </a>

                            </li>

                            <!-- Kelas -->
                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('kelas.index') }}">

                                    Kelas

                                </a>

                            </li>

                        </ul>

                    </li>

                </ul>

                <!-- Search -->
                <form class="d-flex ms-auto"
                      role="search">

                    <input class="form-control form-control-sm me-2"
                           type="search"
                           placeholder="Search">

                    <button class="btn btn-outline-secondary btn-sm btn-search"
                            type="submit">

                        Search

                    </button>

                </form>

            </div>

        </div>

    </nav>

    <!-- Content -->
    <div class="content-area">

        <!-- Button Create -->
        <a href="{{ route('jurusan.create') }}"
           class="btn-create">

            Create

        </a>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th class="col-no">
                            No
                        </th>

                        <th class="col-kode">
                            Kode Jurusan
                        </th>

                        <th class="col-nama">
                            Nama Jurusan
                        </th>

                        <th class="col-tanggal">
                            Tanggal Dibuat
                        </th>

                        <th class="col-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    {{-- Nanti isi foreach data --}}

                    {{--
                    @foreach($jurusan as $j)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $j->kode_jurusan }}</td>

                        <td>{{ $j->nama_jurusan }}</td>

                        <td>{{ $j->created_at }}</td>

                        <td>

                            Tombol Edit / Hapus

                        </td>

                    </tr>

                    @endforeach
                    --}}

                </tbody>

            </table>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>