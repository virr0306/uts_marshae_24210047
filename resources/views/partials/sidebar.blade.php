<div class="sidebar">

    <!-- Logo -->
    <div class="sidebar-header">

        <img src="https://pmb.itbss.civitas.id/daftar/resources/ITB-SS.png"
             class="sidebar-logo">

        <h3>SIAKAD</h3>

        <p>Institut Teknologi dan Bisnis Sabda Setia</p>

    </div>

    {{-- ==========================
        MENU DOSEN
    =========================== --}}
    @if(Auth::user()->role == 'dosen')

        <div class="menu-title">
            MENU UTAMA
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('dashboard.dosen') }}"
                   class="{{ request()->routeIs('dashboard.dosen') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.index') }}"
                   class="{{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill"></i>
                    Mahasiswa
                </a>
            </li>

            <li>
                <a href="{{ route('dosen.index') }}"
                   class="{{ request()->routeIs('dosen.index') ? 'active' : '' }}">
                    <i class="bi bi-person-workspace"></i>
                    Dosen
                </a>
            </li>

            <li>
                <a href="{{ route('jurusan.index') }}"
                   class="{{ request()->routeIs('jurusan.index') ? 'active' : '' }}">
                    <i class="bi bi-building"></i>
                    Jurusan
                </a>
            </li>

            <li>
                <a href="{{ route('matakuliah.index') }}"
                   class="{{ request()->routeIs('matakuliah.index') ? 'active' : '' }}">
                    <i class="bi bi-book-half"></i>
                    Mata Kuliah
                </a>
            </li>

            <li>
                <a href="{{ route('kelas.index') }}"
                   class="{{ request()->routeIs('kelas.index') ? 'active' : '' }}">
                    <i class="bi bi-calendar3"></i>
                    Kelas
                </a>
            </li>
            <li>
                <a href="{{ route('approval.index') }}"
                class="{{ request()->routeIs('approval.*') ? 'active' : '' }}">
                    <i class="bi bi-check2-square"></i>
                    Approval KRS
                </a>
            </li>
        </ul>

    @endif


    {{-- ==========================
        MENU MAHASISWA
    =========================== --}}
    @if(Auth::user()->role == 'mahasiswa')

        <div class="menu-title">
            MENU MAHASISWA
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('dashboard.mahasiswa') }}"
                   class="{{ request()->routeIs('dashboard.mahasiswa') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('krs.index') }}"
                   class="{{ request()->routeIs('krs.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-check"></i>
                    Pengisian KRS
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.jadwal') }}"
                   class="{{ request()->routeIs('mahasiswa.jadwal') ? 'active' : '' }}">
                    <i class="bi bi-calendar-week"></i>
                    Jadwal Kuliah
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.hasilstudi') }}"
                   class="{{ request()->routeIs('mahasiswa.hasilstudi') ? 'active' : '' }}">
                    <i class="bi bi-card-checklist"></i>
                    Hasil Studi
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.profil') }}"
                   class="{{ request()->routeIs('mahasiswa.profil') ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i>
                    Profil Saya
                </a>
            </li>

        </ul>

    @endif


    {{-- ==========================
        USER
    =========================== --}}
    <div class="sidebar-user">

        <div class="avatar">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

        <h5>
            {{ Auth::user()->name }}
        </h5>

        <small>
            {{ ucfirst(Auth::user()->role) }}
        </small>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>

        </form>

    </div>

</div>