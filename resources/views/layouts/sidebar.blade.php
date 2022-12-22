<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (Request::segment(1) == '')
    <li class="nav-item active">
        <a class="nav-link active" href="/">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/">
            @endif
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>

    @if (Request::segment(1) == 'tbbarang')
    <li class="nav-item active">
        <a class="nav-link active" href="/tbbarang">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/tbbarang">
            @endif
            <i class="fas fa-cubes"></i>
            <span>Data Barang</span></a>
    </li>

    @if (Request::segment(1) == 'customer')
    <li class="nav-item active">
        <a class="nav-link active" href="/customer">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/customer">
            @endif
            <i class="fas fa-users"></i>
            <span>Data Customer</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        TRANSAKSI
    </div>

    @if (Request::segment(1) == 'tbbeli')
    <li class="nav-item active">
        <a class="nav-link active" href="/tbbeli">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/tbbeli">
            @endif
            <i class="fas fa-sign-in-alt"></i>
            <span>Pembelian</span></a>
    </li>

    @if (Request::segment(1) == 'tbjual')
    <li class="nav-item active">
        <a class="nav-link active" href="/tbjual">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/tbjual">
            @endif
            <i class="fas fa-sign-out-alt"></i>
            <span>Penjualan</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>

    @if (Request::segment(1) == 'laporan-pembelian')
    <li class="nav-item active">
        <a class="nav-link active" href="/laporan-pembelian">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/laporan-pembelian">
            @endif
            <i class="fas fa-chart-line"></i>
            <span>Laporan Pembelian</span></a>
    </li>

    @if (Request::segment(1) == 'laporan-penjualan')
    <li class="nav-item active">
        <a class="nav-link active" href="/laporan-penjualan">
            @else
    <li class="nav-item">
        <a class="nav-link" href="/laporan-penjualan">
            @endif
            <i class="fas fa-chart-line"></i>
            <span>Laporan Penjualan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->