<?php

namespace App\Exports;

use App\Models\FamilyCard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FamilyCardExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FamilyCard::all();
    }

    public function map($villagers): array
    {
        return [
            $villagers->id,
            $villagers->family_number,
            $villagers->villager->name, 
            $villagers->address,
            $villagers->village,
            $villagers->sub_district,
            $villagers->district,
            $villagers->province,
            $villagers->postal_code,
            $villagers->family_photo,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nomor KK',
            'Kepala Keluarga',
            'Alamat',
            'Desa',
            'Kecamatan',
            'Kabupaten/Kota',
            'Provinsi',
            'Kode Pos',
            'URL Foto KK',
        ];
    }
}
