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
                            <button type="button" id="export-pdf" class="btn btn-danger">
                                <i class="fas fa-file-pdf"></i>
                                PDF
                            </button>
                            <button type="button" id="export-excel" class="btn btn-success">
                                <i class="fas fa-file-excel"></i>
                                Excel
                            </button>
                        </div>
                    </div>
                </div>
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
        $('#table-data-pendaftar').DataTable();
        $("#export-excel").click(function() {
            $("#table-data-pendaftar").table2excel({
                exclude: ".excludeThisClass",
                name: "Hasil Seleksi.xlsx",
                filename: "Hasil Seleksi",
                fileext: ".xlsx",
            });
        });

        const {
            jsPDF
        } = window.jspdf;

        document.getElementById('export-pdf').addEventListener('click', function() {
            const doc = new jsPDF();
            doc.autoTable({
                html: '#table-data-pendaftar'
            });
            doc.save('hasil-seleksi.pdf');
        })
    </script>
@endpush
