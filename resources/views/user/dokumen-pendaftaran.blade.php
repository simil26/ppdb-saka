@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dokumen Pendaftaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Dokumen Pendaftaran</li>
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
                        <h5><i class="icon fas fa-check"></i> {{ session('success') }}!</h5>
                        Dokumen yang anda unggah berhasil disimpan. Jika data sudah benar, silahkan klik tombol finalisasi.
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Dokumen gagal disimpan!</h5>
                        {{ session('error') }}
                    </div>
                @elseif (session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation"></i> Silahkan isi data diri terlebih dahulu!</h5>
                        Anda tidak diperkenankan mengakses halaman formulir data orang tua sebelum anda mengisi data diri.
                    </div>
                @endif

                <div class="row mb-4 {{ $statusDaftarOnline['statusFinalisasi'] == '1' ? 'd-none' : '' }}">
                    <div class="col-12">
                        <a href="{{ url('user/upload-files') }}" class="btn btn-warning" id="edit-pas_foto">
                            <i class="fas fa-edit"></i>
                            Ubah Berkas Pendaftaran
                        </a>
                        <button class="btn btn-success" id="finalisasiPendaftaran">
                            <i class="fas fa-check"></i>
                            Finalisasi
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-title pt-3 py-2">
                                <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->pas_foto, 18, 3)) . ' FOTO' }}</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->pas_foto) }}" alt="File pas_foto" id="pas_foto" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-title pt-3 py-2">
                                <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->kk, 18, 2)) }}</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->kk) }}" alt="File kk" id="kk" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-title pt-3 py-2">
                                <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->akte, 18, 4) . ' KELAHIRAN') }}</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->akte) }}" alt="File akte" id="akte" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-title pt-3 py-2">
                                <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->ktp, 18, 3) . ' Orang Tua') }}</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->ktp) }}" alt="File ktp" id="ktp" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($dokumenPPDB->kip != '-')
                        <div class="col-3">
                            <div class="card">
                                <div class="card-title pt-3 py-2">
                                    <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->kip, 18, 3)) }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->kip) }}" alt="File kip" id="kip" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($dokumenPPDB->kis != '-')
                        <div class="col-3">
                            <div class="card">
                                <div class="card-title pt-3 py-2">
                                    <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->kis, 18, 3)) }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->kis) }}" alt="File kis" id="kis" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($dokumenPPDB->kks != '-')
                        <div class="col-3">
                            <div class="card">
                                <div class="card-title pt-3 py-2">
                                    <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->kks, 18, 3)) }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->kks) }}" alt="File kks" id="kks" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($dokumenPPDB->kps != '-')
                        <div class="col-3">
                            <div class="card">
                                <div class="card-title pt-3 py-2">
                                    <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->kps, 18, 3)) }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->kps) }}" alt="File kps" id="kps" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row d-flex justify-content-center">
                    @if ($dokumenPPDB->pkh != '-')
                        <div class="col-3">
                            <div class="card">
                                <div class="card-title pt-3 py-2">
                                    <h5 class="text-center">{{ strtoupper(substr($dokumenPPDB->pkh, 18, 3)) }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ url('assets/files/' . session('noreg_ppdb') . '/' . $dokumenPPDB->pkh) }}" alt="File pkh" id="pkh" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    @endif
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
        $('#tanggalLahirAyah').datetimepicker({
            format: 'YYYY-MM-DD',
            allowInputToggle: true,
        });
        $('#tanggalLahirIbu').datetimepicker({
            format: 'YYYY-MM-DD',
            allowInputToggle: true,
        });

        $(function() {
            bsCustomFileInput.init();
        });

        document.getElementById('finalisasiPendaftaran').addEventListener('click', function() {
            // alert('Fitur finalisasi pendaftaran belum tersedia. Silahkan hubungi panitia untuk informasi lebih lanjut.');
            Swal.fire({
                title: 'Finalisasi Pendaftaran',
                text: "Apakah anda yakin ingin finalisasi pendaftaran? Setelah finalisasi, anda tidak dapat mengubah data pendaftaran.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, finalisasi!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('user.finalisasiPendaftaran') }}";
                }
            });
        });
    </script>
@endpush
