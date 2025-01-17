@extends('layouts.front.template')

@section('content')
    {{-- Hero Section --}}
    <div class="container-fluid col-xxl-12 d-flex justify-content-center py-0 px-0 position-relative">
        <img src="{{ url('assets/img/gerbang-sekolah.webp') }}" alt="Gerbang Sekolah" class="kontak-img mx-auto w-100">
        <div class="position-absolute bg-secondary w-100 h-100 opacity-75">
        </div>
        <h1 class="hero-title position-absolute top-50 text-white fw-bold">Kontak Kami</h1>
    </div>
    {{-- End Hero Section --}}

    {{-- Form Kontak Kami Section --}}
    <div class="syarat-wrapper bg-light mx-0" id="syarat">
        <div class="container py-5">
            <div class="row">
                <div class="col-6">
                    <h3 class="kontak-head">
                        Kritik dan Saran bisa dengan mengisi form dibawah ini.
                    </h3>
                    <form action="" method="post">
                        <div class="form-group my-2">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="3" style="height: 180px" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item bg-transparent border-0">
                            <h3 class="kontak-head">Kontak Kami</h3>
                        </li>
                        <li class="list-group-item bg-transparent border-0 d-flex align-items-center">
                            <img src="{{ url('assets/img/logo-xs.webp') }}" alt="Logo Sekolah" style="width: 36px" class="brand-thumb pr-3">
                            <a href="https://sekolahalamkarawang.sch.id" class="pl-5 text-decoration-none text-black fs-5">SD Alam Amani Karawang</a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <i class="fas fa-globe"></i>
                            <a href="https://sekolahalamkarawang.sch.id" class="pl-5 text-decoration-none text-black">https://sekolahalamkarawang.sch.id</a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <i class="fab fa-facebook-square"></i>
                            <a href="https://www.facebook.com/profile.php?id=100057332984504" class="pl-5 text-decoration-none text-black">Sekolah Alam Karawang</a>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <i class="fab fa-instagram"></i>
                            <a href="https://instagram.com/sekolahalamkarawang" class="pl-5 text-decoration-none text-black">Sekolah Alam Karawang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- End Form Kontak Kami Section --}}
@endsection
@push('scripts')
    <script>
        $(".carousel").carousel();
        $("#fasilitasCarousel").carousel();
    </script>
@endpush
