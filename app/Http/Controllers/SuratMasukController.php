<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function print(Request $request)
    {
        $tanggalAwal    = $request->input('tanggal_awal');
        $tanggalAkhir   = $request->input('tanggal_akhir');

        $data = SuratMasuk::query()
            ->when($tanggalAwal, fn ($query) => $query->where('tanggal_masuk', '>=', $tanggalAwal))
            ->when($tanggalAkhir, fn($query) => $query-where('tanggal_akhir', '<=', $tanggalAkhir))
            ->get();
        return view('print.surat_masuk', compact('data'));
    }
}
