<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportHasilController extends Controller
{
    public function exportPdf()
    {
        // Logic to generate PDF report
        $hasilSeleksi = Biodata::where('is_accepted', '1')
            ->get();

        $pdf = Pdf::loadView('admin.export.export-pdf', compact('hasilSeleksi'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-hasil-pendaftar.pdf');
    }
}
