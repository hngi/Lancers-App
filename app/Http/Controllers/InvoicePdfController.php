<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class InvoicePdfController extends Controller
{
    public function printPDF()
    {
       // This  $data array will be passed to our PDF blade
       //$data = ['title' => 'First PDF for Medium',];
        
        $pdf = PDF::loadView('invoice_view_pdf');  
        return $pdf->download('lancers_invoice.pdf');
    }
}
