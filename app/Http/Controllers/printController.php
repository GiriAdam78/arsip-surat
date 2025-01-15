<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use PDF;

class printController extends Controller
{
    public function printDokumen(Request $request){
          // Ambil parameter tanggal_masuk dari query string
          $tanggalMasuk = $request->query('tanggal_masuk');

          // Ambil data surat masuk berdasarkan tanggal_masuk
          $suratMasuk = SuratMasuk::whereDate('tanggal_masuk', $tanggalMasuk)->get();
  
          // Generate PDF menggunakan DOMPDF
          $pdf = PDF::loadView('print.laporan-surat', compact('suratMasuk','tanggalMasuk'));
          $pdf->setPaper('legal', 'landscape');
  
          // Return PDF ke browser
          return $pdf->stream('surat-masuk-' . $tanggalMasuk . '.pdf'); 
    }
}
