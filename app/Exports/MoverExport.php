<?php

namespace App\Exports;

use App\Models\Mover;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MoverExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mover::all();
    }

    public function map($movers): array
    {
        return [
            $movers->id,
            $movers->villager->name,
            $movers->villager->id_number,
            $movers->date,
            $movers->cause,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'NIK',
            'Tanggal Pindah',
            'Alasan'
        ];
    }
}
