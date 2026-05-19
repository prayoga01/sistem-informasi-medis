<?php

namespace App\Exports;

use App\Models\Ahli;
use App\Models\Dokter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DokterExport implements FromView, ShouldAutoSize, WithDrawings
// class DokterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.dokter', [
            'dokters' => Dokter::all()
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
    // public function collection()
    // {
    //     return Dokter::all();
    // }
}