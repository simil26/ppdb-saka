@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Orang Tua</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Data Orang Tua</li>
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
                        Data yang anda masukan berhasil disimpan. Silahkan lanjut untuk mengisi Data Periodik.
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
                        <h5><i class="icon fas fa-exclamation"></i> Silahkan isi data orang tua terlebih dahulu!</h5>
                        Anda tidak diperkenankan mengakses halaman formulir data periodik sebelum anda mengisi data orang tua.
                    </div>
                @endif
                @if ($dataOrangTua)
                    <div class="row my-2">
                        <div class="col-12">
                            <button class="btn btn-success" type="button" onclick="enabledEdit()">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('user.update.dataOrangTua') }}" method="POST">
                        @csrf
                        <input type="hidden" name="noreg_ppdb" value="{{ session('noreg_ppdb') }}">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{ $dataOrangTua['nama_ayah'] }}" {{ $dataOrangTua['nama_ayah'] ? 'disabled' : '' }} placeholder="Nama Lengkap Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                    <input type="text" class="form-control" name="tempat_lahir_ayah" value="{{ $dataOrangTua['tempat_lahir_ayah'] }}" {{ $dataOrangTua['tempat_lahir_ayah'] ? 'disabled' : '' }} id="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tanggalLahirAyah">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahirAyah" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir_ayah" value="{{ $dataOrangTua['tanggal_lahir_ayah'] }}" {{ $dataOrangTua['tanggal_lahir_ayah'] ? 'disabled' : '' }} pattern="\d{4}-\d{2}-\d{2}" data-target="#tanggalLahirAyah" placeholder="yyyy-mm-dd" />
                                        <div class="input-group-append" data-target="#tanggalLahirAyah" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                    <select name="pendidikan_ayah" id="input-pendidikan-ayah" {{ $dataOrangTua ? 'disabled' : '' }} class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['pendidikan_ayah'] == 1 ? 'selected' : '' }}>Tidak Bersekolah</option>
                                        <option value="2" {{ $dataOrangTua['pendidikan_ayah'] == 2 ? 'selected' : '' }}>SD</option>
                                        <option value="3" {{ $dataOrangTua['pendidikan_ayah'] == 3 ? 'selected' : '' }}>SMP</option>
                                        <option value="4" {{ $dataOrangTua['pendidikan_ayah'] == 4 ? 'selected' : '' }}>SMA</option>
                                        <option value="5" {{ $dataOrangTua['pendidikan_ayah'] == 5 ? 'selected' : '' }}>D1</option>
                                        <option value="6" {{ $dataOrangTua['pendidikan_ayah'] == 6 ? 'selected' : '' }}>D2</option>
                                        <option value="7" {{ $dataOrangTua['pendidikan_ayah'] == 7 ? 'selected' : '' }}>D3</option>
                                        <option value="8" {{ $dataOrangTua['pendidikan_ayah'] == 8 ? 'selected' : '' }}>D4/S1</option>
                                        <option value="9" {{ $dataOrangTua['pendidikan_ayah'] == 9 ? 'selected' : '' }}>S2</option>
                                        <option value="10" {{ $dataOrangTua['pendidikan_ayah'] == 10 ? 'selected' : '' }}>S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <select name="pekerjaan_ayah" {{ $dataOrangTua['pekerjaan_ayah'] ? 'disabled' : '' }} id="input-pekerjaan-ayah" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['pekerjaan_ayah'] == 1 ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="2" {{ $dataOrangTua['pekerjaan_ayah'] == 2 ? 'selected' : '' }}>PNS</option>
                                        <option value="3" {{ $dataOrangTua['pekerjaan_ayah'] == 3 ? 'selected' : '' }}>TNI</option>
                                        <option value="4" {{ $dataOrangTua['pekerjaan_ayah'] == 4 ? 'selected' : '' }}>Polri</option>
                                        <option value="5" {{ $dataOrangTua['pekerjaan_ayah'] == 5 ? 'selected' : '' }}>Pegawai Swasta</option>
                                        <option value="6" {{ $dataOrangTua['pekerjaan_ayah'] == 6 ? 'selected' : '' }}>Wiraswasta</option>
                                        <option value="7" {{ $dataOrangTua['pekerjaan_ayah'] == 7 ? 'selected' : '' }}>Petani</option>
                                        <option value="8" {{ $dataOrangTua['pekerjaan_ayah'] == 8 ? 'selected' : '' }}>Buruh</option>
                                        <option value="9" {{ $dataOrangTua['pekerjaan_ayah'] == 9 ? 'selected' : '' }}>Nelayan</option>
                                        <option value="10" {{ $dataOrangTua['pekerjaan_ayah'] == 10 ? 'selected' : '' }}>Pedagang</option>
                                        <option value="11" {{ $dataOrangTua['pekerjaan_ayah'] == 12 ? 'selected' : '' }}>Pensiunan</option>
                                        <option value="12" {{ $dataOrangTua['pekerjaan_ayah'] == 13 ? 'selected' : '' }}>Peternak</option>
                                        <option value="13" {{ $dataOrangTua['pekerjaan_ayah'] == 14 ? 'selected' : '' }}>Pengusaha</option>
                                        <option value="99" {{ $dataOrangTua['pekerjaan_ayah'] == 99 ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ayah">Penghasilan Ayah</label>
                                    <select name="penghasilan_ayah" id="input-penghasilan-ayah" {{ $dataOrangTua['penghasilan_ayah'] ? 'disabled' : '' }} class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['penghasilan_ayah'] == 1 ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                        <option value="2" {{ $dataOrangTua['penghasilan_ayah'] == 2 ? 'selected' : '' }}>Kurang dari Rp. 1.000.000</option>
                                        <option value="3" {{ $dataOrangTua['penghasilan_ayah'] == 3 ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="4" {{ $dataOrangTua['penghasilan_ayah'] == 4 ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="5" {{ $dataOrangTua['penghasilan_ayah'] == 5 ? 'selected' : '' }}>Rp. 5.000.000 - Rp. 10.000.000</option>
                                        <option value="6" {{ $dataOrangTua['penghasilan_ayah'] == 6 ? 'selected' : '' }}>Rp. 10.000.000 - Rp. 20.000.000</option>
                                        <option value="7" {{ $dataOrangTua['penghasilan_ayah'] == 7 ? 'selected' : '' }}>Lebih dari Rp. 20.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah">Alamat Ayah</label>
                                    <textarea name="alamat_ayah" id="alamat_ayah" name="alamat_ayah" cols="30" {{ $dataOrangTua['alamat_ayah'] ? 'disabled' : '' }} rows="5" class="form-control">{{ $dataOrangTua['alamat_ayah'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $dataOrangTua['nama_ibu'] }}" {{ $dataOrangTua['nama_ibu'] ? 'disabled' : '' }} placeholder="Nama Lengkap Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                    <input type="text" class="form-control" id="tempat_lahir_ibu" value="{{ $dataOrangTua['tempat_lahir_ibu'] }}" {{ $dataOrangTua['tempat_lahir_ibu'] ? 'disabled' : '' }} name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tanggalLahirIbu">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahirIbu" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir_ibu" pattern="\d{4}-\d{2}-\d{2}" value="{{ $dataOrangTua['tanggal_lahir_ibu'] }}" {{ $dataOrangTua['tanggal_lahir_ibu'] ? 'disabled' : '' }} data-target="#tanggalLahirIbu" placeholder="yyyy-mm-dd" />
                                        <div class="input-group-append" data-target="#tanggalLahirIbu" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                    <select name="pendidikan_ibu" id="input-pendidikan-ibu" {{ $dataOrangTua['pendidikan_ibu'] ? 'disabled' : '' }} class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['pendidikan_ibu'] == 1 ? 'selected' : '' }}>Tidak Bersekolah</option>
                                        <option value="2" {{ $dataOrangTua['pendidikan_ibu'] == 2 ? 'selected' : '' }}>SD</option>
                                        <option value="3" {{ $dataOrangTua['pendidikan_ibu'] == 3 ? 'selected' : '' }}>SMP</option>
                                        <option value="4" {{ $dataOrangTua['pendidikan_ibu'] == 4 ? 'selected' : '' }}>SMA</option>
                                        <option value="5" {{ $dataOrangTua['pendidikan_ibu'] == 5 ? 'selected' : '' }}>D1</option>
                                        <option value="6" {{ $dataOrangTua['pendidikan_ibu'] == 6 ? 'selected' : '' }}>D2</option>
                                        <option value="7" {{ $dataOrangTua['pendidikan_ibu'] == 7 ? 'selected' : '' }}>D3</option>
                                        <option value="8" {{ $dataOrangTua['pendidikan_ibu'] == 8 ? 'selected' : '' }}>D4/S1</option>
                                        <option value="9" {{ $dataOrangTua['pendidikan_ibu'] == 9 ? 'selected' : '' }}>S2</option>
                                        <option value="10" {{ $dataOrangTua['pendidikan_ibu'] == 10 ? 'selected' : '' }}>S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <select name="pekerjaan_ibu" id="input-pekerjaan-ibu" class="form-control" {{ $dataOrangTua['pekerjaan_ibu'] ? 'disabled' : '' }}>
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['pekerjaan_ibu'] == 1 ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="2" {{ $dataOrangTua['pekerjaan_ibu'] == 2 ? 'selected' : '' }}>PNS</option>
                                        <option value="3" {{ $dataOrangTua['pekerjaan_ibu'] == 3 ? 'selected' : '' }}>TNI</option>
                                        <option value="4" {{ $dataOrangTua['pekerjaan_ibu'] == 4 ? 'selected' : '' }}>Polri</option>
                                        <option value="5" {{ $dataOrangTua['pekerjaan_ibu'] == 5 ? 'selected' : '' }}>Pegawai Swasta</option>
                                        <option value="6" {{ $dataOrangTua['pekerjaan_ibu'] == 6 ? 'selected' : '' }}>Wiraswasta</option>
                                        <option value="7" {{ $dataOrangTua['pekerjaan_ibu'] == 7 ? 'selected' : '' }}>Petani</option>
                                        <option value="8" {{ $dataOrangTua['pekerjaan_ibu'] == 8 ? 'selected' : '' }}>Buruh</option>
                                        <option value="9" {{ $dataOrangTua['pekerjaan_ibu'] == 9 ? 'selected' : '' }}>Nelayan</option>
                                        <option value="10" {{ $dataOrangTua['pekerjaan_ibu'] == 10 ? 'selected' : '' }}>Pedagang</option>
                                        <option value="11" {{ $dataOrangTua['pekerjaan_ibu'] == 12 ? 'selected' : '' }}>Pensiunan</option>
                                        <option value="12" {{ $dataOrangTua['pekerjaan_ibu'] == 13 ? 'selected' : '' }}>Peternak</option>
                                        <option value="13" {{ $dataOrangTua['pekerjaan_ibu'] == 14 ? 'selected' : '' }}>Pengusaha</option>
                                        <option value="99" {{ $dataOrangTua['pekerjaan_ibu'] == 99 ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                    <select name="penghasilan_ibu" id="input-penghasilan-ibu" class="form-control" {{ $dataOrangTua['penghasilan_ibu'] ? 'disabled' : '' }}>
                                        <option value="">Pilih :</option>
                                        <option value="1" {{ $dataOrangTua['penghasilan_ibu'] == 1 ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                        <option value="2" {{ $dataOrangTua['penghasilan_ibu'] == 2 ? 'selected' : '' }}>Kurang dari Rp. 1.000.000</option>
                                        <option value="3" {{ $dataOrangTua['penghasilan_ibu'] == 3 ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="4" {{ $dataOrangTua['penghasilan_ibu'] == 4 ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="5" {{ $dataOrangTua['penghasilan_ibu'] == 5 ? 'selected' : '' }}>Rp. 5.000.000 - Rp. 10.000.000</option>
                                        <option value="6" {{ $dataOrangTua['penghasilan_ibu'] == 6 ? 'selected' : '' }}>Rp. 10.000.000 - Rp. 20.000.000</option>
                                        <option value="7" {{ $dataOrangTua['penghasilan_ibu'] == 7 ? 'selected' : '' }}>Lebih dari Rp. 20.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu">Alamat Ibu</label>
                                    <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="5" {{ $dataOrangTua['alamat_ibu'] ? 'disabled' : '' }} name="alamat_ibu" class="form-control">{{ $dataOrangTua['alamat_ibu'] }}</textarea>
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
                @else
                    <form action="{{ route('user.store.dataOrangTua') }}" method="POST">
                        @csrf
                        <input type="hidden" name="noreg_ppdb" value="{{ session('noreg_ppdb') }}">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Lengkap Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                    <input type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tanggalLahirAyah">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahirAyah" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir_ayah" pattern="\d{4}-\d{2}-\d{2}" data-target="#tanggalLahirAyah" placeholder="yyyy-mm-dd" />
                                        <div class="input-group-append" data-target="#tanggalLahirAyah" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                    <select name="pendidikan_ayah" id="input-pendidikan-ayah" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Bersekolah</option>
                                        <option value="2">SD</option>
                                        <option value="3">SMP</option>
                                        <option value="4">SMA</option>
                                        <option value="5">D1</option>
                                        <option value="6">D2</option>
                                        <option value="7">D3</option>
                                        <option value="8">D4/S1</option>
                                        <option value="9">S2</option>
                                        <option value="10">S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <select name="pekerjaan_ayah" id="input-pekerjaan-ayah" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Bekerja</option>
                                        <option value="2">PNS</option>
                                        <option value="3">TNI</option>
                                        <option value="4">Polri</option>
                                        <option value="5">Pegawai Swasta</option>
                                        <option value="6">Wiraswasta</option>
                                        <option value="7">Petani</option>
                                        <option value="8">Buruh</option>
                                        <option value="9">Nelayan</option>
                                        <option value="10">Pedagang</option>
                                        <option value="11">Pensiunan</option>
                                        <option value="12">Peternak</option>
                                        <option value="13">Pengusaha</option>
                                        <option value="99">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ayah">Penghasilan Ayah</label>
                                    <select name="penghasilan_ayah" id="input-penghasilan-ayah" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Berpenghasilan</option>
                                        <option value="2">Kurang dari Rp. 1.000.000</option>
                                        <option value="3">Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="4">Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="5">Rp. 5.000.000 - Rp. 10.000.000</option>
                                        <option value="6">Rp. 10.000.000 - Rp. 20.000.000</option>
                                        <option value="7">Lebih dari Rp. 20.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah">Alamat Ayah</label>
                                    <textarea name="alamat_ayah" id="alamat_ayah" name="alamat_ayah" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                    <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tanggalLahirIbu">Tanggal Lahir</label>
                                    <div class="input-group date" id="tanggalLahirIbu" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir_ibu" pattern="\d{4}-\d{2}-\d{2}" data-target="#tanggalLahirIbu" placeholder="yyyy-mm-dd" />
                                        <div class="input-group-append" data-target="#tanggalLahirIbu" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                    <select name="pendidikan_ibu" id="input-pendidikan-ibu" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Bersekolah</option>
                                        <option value="2">SD</option>
                                        <option value="3">SMP</option>
                                        <option value="4">SMA</option>
                                        <option value="5">D1</option>
                                        <option value="6">D2</option>
                                        <option value="7">D3</option>
                                        <option value="8">D4/S1</option>
                                        <option value="9">S2</option>
                                        <option value="10">S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <select name="pekerjaan_ibu" id="input-pekerjaan-ibu" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Bekerja</option>
                                        <option value="2">PNS</option>
                                        <option value="3">TNI</option>
                                        <option value="4">Polri</option>
                                        <option value="5">Pegawai Swasta</option>
                                        <option value="6">Wiraswasta</option>
                                        <option value="7">Petani</option>
                                        <option value="8">Buruh</option>
                                        <option value="9">Nelayan</option>
                                        <option value="10">Pedagang</option>
                                        <option value="11">Pensiunan</option>
                                        <option value="12">Peternak</option>
                                        <option value="13">Pengusaha</option>
                                        <option value="99">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                    <select name="penghasilan_ibu" id="input-penghasilan-ibu" class="form-control">
                                        <option value="">Pilih :</option>
                                        <option value="1">Tidak Berpenghasilan</option>
                                        <option value="2">Kurang dari Rp. 1.000.000</option>
                                        <option value="3">Rp. 1.000.000 - Rp. 3.000.000</option>
                                        <option value="4">Rp. 3.000.000 - Rp. 5.000.000</option>
                                        <option value="5">Rp. 5.000.000 - Rp. 10.000.000</option>
                                        <option value="6">Rp. 10.000.000 - Rp. 20.000.000</option>
                                        <option value="7">Lebih dari Rp. 20.000.000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu">Alamat Ibu</label>
                                    <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="5" name="alamat_ibu" class="form-control"></textarea>
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
        $('#tanggalLahirAyah').datetimepicker({
            format: 'YYYY-MM-DD',
            allowInputToggle: true,
        });
        $('#tanggalLahirIbu').datetimepicker({
            format: 'YYYY-MM-DD',
            allowInputToggle: true,
        });

        function enabledEdit() {
            $('input').removeAttr('disabled');
            $('select').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
            $('button[type="submit"]').removeAttr('disabled');
        }
    </script>
@endpush
