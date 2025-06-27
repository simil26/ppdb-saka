<?php

namespace App\Exports;

use App\Models\Biodata;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportHasilExcel implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Panggil data dari model Biodata dengan eager loading relasinya
        return Biodata::with(['dataOrangTua', 'dataPeriodik', 'dataKesejahteraan'])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Hasil Seleksi',
            'Nomor Pendaftaran',
            'NIK',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Dusun',
            'RT',
            'RW',
            'Desa',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Kode Pos',
            'Nama Ayah',
            'Tempat Lahir Ayah',
            'Tanggal Lahir Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'Alamat Ayah',
            'Nama Ibu',
            'Tempat Lahir Ibu',
            'Tanggal Lahir Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Alamat Ibu',
            'Hobi',
            'Cita Cita',
            'Tinggi Badan (cm)',
            'Berat Badan (kg)',
            'Jarak Rumah (m)',
            'Waktu Tempuh (menit)',
            'Anak Ke',
            'Jumlah Saudara',
            'Nomor KIP',
            'Nomor KIS',
            'Nomor KKS',
            'Nomor KPS',
            'Nomor PKH',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {

        // Set locale ke bahasa Indonesia untuk nama bulan
        Carbon::setLocale('id');

        // Fungsi helper untuk format tanggal agar kodenya tidak berulang
        $formatTanggal = function ($date) {
            if (empty($date)) {
                return '';
            }
            try {
                return Carbon::parse($date)->translatedFormat('d F Y');
            } catch (\Exception $e) {
                return 'Invalid Date';
            }
        };

        // --- LOOKUP ARRAYS ---
        // Referensi untuk pendidikan
        $pendidikanMap = [
            1 => 'Tidak Bersekolah',
            2 => 'SD',
            3 => 'SMP',
            4 => 'SMA',
            5 => 'D1',
            6 => 'D2',
            7 => 'D3',
            8 => 'D4/S1',
            9 => 'S2',
            10 => 'S3',
        ];

        // Referensi untuk pekerjaan
        $pekerjaanMap = [
            1 => 'Tidak Bekerja',
            2 => 'PNS',
            3 => 'TNI',
            4 => 'Polri',
            5 => 'Pegawai Swasta',
            6 => 'Wiraswasta',
            7 => 'Petani',
            8 => 'Buruh',
            9 => 'Nelayan',
            10 => 'Pedagang',
            11 => 'Pensiunan',
            12 => 'Peternak',
            13 => 'Pengusaha',
            99 => 'Lainnya',
        ];

        // Referensi untuk penghasilan
        $penghasilanMap = [
            1 => 'Tidak Berpenghasilan',
            2 => 'Kurang dari Rp. 1.000.000',
            3 => 'Rp. 1.000.000 - Rp. 3.000.000',
            4 => 'Rp. 3.000.000 - Rp. 5.000.000',
            5 => 'Rp. 5.000.000 - Rp. 10.000.000',
            6 => 'Rp. 10.000.000 - Rp. 20.000.000',
            7 => 'Lebih dari Rp. 20.000.000',
        ];
        // --- END LOOKUP ARRAYS ---

        // Gunakan operator nullsafe '->?' untuk menangani relasi yang mungkin null
        return [
            $row->is_accepted == '1' ? 'Lulus' : 'Tidak Lulus',
            $row->noreg_ppdb,
            '\'' . $row->nik,
            $row->nama,
            $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            $row->tempat_lahir,
            $formatTanggal($row->tanggal_lahir), // Format tanggal lahir siswa
            $row->alamat,
            $row->dusun,
            $row->rt,
            $row->rw,
            $row->desa,
            $row->kecamatan,
            $row->kabupaten,
            $row->provinsi,
            $row->kode_pos,
            $row->dataOrangTua?->nama_ayah,
            $row->dataOrangTua?->tempat_lahir_ayah,
            $formatTanggal($row->dataOrangTua?->tanggal_lahir_ayah), // Format tanggal lahir ayah
            $pendidikanMap[$row->dataOrangTua->pendidikan_ayah] ?? '',
            // Gunakan array lookup untuk Pekerjaan Ayah
            $pekerjaanMap[$row->dataOrangTua->pekerjaan_ayah] ?? '',
            // Gunakan array lookup untuk Penghasilan Ayah
            $penghasilanMap[$row->dataOrangTua->penghasilan_ayah] ?? '',
            $row->dataOrangTua?->alamat_ayah,
            $row->dataOrangTua?->nama_ibu,
            $row->dataOrangTua?->tempat_lahir_ibu,
            $formatTanggal($row->dataOrangTua->tanggal_lahir_ibu), // Format tanggal lahir ibu
            // Gunakan array lookup untuk Pendidikan Ibu
            $pendidikanMap[$row->dataOrangTua->pendidikan_ibu] ?? '',
            // Gunakan array lookup untuk Pekerjaan Ibu
            $pekerjaanMap[$row->dataOrangTua->pekerjaan_ibu] ?? '',
            // Gunakan array lookup untuk Penghasilan Ibu
            $penghasilanMap[$row->dataOrangTua->penghasilan_ibu] ?? '',
            $row->dataOrangTua?->alamat_ibu,
            $row->dataPeriodik?->hobi,
            $row->dataPeriodik?->cita_cita,
            $row->dataPeriodik?->tinggi_badan,
            $row->dataPeriodik?->berat_badan,
            $row->dataPeriodik?->jarak_rumah,
            $row->dataPeriodik?->waktu_tempuh,
            $row->dataPeriodik?->anak_ke,
            $row->dataPeriodik?->jumlah_saudara,
            $row->dataKesejahteraan?->nomor_kip,
            $row->dataKesejahteraan?->nomor_kis,
            $row->dataKesejahteraan?->nomor_kks,
            $row->dataKesejahteraan?->nomor_kps,
            $row->dataKesejahteraan?->nomor_pkh,
        ];
    }
}
