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
                                    Selamat! <br>
                                    Anda sudah menyelesaikan proses pendaftaran Penerimaan Peserta Didik Baru.
                                </h3>
                                <p>
                                    Untuk hasil seleksi dan informasi lebih lanjut, silahkan tunggu informasi pengumuman pada tanggal yang sudah ditentukan.
                                </p>
                            </div>
                        @else
                            <div class="callout callout-info">
                                <h3>
                                    Selamat datang! <br>
                                    di Laman Pendaftaran PPDB SD Alam Amani Karawang.
                                </h3>

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
                                <ul class="status-pendaftaran list-unstyled px-3">
                                    <li class="status-item">
                                        <input type="checkbox" class="form-check-input" id="biodata" {{ $biodata ? 'checked' : '' }}>
                                        <h5>
                                            {!! $biodata ? '<del>Data Diri</del>' : 'Data Diri' !!}
                                        </h5>
                                    </li>
                                    <li class="status-item">
                                        <input type="checkbox" class="form-check-input" id="dataOrangTua" {{ $dataOrangTua ? 'checked' : '' }}>
                                        <h5>
                                            {!! $dataOrangTua ? '<del>Data Orang Tua</del>' : 'Data Orang Tua' !!}
                                        </h5>
                                    </li>
                                    <li class="status-item">
                                        <input type="checkbox" class="form-check-input" id="dataPeriodik" {{ $dataPeriodik ? 'checked' : '' }}>
                                        <h5>
                                            {!! $dataPeriodik ? '<del>Data Periodik</del>' : 'Data Periodik' !!}
                                        </h5>
                                    </li>
                                    <li class="status-item">
                                        <input type="checkbox" class="form-check-input" id="dataKesejahteraan" {{ $dataKesejahteraan ? 'checked' : '' }}>
                                        <h5>
                                            {!! $dataKesejahteraan ? '<del>Data Kesejahteraan</del>' : 'Data Kesejahteraan' !!}
                                        </h5>
                                    </li>
                                    <li class="status-item">
                                        <input type="checkbox" class="form-check-input" id="uploadFiles" {{ $uploadFiles ? 'checked' : '' }}>
                                        <h5>
                                            {!! $uploadFiles ? '<del>Dokumen Pendaftaran</del>' : 'Dokumen Pendaftaran' !!}
                                        </h5>
                                    </li>
                                </ul>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Calendar -->
                        <div class="card bg-gradient-white">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-white btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-white btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
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
