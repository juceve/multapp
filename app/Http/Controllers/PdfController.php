<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use App\Models\Vw_sancione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function boleta($data = NULL)
    {
        $sancione = Vw_sancione::find($data);
        $sistema = Sistema::first();
        $pdf = Pdf::loadView('pdfs.boleta', compact('sancione', 'sistema'))
            ->setPaper('letter', 'portrait');

        return $pdf->stream();
    }
}
