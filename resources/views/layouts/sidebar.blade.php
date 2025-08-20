<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- Bisa isi logo di sini -->
        </div>
        <div class="sidebar-brand-text mx-3">METU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menuDashboard ?? '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->check() && auth()->user()->jabatan === 'Admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Admin
        </div>

        <!-- Nav Item - Data User -->
        <li class="nav-item {{ $menuAdminUser ?? '' }}">
            <a class="nav-link" href="{{ route('user') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span>
            </a>
        </li>

        <!-- Nav Item - Data Tugas -->
        <li class="nav-item {{ $menuAdminTugas ?? '' }}">
            <a class="nav-link" href="{{ route('tugas') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Data Tugas</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    @else
        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Karyawan
        </div>

        <!-- Nav Item - Data Tugas -->
        <li class="nav-item {{ $menuKaryawanTugas ?? '' }}">
            <a class="nav-link" href="{{ route('tugas') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Data Tugas</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
