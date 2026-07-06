<nav class="top-navbar">

    <div class="container-fluid">

        <div class="row align-items-center w-100">

            <!-- =========================
                 LEFT
            ========================== -->

            <div class="col-lg-6 d-flex align-items-center">

                <!-- Toggle Sidebar -->
                <button
                    class="btn btn-light rounded-circle shadow-sm d-lg-none me-3"
                    id="sidebarToggle">

                    <i class="bi bi-list fs-4"></i>

                </button>

                <div>

                    <h4 class="page-title mb-1">

                        @yield('title','Dashboard')

                    </h4>

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">

                                <a
                                    href="{{ Auth::user()->role=='dosen'
                                        ? route('dashboard.dosen')
                                        : route('dashboard.mahasiswa') }}">

                                    Dashboard

                                </a>

                            </li>

                            <li class="breadcrumb-item active">

                                @yield('title','Dashboard')

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

            <!-- =========================
                 RIGHT
            ========================== -->

            <div class="col-lg-6">

                <div
                    class="d-flex justify-content-end align-items-center">

                    <!-- Search -->

                    <div class="search-box d-none d-md-flex me-4">

                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            placeholder="Cari menu..."
                            class="form-control border-0">

                    </div>

                    <!-- Notification -->

                    <button
                        class="btn btn-light rounded-circle shadow-sm position-relative me-3">

                        <i class="bi bi-bell fs-5"></i>

                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            3

                        </span>

                    </button>

                    <!-- Message -->

                    <button
                        class="btn btn-light rounded-circle shadow-sm position-relative me-3">

                        <i class="bi bi-envelope fs-5"></i>

                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">

                            5

                        </span>

                    </button>

                    <!-- User -->

                    <div class="dropdown">

                        <button
                            class="btn btn-light shadow-sm border-0 dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">

                            <div class="avatar-circle me-3">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                            <div class="text-start">

                                <div class="fw-semibold">

                                    {{ Auth::user()->name }}

                                </div>

                                <small class="text-muted">

                                    {{ ucfirst(Auth::user()->role) }}

                                </small>

                            </div>

                        </button>

                        <ul
                            class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                            <li>

                                <div class="px-3 py-2">

                                    <strong>

                                        {{ Auth::user()->name }}

                                    </strong>

                                    <br>

                                    <small class="text-muted">

                                        {{ Auth::user()->email }}

                                    </small>

                                </div>

                            </li>

                            <li>

                                <hr class="dropdown-divider">

                            </li>

                            <li>

                                <a
                                    class="dropdown-item py-2"
                                    href="#">

                                    <i class="bi bi-person me-2"></i>

                                    Profil

                                </a>

                            </li>

                            <li>

                                <a
                                    class="dropdown-item py-2"
                                    href="#">

                                    <i class="bi bi-gear me-2"></i>

                                    Pengaturan

                                </a>

                            </li>

                            <li>

                                <hr class="dropdown-divider">

                            </li>

                            <li>

                                <form
                                    method="POST"
                                    action="{{ route('logout') }}">

                                    @csrf

                                    <button
                                        class="dropdown-item text-danger py-2">

                                        <i class="bi bi-box-arrow-right me-2"></i>

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</nav>