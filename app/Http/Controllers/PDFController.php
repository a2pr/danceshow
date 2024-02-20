<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function businessPdf()
    {
        $data = [
            'title' => 'Sample PDF',
            'content' => 'This is the content of the PDF file.',
        ];

        $pdf = Pdf::loadView('pdfs/business-info', $data);

        return $pdf->download('sample.pdf');
    }
}
