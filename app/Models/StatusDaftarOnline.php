<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDaftarOnline extends Model
{
    use HasFactory;
    protected $fillable = [
        'noreg_ppdb',
        'statusBiodata',
        'statusDataOrangTua',
        'statusDataPeriodik',
        'statusKesejahteraan',
        'statusDokumenPendaftaran',
        'statusFinalisasi'
    ];
}
