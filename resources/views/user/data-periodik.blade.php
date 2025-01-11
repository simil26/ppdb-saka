@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Periodik</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Data Periodik</li>
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
                        {{ session('error') }}
                    </div>
                @elseif (session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation"></i> Silahkan isi data diri terlebih dahulu!</h5>
                        Anda tidak diperkenankan mengakses halaman formulir data orang tua sebelum anda mengisi data diri.
                    </div>
                @endif
                @if ($dataPeriodik && $dataKesejahteraan)
                    <div class="row my-2">
                        <div class="col-12">
                            <button class="btn btn-success" type="button" onclick="enabledEdit()">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('user.update.dataPeriodik') }}" method="POST">
                        @csrf
                        <input type="hidden" name="noreg_ppdb" value="{{ session('noreg_ppdb') }}">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="hobi">Hobi</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['hobi'] }}" {{ $dataPeriodik['hobi'] ? 'disabled' : '' }} name="hobi" id="hobi" placeholder="Hobi">
                                </div>
                                <div class="form-group">
                                    <label for="cita_cita">Cita-cita</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['cita_cita'] }}" {{ $dataPeriodik['cita_cita'] ? 'disabled' : '' }} name="cita_cita" id="cita_cita" placeholder="Cita-cita">
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_badan">Tinggi Badan</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['tinggi_badan'] }}" {{ $dataPeriodik['tinggi_badan'] ? 'disabled' : '' }} name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan">
                                </div>
                                <div class="form-group">
                                    <label for="berat_badan">Berat Badan</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['berat_badan'] }}" {{ $dataPeriodik['berat_badan'] ? 'disabled' : '' }} name="berat_badan" id="berat_badan" placeholder="Berat Badan">
                                </div>
                                <div class="form-group">
                                    <label for="jarak_rumah">Jarak Rumah</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['jarak_rumah'] }}" {{ $dataPeriodik['jarak_rumah'] ? 'disabled' : '' }} name="jarak_rumah" id="jarak_rumah" placeholder="Jarak Rumah">
                                </div>
                                <div class="form-group">
                                    <label for="waktu_tempuh">Waktu Tempuh</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['waktu_tempuh'] }}" {{ $dataPeriodik['waktu_tempuh'] ? 'disabled' : '' }} id="waktu_tempuh" name="waktu_tempuh" placeholder="Waktu Tempuh dari Rumah ke Sekolah">
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak Ke</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['anak_ke'] }}" {{ $dataPeriodik['anak_ke'] ? 'disabled' : '' }} id="anak_ke" name="anak_ke" placeholder="Anak Ke">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_saudara">Jumlah Saudara</label>
                                    <input type="text" class="form-control" value="{{ $dataPeriodik['jumlah_saudara'] }}" {{ $dataPeriodik['jumlah_saudara'] ? 'disabled' : '' }} id="jumlah_saudara" name="jumlah_saudara" placeholder="Jumlah Saudara">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kip">Punya KIP?</label>
                                            <select name="is_kip" id="is_kip" {{ $dataKesejahteraan['is_kip'] != null ? 'disabled' : '' }} class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1" {{ $dataKesejahteraan['is_kip'] == 1 ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $dataKesejahteraan['is_kip'] == 0 ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kip">Nomor KIP</label>
                                            <input type="text" class="form-control" name="nomor_kip" id="kip" value="{{ $dataKesejahteraan['nomor_kip'] }}" placeholder="Nomor KIP" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kis">Punya KIS?</label>
                                            <select name="is_kis" id="is_kis" {{ $dataKesejahteraan['is_kis'] != null ? 'disabled' : '' }} class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="">Pilih :</option>
                                                <option value="1" {{ $dataKesejahteraan['is_kis'] == 1 ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $dataKesejahteraan['is_kis'] == 0 ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kis">Nomor KIS</label>
                                            <input type="text" class="form-control" name="nomor_kis" id="kis" value="{{ $dataKesejahteraan['nomor_kis'] }}" placeholder="Nomor KIS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kks">Punya KKS?</label>
                                            <select name="is_kks" id="is_kks" {{ $dataKesejahteraan['is_kks'] != null ? 'disabled' : '' }} class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="">Pilih :</option>
                                                <option value="1" {{ $dataKesejahteraan['is_kks'] == 1 ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $dataKesejahteraan['is_kks'] == 0 ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kks">Nomor KKS</label>
                                            <input type="text" class="form-control" name="nomor_kks" id="kks" value="{{ $dataKesejahteraan['nomor_kks'] }}" placeholder="Nomor KKS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kps">Punya KPS?</label>
                                            <select name="is_kps" id="is_kps" {{ $dataKesejahteraan['is_kps'] != null ? 'disabled' : '' }} class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="">Pilih :</option>
                                                <option value="1" {{ $dataKesejahteraan['is_kps'] == 1 ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $dataKesejahteraan['is_kps'] == 0 ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kps">Nomor KPS</label>
                                            <input type="text" class="form-control" name="nomor_kps" id="kps" value="{{ $dataKesejahteraan['nomor_kps'] }}" placeholder="Nomor KPS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_pkh">Punya PKH?</label>
                                            <select name="is_pkh" id="is_pkh" {{ $dataKesejahteraan['is_pkh'] != null ? 'disabled' : '' }} class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="">Pilih :</option>
                                                <option value="1" {{ $dataKesejahteraan['is_pkh'] == 1 ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $dataKesejahteraan['is_pkh'] == 0 ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="pkh">Nomor PKH</label>
                                            <input type="text" class="form-control" name="nomor_pkh" id="pkh" value="{{ $dataKesejahteraan['nomor_pkh'] }}" placeholder="Nomor PKH" disabled>
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
                @else
                    <form action="{{ route('user.store.dataPeriodik') }}" method="POST">
                        @csrf
                        <input type="hidden" name="noreg_ppdb" value="{{ session('noreg_ppdb') }}">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="hobi">Hobi</label>
                                    <input type="text" class="form-control" name="hobi" id="hobi" placeholder="Hobi">
                                </div>
                                <div class="form-group">
                                    <label for="cita_cita">Cita-cita</label>
                                    <input type="text" class="form-control" name="cita_cita" id="cita_cita" placeholder="Cita-cita">
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_badan">Tinggi Badan</label>
                                    <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan">
                                </div>
                                <div class="form-group">
                                    <label for="berat_badan">Berat Badan</label>
                                    <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan">
                                </div>
                                <div class="form-group">
                                    <label for="jarak_rumah">Jarak Rumah</label>
                                    <input type="text" class="form-control" name="jarak_rumah" id="jarak_rumah" placeholder="Jarak Rumah">
                                </div>
                                <div class="form-group">
                                    <label for="waktu_tempuh">Waktu Tempuh</label>
                                    <input type="text" class="form-control" id="waktu_tempuh" name="waktu_tempuh" placeholder="Waktu Tempuh dari Rumah ke Sekolah">
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak Ke</label>
                                    <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak Ke">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_saudara">Jumlah Saudara</label>
                                    <input type="text" class="form-control" id="jumlah_saudara" name="jumlah_saudara" placeholder="Jumlah Saudara">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kip">Punya KIP?</label>
                                            <select name="is_kip" id="is_kip" class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kip">Nomor KIP</label>
                                            <input type="text" class="form-control" name="nomor_kip" id="kip" placeholder="Nomor KIP" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kis">Punya KIS?</label>
                                            <select name="is_kis" id="is_kis" class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kis">Nomor KIS</label>
                                            <input type="text" class="form-control" name="nomor_kis" id="kis" placeholder="Nomor KIS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kks">Punya KKS?</label>
                                            <select name="is_kks" id="is_kks" class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kks">Nomor KKS</label>
                                            <input type="text" class="form-control" name="nomor_kks" id="kks" placeholder="Nomor KKS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_kps">Punya KPS?</label>
                                            <select name="is_kps" id="is_kps" class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="kps">Nomor KPS</label>
                                            <input type="text" class="form-control" name="nomor_kps" id="kps" placeholder="Nomor KPS" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="is_pkh">Punya PKH?</label>
                                            <select name="is_pkh" id="is_pkh" class="form-control">
                                                <option value="">Pilih :</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="pkh">Nomor PKH</label>
                                            <input type="text" class="form-control" name="nomor_pkh" id="pkh" placeholder="Nomor PKH" disabled>
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

        $("select").on("change", function() {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value == 1) {
                $('#' + id.replace('is_', '')).prop('disabled', false);
            } else {
                $('#' + id.replace('is_', '')).prop('disabled', true);
            }
        });

        function enabledEdit() {
            $('input').removeAttr('disabled');
            $('select').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
            $('button[type="submit"]').removeAttr('disabled');
        }
    </script>
@endpush
