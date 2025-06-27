@extends('layouts.admin.template-admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hasil Seleksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                            <li class="breadcrumb-item active">Hasil Seleksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-4">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="btn-group">
                            <a href="{{ url('admin/export-pdf') }}" target="_blank" id="export-pdf" class="btn btn-danger">
                                <i class="fas fa-file-pdf"></i>
                                PDF
                            </a>
                            <a href="{{ url('admin/export-excel') }}" target="_blank" id="export-excel" class="btn btn-success">
                                <i class="fas fa-file-excel"></i>
                                Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tabel-data-pendaftar-wrapper bg-light mx-0 mt-3">
                    <div class="card rounded-4 shadow border-0">
                        <div class="card-body">
                            {{-- <table id="table-data-pendaftar" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            No Pendaftaran
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            NIK
                                        </th>
                                        <th>Tempat, tanggal lahir</th>
                                        <th>
                                            Hasil Seleksi
                                        </th>
                                        <th>
                                            Dokumen Pendaftaran
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPendaftar as $pendaftar)
                                        <tr>
                                            <td>
                                                {{ $pendaftar->noreg_ppdb }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nama }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nik }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->is_accepted == 0 ? 'Pending' : 'Diterima' }}
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/unduh-dokumen') . '/' . $pendaftar->noreg_ppdb }}" class="btn btn-primary {{ $pendaftar->is_accepted == 0 ? 'disabled' : '' }}" id="unduh-dokumen">
                                                    <i class="fas fa-download"></i>
                                                    Unduh
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <table id="tabel-export" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            No Pendaftaran
                                        </th>
                                        <th>
                                            NIK
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>Tempat, tanggal lahir</th>
                                        <th>
                                            Jenis Kelamin
                                        </th>
                                        <th>
                                            Hasil Seleksi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPendaftar as $pendaftar)
                                        <tr>
                                            <td>
                                                {{ $pendaftar->noreg_ppdb }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nik }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->nama }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->jenis_kelamin }}
                                            </td>
                                            <td>
                                                {{ $pendaftar->is_accepted == 0 ? 'Pending' : 'Diterima' }}
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
    <script src="{{ url('/assets/table2excel/jquery.table2excel.js') }}"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@latest/dist/jspdf.plugin.autotable.js"></script>
    <script>
        // $('#table-data-pendaftar').DataTable();
        // $('#table-export').DataTable({
        //     scrollX: true
        // });
        new DataTable('#table-export', {})
        $("#export-excel").click(function() {
            $("#table-export").table2excel({
                exclude: ".excludeThisClass",
                name: "Hasil Seleksi.xlsx",
                filename: "Hasil Seleksi",
                fileext: ".xlsx",
            });
        });
    </script>
@endpush
