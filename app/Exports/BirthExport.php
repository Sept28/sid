<?php

namespace App\Exports;

use App\Models\Birth;
use App\Models\Villager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BirthExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Villager::where([['kinship', 'anak'], ['status', 'ada']])->get();
    }

    public function map($births): array
    {
        return [
            $births->id,
            $births->familyCard->family_number,
            $births->name,
            $births->birth_date,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nomor KK',
            'Nama',
            'Tanggal Lahir',
        ];
    }
}
