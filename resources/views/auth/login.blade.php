<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - SIAKAD ITBSS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{

            margin:0;

            padding:0;

            min-height:100vh;

            background:linear-gradient(135deg,#0d6efd,#4e73df);

            display:flex;

            justify-content:center;

            align-items:center;

        }

        .login-card{

            width:460px;

            background:#fff;

            border-radius:20px;

            padding:40px;

            box-shadow:0 15px 40px rgba(0,0,0,.18);

            transition:.3s;

        }

        .login-card:hover{

            transform:translateY(-5px);

        }

        .logo{

            width:95px;

        }

        h3{

            font-weight:700;

            color:#0d6efd;

        }

        .form-label{

            font-weight:500;

        }

        .form-control{

            height:50px;

            border-radius:10px;

        }

        .input-group .btn{

            border-radius:0 10px 10px 0;

        }

        .btn-login{

            height:50px;

            border-radius:10px;

            font-weight:600;

            transition:.3s;

        }

        .btn-login:hover{

            transform:translateY(-2px);

        }

        .text-muted{

            font-size:14px;

        }

        a{

            text-decoration:none;

        }

    </style>

</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">

        <img src="https://pmb.itbss.civitas.id/daftar/resources/ITB-SS.png"
             class="logo"
             alt="Logo ITBSS">

        <h3 class="mt-3">

            SIAKAD ITBSS

        </h3>

        <p class="text-muted">

            Sistem Informasi Akademik<br>
            Institut Teknologi Bisnis Sabda Setia

        </p>

    </div>

    {{-- Login Gagal --}}
    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- Register Berhasil --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Validasi --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST"
          action="{{ route('login.post') }}">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input

                type="email"

                name="email"

                class="form-control"

                value="{{ old('email') }}"

                placeholder="Masukkan Email"

                required

                autofocus>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Password

            </label>

            <div class="input-group">

                <input

                    type="password"

                    id="password"

                    name="password"

                    class="form-control"

                    placeholder="Masukkan Password"

                    required>

                <button

                    type="button"

                    class="btn btn-outline-secondary"

                    onclick="togglePassword()">

                    <i class="bi bi-eye" id="icon"></i>

                </button>

            </div>

        </div>

        <button

            type="submit"

            class="btn btn-primary w-100 btn-login">

            <i class="bi bi-box-arrow-in-right"></i>

            Login

        </button>

    </form>

    <hr>

    <div class="text-center">

        Belum punya akun?

        <a href="{{ route('register') }}"
           class="fw-semibold">

            Daftar

        </a>

    </div>

</div>

<script>

function togglePassword(){

    let password=document.getElementById("password");

    let icon=document.getElementById("icon");

    if(password.type==="password"){

        password.type="text";

        icon.className="bi bi-eye-slash";

    }else{

        password.type="password";

        icon.className="bi bi-eye";

    }

}

</script>

</body>

</html>