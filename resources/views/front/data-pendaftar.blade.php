@extends('layouts.front.template')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <h2 class="data-pendaftar-head">
                    Data Pendaftar <br>
                    Penerimaan Peserta Didik Baru <br>
                    Tahun Pelajaran 2025/2026
                </h2>
            </div>
        </div>
    </div>
    <div class="tabel-data-pendaftar-wrapper bg-light mx-0 mt-3 py-5">
        <div class="container">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPendaftar as $item)
                                <tr>
                                    <td>
                                        {{ $item['noreg_ppdb'] }}
                                    </td>
                                    <td>
                                        {{ $item['nama'] }}
                                    </td>
                                    <td>
                                        {{ $item['nisn'] }}
                                    </td>
                                    <td>
                                        {{ $item['tempat_lahir'] . ', ' . $item['tanggal_lahir'] }}
                                    </td>
                                    <td>
                                        {{ $item['asal_sekolah'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#table-data-pendaftar').DataTable();
    </script>
@endpush
