<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Perpus 7</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Penulis
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.author.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Penulis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.author.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Penulis</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                        Buku
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.book.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.book.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Buku</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book-reader"></i>
                      <p>
                        Peminjaman Buku
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.borrow.borrowed') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buku sedang dipinjam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.borrow.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>History Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Report
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.report.topBook') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buku teratas</p>
                            </a>
                            <a href="{{ route('admin.report.topUser') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User teraktif</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>