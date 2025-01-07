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
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Verifikasi berhasil!</h5>
                        {{ session()->get('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Data gagal disimpan!</h5>
                        Data yang anda masukan gagal disimpan. Silahkan lihat tanda peringatan pada kolom formulir untuk memperbaiki data lalu klik simpan.
                    </div>
                @elseif (session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation"></i> Silahkan isi data diri terlebih dahulu!</h5>
                        Anda tidak diperkenankan mengakses halaman formulir data orang tua sebelum anda mengisi data diri.
                    </div>
                @endif
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
                                            Status
                                        </th>
                                        <th>
                                            Actions
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
                                            <td>
                                                <button class="btn btn-success" id="verifikasi" {{ $pendaftar->is_accepted == 1 ? 'disabled' : '' }} data-toggle="modal" data-target="#verifikasi-modal">
                                                    <i class="fas fa-user-check"></i>
                                                    {{ $pendaftar->is_accepted == 1 ? 'Terverifikasi' : 'Verifikasi' }}
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
    <div class="modal fade" id="verifikasi-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verfikasi Pendaftar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin ingin memlakukan verifikasi terhadap pendaftar dengan data berikut?
                    </p>
                    <p>
                    <table>
                        <tr>
                            <td>Nomor Pendaftaran</td>
                            <td id="noreg_modal"></td>
                        </tr>
                        <tr>
                            <td>Nama Pendaftar</td>
                            <td id="nama_modal"></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td id="asal_sekolah_modal"></td>
                        </tr>
                    </table>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="#" id="verifikasi_link" type="button" class="btn btn-primary">Ya, verifikasi!</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        $('#table-data-pendaftar').DataTable();
        // document.querySelectorAll('#verifikasi').forEach((element, index) => {
        //     element.addEventListener('click', () => {
        //         const noreg = document.querySelectorAll('#table-data-pendaftar tr td')[index * 7].innerText;
        //         const nama = document.querySelectorAll('#table-data-pendaftar tr td')[index * 7 + 1].innerText;
        //         const asal_sekolah = document.querySelectorAll('#table-data-pendaftar tr td')[index * 7 + 4].innerText;
        //         document.querySelector('#noreg_modal').innerText = `: ${noreg}`;
        //         document.querySelector('#nama_modal').innerText = `: ${nama}`;
        //         document.querySelector('#asal_sekolah_modal').innerText = `: ${asal_sekolah}`;
        //         document.querySelector('#verifikasi_link').href = `{{ url('admin/verifikasi-pendaftar/') }}/${noreg}`;
        //     });
        // });

        //buatkan fungsi menggunakan jquery untuk setiap tombol verifikasi yang ada pada tabel berdasarkan kode yang saya beri komentar diatas
        $('#table-data-pendaftar').on('click', '#verifikasi', function() {
            const noreg = $(this).closest('tr').find('td:eq(0)').text().trim();
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            const asal_sekolah = $(this).closest('tr').find('td:eq(4)').text();
            $('#noreg_modal').text(`: ${noreg}`);
            $('#nama_modal').text(`: ${nama}`);
            $('#asal_sekolah_modal').text(`: ${asal_sekolah}`);
            $('#verifikasi_link').attr('href', `{{ url('admin/verifikasi-pendaftar/') }}/${noreg}`);
        });
    </script>
@endpush
