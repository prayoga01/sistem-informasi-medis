<?php

namespace App\Exports;

use App\Models\Pengajuan;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengajuanExport implements FromView, WithDrawings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     // return Pengajuan::all();
    //     return Pengajuan::whereFullText('status', 'Dokumen Selesai')->get();
    // }

    private $filtr;

    public function __construct($filtr)
    {
        $this->filtr = $filtr;
    }

    public function view(): View
    {
        // dd($this->filtr);
        return view('export.pengajuan', [
            'pengajuans' => $this->filtr
            // 'pengajuans'=> Pengajuan::latest()->filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']))->paginate(7)
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/aset/img/logo RSUD.png'));
        $drawing->setHeight(30);
        $drawing->setCoordinates('A1');

        return $drawing;
    }
}