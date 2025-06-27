<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dataOrangTua()
    {
        // Asumsi: 'noreg_ppdb' adalah foreign key di tabel 'data_orang_tua'
        return $this->hasOne(DataOrangTua::class, 'noreg_ppdb', 'noreg_ppdb');
    }

    public function dataPeriodik()
    {
        // Asumsi: 'noreg_ppdb' adalah foreign key di tabel 'data_periodik'
        return $this->hasOne(DataPeriodik::class, 'noreg_ppdb', 'noreg_ppdb');
    }

    public function dataKesejahteraan()
    {
        // Asumsi: 'noreg_ppdb' adalah foreign key di tabel 'data_kesejahteraan'
        return $this->hasOne(DataKesejahteraan::class, 'noreg_ppdb', 'noreg_ppdb');
    }
}
