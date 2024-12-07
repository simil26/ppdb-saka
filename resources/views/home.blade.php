@extends('layouts.front.template')

@section('content')
    {{-- Hero Section --}}
    <div class="container col-xxl-8 px-4 py-3">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5 justify-content-center">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ url('assets/img/brosur-sd-sm.webp') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-7 fw-bold lh-1 mb-3">
                    Selamat Datang<br />
                    di Portal PPDB SD Alam Amani Karawang
                </h1>
                <p class="lead">Ini adalah halaman utama website Penerimaan Peserta Didik Bari (PPDB) Sekolah Alam Karawang. Di halaman ini berisi informasi utama yang dibutuhkan untuk melakukan pendaftaran PPDB.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="javascript:void(0)" class="btn btn-primary btn-lg px-4 me-md-2">Daftar</a>
                    <a href="#syarat" class="btn btn-outline-secondary btn-lg px-4"> Lihat Persyaratan</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Hero Section --}}

    {{-- Persyartan Section --}}
    <div class="syarat-wrapper bg-light mx-0" id="syarat">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="syarat-head">
                        Persyaratan dan Kuota <br> Pendaftaran
                    </h3>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-6" id="tk">
                    <div class="card rounded-4 border-0 shadow py-4" style="height: 280px">
                        <div class="card-title text-center">
                            <h4 class="syarat-sd">
                                Persyaratan
                            </h4>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Akta Kelahiran</li>
                                <li>Kartu Keluarga</li>
                                <li>KTP Orang Tua</li>
                                <li>Ijazah TK (Bila ada)</li>
                                <li>Transkrip Nilai TK (Bila ada)</li>
                                <li>Kartu Kesejahteraan KIP/KIS/KKS/KPS/PKH (Bila ada)</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" id="sd">
                    <div class="card rounded-4 border-0 shadow py-4" style="height: 280px">
                        <div class="card-title text-center">
                            <h4 class="kuota-sd">
                                Kuota
                            </h4>
                        </div>
                        <div class="card-body text-center">
                            <h2>
                                100
                            </h2>
                            <span>Siswa/i</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Persyaratan Section --}}


    {{-- Fasilitas Section --}}
    <div class="kegiatan-wrapper bg-light mx-0" id="kegiatan">
        <div class="container py-5">
            <div class="row pt-3">
                <div class="col-12 text-center">
                    <h3 class="kegiatan-head">
                        Kegiatan
                    </h3>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/img/kegiatan/backpacker.jpeg') }}" class="d-block mx-auto w-25" alt="backpacker">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/cooking-day.jpeg') }}" class="d-block mx-auto w-25" alt="cooking-day">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/ekspedisi.jpeg') }}" class="d-block mx-auto w-25" alt="ekspedisi">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/fun-camp.jpeg') }}" class="d-block mx-auto w-25" alt="fun-camp">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/gardening.jpeg') }}" class="d-block mx-auto w-25" alt="gardening">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/homevisit.jpeg') }}" class="d-block mx-auto w-25" alt="homevisit">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/internship.jpeg') }}" class="d-block mx-auto w-25" alt="internship">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/literasi.jpeg') }}" class="d-block mx-auto w-25" alt="literasi">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/market-day.jpeg') }}" class="d-block mx-auto w-25" alt="market-day">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/outing-class.jpeg') }}" class="d-block mx-auto w-25" alt="outing-class">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/performance.jpeg') }}" class="d-block mx-auto w-25" alt="performance">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/supercamp.jpeg') }}" class="d-block mx-auto w-25" alt="supercamp">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/img/kegiatan/survival.jpeg') }}" class="d-block mx-auto w-25" alt="survival">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Kegiatan Section --}}
@endsection
@push('scripts')
    <script>
        $(".carousel").carousel();
    </script>
@endpush
