@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Unggah Dokumen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Unggah Dokumen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-4">
                <form action="{{ route('user.store.uploadFiles') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="noreg_ppdb" value="PPDB-2425-123">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="ijazah">File Ijazah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="ijazah" class="custom-file-input" id="ijazah">
                                        <label class="custom-file-label" for="ijazah">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kk">File Kartu Keluarga</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="kk" class="custom-file-input" id="kk">
                                        <label class="custom-file-label" for="kk">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="akte">File Akte Kelahiran</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="akte" class="custom-file-input" id="akte">
                                        <label class="custom-file-label" for="akte">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ktp">File KTP Orang Tua</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="ktp" class="custom-file-input" id="ktp">
                                        <label class="custom-file-label" for="ktp">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="kip">File KIP</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="kip" class="custom-file-input" id="kip">
                                        <label class="custom-file-label" for="kip">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kis">File KIS</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="kis" class="custom-file-input" id="kis">
                                        <label class="custom-file-label" for="kis">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kks">File KKS</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="kks" class="custom-file-input" id="kks">
                                        <label class="custom-file-label" for="kks">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kps">File KPS</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="kps" class="custom-file-input" id="kps">
                                        <label class="custom-file-label" for="kps">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pkh">File PKH</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="pkh" class="custom-file-input" id="pkh">
                                        <label class="custom-file-label" for="pkh">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
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
    </script>
@endpush