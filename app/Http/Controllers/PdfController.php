<?php

namespace App\Http\Controllers;

use App\Models\Sistema;
use App\Models\Vw_sancione;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PdfController extends Controller
{
    public function boleta($data = NULL)
    {
        $sancione = Vw_sancione::find($data);
        $sistema = Sistema::first();
        $pdf = Pdf::loadView('pdfs.boleta', compact('sancione', 'sistema'))
            ->setPaper('letter', 'portrait');

        return $pdf->stream();

        // return view('pdfs.boleta', compact('sancione', 'sistema'));
    }

    public function boletas($data = NULL)
    {
        $sanciones = Session::get('sancionesAll');
        $parametros = Session::get('parametros');

        // $pdf = Pdf::loadView('pdfs.boletas', compact('sanciones', 'parametros'))
        //     ->setPaper('letter', 'portrait');

        // return $pdf->stream();

        return view('pdfs.boletas', compact('sanciones', 'parametros'));
    }
}
