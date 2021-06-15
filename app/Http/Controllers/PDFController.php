<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Model\estudiante;
use App\Model\curso;

class PDFController extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');

    }
    public function PDFEstudiantes(){
        $estudiantes = estudiante::all();
        
        $pdf = PDF::loadView('estudiante.pdf.estudiantes', compact('estudiantes'));

        return $pdf->stream('Estudiantes.pdf');
    }
}
