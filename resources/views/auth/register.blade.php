<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - SIAKAD ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{

            background:linear-gradient(135deg,#0d6efd,#3b82f6);

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            font-family:'Segoe UI',sans-serif;

        }

        .register-card{

            width:500px;

            background:#fff;

            border-radius:20px;

            padding:40px;

            box-shadow:0 15px 40px rgba(0,0,0,.2);

        }

        .logo{

            width:90px;

        }

        .form-control,
        .form-select{

            height:48px;

            border-radius:10px;

        }

        .btn-register{

            height:48px;

            border-radius:10px;

            font-weight:600;

        }

    </style>

</head>

<body>

<div class="register-card">

    <div class="text-center mb-4">

        <img src="https://pmb.itbss.civitas.id/daftar/resources/ITB-SS.png"
             class="logo">

        <h3 class="mt-3 fw-bold">

            Sistem Informasi Akademik

        </h3>

        <small class="text-muted">

            Institut Teknologi Bisnis Sabda Setia

        </small>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST"
          action="{{ route('register.post') }}">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Nama Lengkap

            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Role

            </label>

            <select
                name="role"
                class="form-select"
                required>

                <option value="">-- Pilih Role --</option>

                <option value="dosen">Dosen</option>

                <option value="mahasiswa">Mahasiswa</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Password

            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Konfirmasi Password

            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                required>

        </div>

        <button
            class="btn btn-primary w-100 btn-register">

            <i class="bi bi-person-plus-fill"></i>

            Daftar

        </button>

    </form>

    <hr>

    <div class="text-center">

        Sudah punya akun?

        <a href="{{ route('login') }}"
           class="text-decoration-none">

            Login

        </a>

    </div>

</div>

</body>

</html>