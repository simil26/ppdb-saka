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
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.17.1/sweetalert2.min.js" integrity="sha512-3E8s4JBQ3DzbrQQuVMF70TaihBTov6TlT1O9wjfrFiykjj5k5oN988+CPtzVgYJBHzdRojLLGKWxgsOeLF5X2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#table-data-pendaftar').DataTable();

        //buatkan fungsi menggunakan jquery untuk setiap tombol verifikasi yang ada pada tabel berdasarkan kode yang saya beri komentar diatas
        $('#table-data-pendaftar').on('click', '#verifikasi', function() {
            var row = $(this).closest('tr');
            var noPendaftaran = row.find('td:eq(0)').text();
            var nama = row.find('td:eq(1)').text();

            Swal.fire({
                title: 'Verifikasi Pendaftar',
                text: 'Apakah anda yakin ingin memverifikasi pendaftar ' + nama + ' dengan nomor pendaftaran ' + noPendaftaran + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, verifikasi!',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman verifikasi
                    window.location.href = "{{ url('admin/verifikasi-pendaftar') }}/" + noPendaftaran;
                }
            });
        });
    </script>
@endpush
