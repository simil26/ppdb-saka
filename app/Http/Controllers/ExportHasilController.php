<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ExportHasilExcel;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportExcel()
    {
        // Logic to generate Excel report
        $fileName = 'Hasil Seleksi ' . now()->format('d-m-Y') . '.xlsx';
        return Excel::download(new ExportHasilExcel, $fileName);
    }
}
