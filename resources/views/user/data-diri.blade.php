@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Diri</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Data Diri</li>
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
                        <h5><i class="icon fas fa-check"></i> Data berhasil disimpan!</h5>
                        Data yang anda masukan berhasil disimpan. Silahkan lanjut untuk mengisi Data Orang Tua.
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
                @if ($biodata)
                    <div class="row my-2 {{ $statusDaftarOnline['statusFinalisasi'] == '1' ? 'd-none' : '' }}">
                        <div class="col-12">
                            <button class="btn btn-success" type="button" onclick="enabledEdit()">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                        </div>
                    </div>
                    <form action="{{ url('user/data-diri/update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <input type="hidden" name="noreg_ppdb" value="{{ $biodata['noreg_ppdb'] }}">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $biodata['nama'] ?: '' }}" {{ $biodata['nama'] ? 'disabled' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan (NIK)" value="{{ $biodata['nik'] ?: '' }}" {{ $biodata['nik'] ? 'disabled' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis-kelamin" {{ $biodata['jenis_kelamin'] ? 'disabled' : '' }}>
                                        <option>Pilih :</option>
                                        <option value="L" {{ $biodata['jenis_kelamin'] == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $biodata['jenis_kelamin'] == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Tempat Lahir" value="{{ $biodata['tempat_lahir'] ?: '' }}" {{ $biodata['tempat_lahir'] ? 'disabled' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="tempat-lahir">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" pattern="\d{4}-\d{2}-\d{2}" data-target="#tanggalLahir" placeholder="yyyy-mm-dd" / value="{{ $biodata['tanggal_lahir'] ?: '' }}" {{ $biodata['tanggal_lahir'] ? 'disabled' : '' }}>
                                        <div class="input-group-append" data-target="#tanggalLahir" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" cols="30" rows="5" {{ $biodata['alamat'] ? 'disabled' : '' }}>{{ $biodata['alamat'] ?: '' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="dusun">Dusun</label>
                                            <input type="text" name="dusun" class="form-control" id="dusun" placeholder="Dusun" value="{{ $biodata['dusun'] ?: '' }}" {{ $biodata['dusun'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                            <input type="text" name="rt" class="form-control" id="rt" placeholder="RT" value="{{ $biodata['rt'] ?: '' }}" {{ $biodata['rt'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                            <input type="text" name="rw" class="form-control" id="rw" placeholder="RW" value="{{ $biodata['rw'] ?: '' }}" {{ $biodata['rw'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" name="desa" class="form-control" id="kelurahan" placeholder="Kelurahan" value="{{ $biodata['desa'] ?: '' }}" {{ $biodata['desa'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" value="{{ $biodata['kecamatan'] ?: '' }}" {{ $biodata['kecamatan'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten" value="{{ $biodata['kabupaten'] ?: '' }}" {{ $biodata['kabupaten'] ? 'disabled' : '' }}>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi" value="{{ $biodata['provinsi'] ?: '' }}" {{ $biodata['provinsi'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="pos">Kode POS</label>
                                            <input type="text" name="kode_pos" class="form-control" id="pos" placeholder="Kode POS" value="{{ $biodata['kode_pos'] ?: '' }}" {{ $biodata['kode_pos'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row {{ $statusDaftarOnline['statusFinalisasi'] == '1' ? 'd-none' : '' }}">
                            <div class="col-12">
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" disabled>Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ url('user/data-diri/simpan') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan (NIK)">
                                </div>
                                <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis-kelamin">
                                        <option>Pilih :</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tempat-lahir">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" pattern="\d{4}-\d{2}-\d{2}" data-target="#tanggalLahir" placeholder="yyyy-mm-dd" />
                                        <div class="input-group-append" data-target="#tanggalLahir" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="dusun">Dusun</label>
                                            <input type="text" name="dusun" class="form-control" id="dusun" placeholder="Dusun">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                            <input type="text" name="rt" class="form-control" id="rt" placeholder="RT">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                            <input type="text" name="rw" class="form-control" id="rw" placeholder="RW">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" name="desa" class="form-control" id="kelurahan" placeholder="Kelurahan">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="pos">Kode POS</label>
                                            <input type="text" name="kode_pos" class="form-control" id="pos" placeholder="Kode POS">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row {{ $statusDaftarOnline['statusFinalisasi'] == '1' ? 'd-none' : '' }}">
                            <div class="col-12">
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script>
        $('#tanggalLahir').datetimepicker({
            format: 'YYYY-MM-DD',
            allowInputToggle: true
        });

        function enabledEdit() {
            $('input').removeAttr('disabled');
            $('select').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
            $('button[type="submit"]').removeAttr('disabled');
        }
    </script>
@endpush
