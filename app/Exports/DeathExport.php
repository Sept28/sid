<?php

namespace App\Exports;

use App\Models\Death;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DeathExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Death::all();
    }

    public function map($deaths): array
    {
        return [
            $deaths->id,
            $deaths->villager->name,
            $deaths->obit,
            $deaths->cause,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Tanggal Kematian',
            'Penyebab',
        ];
    }
}
