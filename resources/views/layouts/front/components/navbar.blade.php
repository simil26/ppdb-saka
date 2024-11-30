    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="{{ url('assets/img/logo-xs.webp') }}" alt="Logo Sekolah Alam Karawang" style="width:48px; height:48px;">
                <span class="fw-semibold">PPDB Sekolah Alam Karawang</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="{{ url('') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="{{ url('login') }}">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="{{ url('data-pendaftar') }}">Data Pendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#syarat">Persyaratan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#kuota">Kuota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#jalur">Jalur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="{{ url('contact-us') }}">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}
