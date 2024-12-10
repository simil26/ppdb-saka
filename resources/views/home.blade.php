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


    {{-- Kegiatan Section --}}
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

    {{-- Fasilitas Section --}}
    <div class="fasilitas-wrapper bg-light mx-0" id="fasilitas">
        <div class="container py-5">
            <div class="row pt-3">
                <div class="col-12 text-center">
                    <h3 class="fasilitas-head">
                        Fasilitas
                    </h3>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <div id="fasilitasCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M0 224v272c0 8.8 7.2 16 16 16h80V192H32c-17.7 0-32 14.3-32 32zm360-48h-24v-40c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm137.8-64l-160-106.7a32 32 0 0 0 -35.5 0l-160 106.7A32 32 0 0 0 128 138.7V512h128V368c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v144h128V138.7c0-10.7-5.4-20.7-14.3-26.6zM320 256c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm288-64h-64v320h80c8.8 0 16-7.2 16-16V224c0-17.7-14.3-32-32-32z" />
                                </svg>
                                <h3 class="text-center ">
                                    Gedung Permanen
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M542.2 32.1c-54.8 3.1-163.7 14.4-231 55.6-4.6 2.8-7.3 7.9-7.3 13.2v363.9c0 11.6 12.6 18.9 23.3 13.5 69.2-34.8 169.2-44.3 218.7-46.9 16.9-.9 30-14.4 30-30.7V62.8c0-17.7-15.4-31.7-33.8-30.7zM264.7 87.6C197.5 46.5 88.6 35.2 33.8 32.1 15.4 31 0 45 0 62.8V400.6c0 16.2 13.1 29.8 30 30.7 49.5 2.6 149.6 12.1 218.8 47 10.6 5.4 23.2-1.9 23.2-13.5V100.6c0-5.3-2.6-10.1-7.3-13z" />
                                </svg>
                                <h3 class="text-center ">
                                    Perpustakaan
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M528 0H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h192l-16 48h-72c-13.3 0-24 10.7-24 24s10.7 24 24 24h272c13.3 0 24-10.7 24-24s-10.7-24-24-24h-72l-16-48h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-16 352H64V64h448v288z" />
                                </svg>
                                <h3 class="text-center ">
                                    Laboratorium Komputer
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M64 96H0c0 123.7 100.3 224 224 224v144c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V320C288 196.3 187.7 96 64 96zm384-64c-84.2 0-157.4 46.5-195.7 115.2 27.7 30.2 48.2 66.9 59 107.6C424 243.1 512 147.9 512 32h-64z" />
                                </svg>
                                <h3 class="text-center ">
                                    Lahan Berkebun
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M624 448h-24.7L359.5 117.8l53.4-73.6c5.2-7.2 3.6-17.2-3.5-22.4l-25.9-18.8c-7.2-5.2-17.2-3.6-22.4 3.6L320 63.3 278.8 6.6c-5.2-7.2-15.2-8.7-22.4-3.6l-25.9 18.8c-7.2 5.2-8.7 15.2-3.5 22.4l53.4 73.6L40.7 448H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h608c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM320 288l116.4 160H203.6L320 288z" />
                                </svg>
                                <h3 class="text-center ">
                                    Instalasi Outbond
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M0 480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V160H0v320zm579.2-192c17.9-17.4 28.8-37.3 28.8-58.9 0-52.9-41.8-93.8-87.9-122.9-41.9-26.5-80.6-57.8-112-96.2L400 0l-8.1 10c-31.3 38.5-70 69.8-112 96.2C233.8 135.3 192 176.2 192 229.1c0 21.6 11 41.5 28.8 58.9h358.3zM608 320H192c-17.7 0-32 14.3-32 32v128c0 17.7 14.3 32 32 32h32v-64c0-17.7 14.3-32 32-32s32 14.3 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.7 14.3-32 32-32s32 14.3 32 32v64h32c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                                </svg>
                                <h3 class="text-center ">
                                    Masjid
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 616 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5 .6 9.1 .9 13.7 .9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1 .8-12.1 1.2-18.2 1.2z" />
                                </svg>
                                <h3 class="text-center ">
                                    Kantin Sehat
                                </h3>
                            </div>
                            <div class="carousel-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="d-block mx-auto" fill="#a0a0a0" width="128" height="128" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M320 384H128V224H64v256c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V224h-64v160zm314.6-241.8l-85.3-128c-6-8.9-16-14.2-26.7-14.2H117.4c-10.7 0-20.7 5.3-26.6 14.2l-85.3 128c-14.2 21.3 1 49.8 26.6 49.8H608c25.5 0 40.7-28.5 26.6-49.8zM512 496c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V224h-64v272z" />
                                </svg>
                                <h3 class="text-center ">
                                    Koperasi Sekolah
                                </h3>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#fasilitasCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Fasilitas Section --}}
@endsection
@push('scripts')
    <script>
        $(".carousel").carousel();
        $("#fasilitasCarousel").carousel();
    </script>
@endpush
