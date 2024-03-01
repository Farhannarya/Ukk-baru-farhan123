<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produk;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $produk = produk::get();
        $data = [
            'title' => 'Kasir Perabotan',
            'data' => date('m/d/Y'),
            'produk' => $produk
        ];
        $pdf = Pdf::loadView('produk.generate-prodact-pdf', $data);
        return $pdf->download('funda-produk-data.pdf');
    }
}
