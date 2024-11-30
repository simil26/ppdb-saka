@extends('layouts.admin.template-admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pendaftar</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                            <li class="breadcrumb-item active">Data Pendaftar</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-4">
                <div class="tabel-data-pendaftar-wrapper bg-light mx-0 mt-3">
                    <div class="card rounded-4 shadow border-0">
                        <div class="card-body">
                            <table id="table-data-pendaftar" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            No Pendaftaran
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            NISN
                                        </th>
                                        <th>Tempat, tanggal lahir</th>
                                        <th>
                                            Asal Sekolah
                                        </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biodata as $pendaftar)
                                        <tr>
                                            <td>
                                                {{ $pendaftar->noreg_ppdb }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nama }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nisn }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->asal_sekolah }}
                                            </td>
                                            <td>
                                                <button class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah Data
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script>
        $('#table-data-pendaftar').DataTable();
    </script>
@endpush
