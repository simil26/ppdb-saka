<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.dashboard') }}" class="brand-link">
        <img src="{{ url('assets/img/logo-sm.webp') }}" alt="PPDB Saka Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>PPDB SAKA</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('assets/adminlte') }}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block text-white">{{ $userName }}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.dataDiri') }}" class="nav-link {{ $active == 'data-diri' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Diri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.dataOrangTua') }}" class="nav-link {{ $active == 'data-orang-tua' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Orang Tua
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.dataPeriodik') }}" class="nav-link {{ $active == 'data-periodik' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Data Periodik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    @if (session('uploadFiles'))
                        <a href="{{ route('user.uploadFiles.selesai') }}" class="nav-link {{ $active == 'dokumen-pendaftaran' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Unggah Dokumen
                            </p>
                        </a>
                    @else
                        <a href="{{ route('user.uploadFiles') }}" class="nav-link {{ $active == 'upload-files' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Unggah Dokumen
                            </p>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    <a href="{{ route('logoutAttempt') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
