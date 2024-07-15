<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    private function dataPegawai($filters){
        $filterSuku = $filters['suku'] ?? null;
        $filterJenisKelamin = $filters['jenis_kelamin'] ?? null;
        $filterJenjangPendidikan = $filters['jenjang_pendidikan'] ?? null;
        $filterStatusPernikahan = $filters['status_pernikahan'] ?? null;
        
        $data =  Pegawai::query()
            ->when(isset($filterSuku), function($query) use ($filterSuku){
                $query->whereHas('suku', fn ($query) => $query->where('suku', $filterSuku));
            })
            ->when(isset($filterJenisKelamin), function($query) use ($filterJenisKelamin){
                $query->whereHas('jenisKelamin', fn ($query) => $query->where('jenis_kelamin', $filterJenisKelamin));
            })
            ->when(isset($filterJenjangPendidikan), function($query) use ($filterJenjangPendidikan){
                $query->whereHas('jenjangPendidikan', fn ($query) => $query->where('jenjang_pendidikan', $filterJenjangPendidikan));
            })
            ->when(isset($filterStatusPernikahan), function($query) use ($filterStatusPernikahan){
                $query->whereHas('statusPerkawinan', fn ($query) => $query->where('status_perkawinan', $filterStatusPernikahan));
            })
            ->get();
        return $data;
    }
    public function printPdf(Request $request){
        $filters = $request->get('filter');
        if($request->get('pdfPage') === 'pegawai'){
            $data =  $this->dataPegawai($filters);
        }
        $pdf = PDF::loadView('Pdf.'.$request->get('pdfPage'), compact('data'));
        return $pdf->setPaper('a2', 'landscape')->stream($request->get('pdfPage').'.pdf');
    }

    public function downloadPdf(Request $request){
        $filters = $request->get('filter');
        if($request->get('pdfPage') === 'pegawai'){
            $data =  $this->dataPegawai($filters);
        }
        $pdf = PDF::loadView('Pdf.'.$request->get('pdfPage'), compact('data'));
        return $pdf->setPaper('a2', 'landscape')->download($request->get('pdfPage').'.pdf');
    }
}
