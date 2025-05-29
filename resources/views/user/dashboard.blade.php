@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        @if ($biodata && $dataOrangTua && $dataPeriodik && $dataKesejahteraan && $uploadFiles)
                            <div class="callout callout-success bg-success">
                                <h3>
                                    Selamat datang! Calon Peserta Didik dengan No. {{ session('noreg_ppdb') }} <br>
                                    Anda sudah menyelesaikan proses pendaftaran Penerimaan Peserta Didik Baru.
                                </h3>
                                <p>
                                    Untuk hasil seleksi dan informasi lebih lanjut, silahkan tunggu informasi pengumuman pada tanggal yang sudah ditentukan.
                                </p>
                            </div>
                        @else
                            <div class="callout callout-info">
                                <h3>
                                    Selamat datang! <br /> Calon Peserta Didik dengan No. <b>{{ session('noreg_ppdb') }}</b><br>
                                    di Laman Pendaftaran PPDB SD Alam Amani Karawang.
                                </h3>

                                <p>
                                    Terima kasih telah melakukan pendaftaran di SD Alam Amani Karawang. Silahkan lengkapi data diri anda pada menu disamping untuk melanjutkan proses pendaftaran.
                                </p>
                                <p>
                                    Ini adalah halaman dashboard. Anda dapat melihat proses pendaftaran anda disini.
                                </p>
                            </div>
                        @endif
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-clipboard-check mr-1"></i>
                                    Status Pendaftaran
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="timeline">
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusBiodata'] == '1' ? 'fa-check bg-green' : 'fa-exclamation bg-yellow' }}"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Data Diri</h3>

                                                    <div class="timeline-body">

                                                        @if ($statusDaftarOnline['statusBiodata'] == '1')
                                                            Data diri sudah terisi dengan lengkap. Silahkan lanjut mengisi data orang tua.
                                                        @elseif($statusDaftarOnline['statusBiodata'] == '0')
                                                            Anda belum selesai mengisi data diri. Silahkan lengkapi data diri terlebih dahulu.
                                                        @else
                                                            Anda belum mengisi data diri. Silahkan isi data diri terlebih dahulu.
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusDataOrangTua'] == '1' ? 'fa-check bg-green' : ($statusDaftarOnline['statusBiodata'] == '1' || $statusDaftarOnline['statusDataOrangTua'] == '0' ? 'fa-exclamation bg-yellow' : 'fa-clock bg-gray') }}"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Data Orang Tua</h3>

                                                    <div class="timeline-body">
                                                        @if ($statusDaftarOnline['statusDataOrangTua'] == '1')
                                                            Data orang tua sudah terisi dengan lengkap. Silahkan lanjut mengisi data periodik.
                                                        @elseif ($statusDaftarOnline['statusDataOrangTua'] == '0')
                                                            Anda belum selesai mengisi data orang tua. Silahkan lengkapi data orang tua terlebih dahulu.
                                                        @else
                                                            Anda belum mengisi data diri. Silahkan isi data diri terlebih dahulu untuk dapat mengisi data orang tua.
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusDataPeriodik'] == '1' && $statusDaftarOnline['statusKesejahteraan'] == '1' ? 'fa-check bg-green' : ($statusDaftarOnline['statusDataPeriodik'] == '0' && $statusDaftarOnline['statusKesejahteraan'] == '0' ? 'fa-exclamation bg-yellow' : 'fa-clock bg-gray') }}"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Data Periodik dan Kesejahteraan</h3>

                                                    <div class="timeline-body">
                                                        @if ($statusDaftarOnline['statusDataPeriodik'] == '1' && $statusDaftarOnline['statusKesejahteraan'] == '1')
                                                            Data periodik dan kesejahteraan sudah terisi dengan lengkap. Silahkan lanjut mengunggah dokumen.
                                                        @elseif ($statusDaftarOnline['statusDataPeriodik'] == '0' && $statusDaftarOnline['statusKesejahteraan'] == '0')
                                                            Anda belum selesai mengisi data periodik dan kesejahteraan. Silahkan lengkapi data periodik dan kesejahteraan terlebih dahulu.
                                                        @elseif ($statusDaftarOnline['statusDataPeriodik'] == '0')
                                                            Anda belum selesai mengisi data periodik. Silahkan lengkapi data periodik terlebih dahulu.
                                                        @elseif ($statusDaftarOnline['statusKesejahteraan'] == '0')
                                                            Anda belum selesai mengisi data kesejahteraan. Silahkan lengkapi data kesejahteraan terlebih dahulu.
                                                        @else
                                                            Anda belum mengisi data orang tua. Silahkan isi data orang tua terlebih dahulu untuk dapat mengisi data periodik.
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusDokumenPendaftaran'] == '1' ? 'fa-check bg-green' : ($statusDaftarOnline['statusDataPeriodik'] == '1' && $statusDaftarOnline['statusKesejahteraan'] == '1' ? 'fa-exclamation bg-yellow' : 'fa-clock bg-gray') }}"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Unggah Dokumen</h3>

                                                    <div class="timeline-body">
                                                        @if ($statusDaftarOnline['statusDokumenPendaftaran'] == '1')
                                                            Dokumen pendaftaran sudah lengkap. Anda sudah dapat mengikuti tahapan Psikotes.
                                                        @elseif ($statusDaftarOnline['statusDokumenPendaftaran'] == '0')
                                                            Anda belum selesai mengunggah dokumen pendafaran. Silahkan lengkapi dokumen pendaftaran terlebih dahulu.
                                                        @else
                                                            Anda belum mengisi data periodik. Silahkan isi data periodik terlebih dahulu untuk dapat mengunggah dokumen pendaftaran.
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusFinalisasi'] == '1' ? 'fa-check bg-green' : 'fa-clock bg-gray' }}"></i>
                                                @if ($statusDaftarOnline['statusFinalisasi'] == '1')
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header text-blue font-weight-bold">Proses pendaftaran online sudah selesai</h3>
                                                        <div class="timeline-body">
                                                            Silahkan klik tombol dibawah ini untuk mengerjakan soal Psikotes.
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header text-blue font-weight-bold">Proses pendaftaran online belum selesai</h3>
                                                        <div class="timeline-body">
                                                            Silahkan selesaikan proses pendaftaran online untuk dapat mengikuti tahap Psikotes.
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <i class="fas fa-exclamation bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Schedule -->
                        <div class="card bg-gradient-white">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Jadwal PPDB SD Alam Amani
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="timeline">
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas {{ $statusDaftarOnline['statusDokumenPendaftaran'] == '1' ? 'fa-check bg-green' : 'fa-exclamation bg-yellow' }}"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Pengisian Data Diri</h3>

                                                    <div class="timeline-body">
                                                        Senin, 05 Mei 2025 s/d Jumat, 30 Mei 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Psikotes</h3>

                                                    <div class="timeline-body">
                                                        Senin, 02 Juni 2025 s/d Jumat, 06 Juni 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Wawancara</h3>

                                                    <div class="timeline-body">
                                                        Senin, 09 Juni 2025 s/d Jumat, 13 Juni 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Sit In/Pre-School</h3>

                                                    <div class="timeline-body">
                                                        Senin, 16 Juni 2025 s/d Jumat, 20 Juni 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Sekolah Orang Tua (SOT)</h3>

                                                    <div class="timeline-body">
                                                        Senin, 23 Juni 2025 s/d Jumat, 27 Juni 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --><!-- timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header text-blue font-weight-bold">Pengumuman Seleksi PPDB</h3>

                                                    <div class="timeline-body">
                                                        Senin, 30 Juni 2025
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="fas fa-exclamation bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
