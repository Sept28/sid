<?php

namespace App\Exports;

use App\Models\Villager;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VillagerExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function query()
    {
        return Villager::query()->where('status', 'ada');
    }

    public function map($villagers): array
    {
        return [
            $villagers->id,
            $villagers->id_number,
            $villagers->name,
            $villagers->age,
            $villagers->birth_date,
            $villagers->birth_place,
            $villagers->gender,
            $villagers->blood_type,
            $villagers->address,
            $villagers->religion,
            $villagers->marital_status,
            $villagers->citizenship,
            $villagers->education,
            $villagers->parent,
            $villagers->id_photo,
            $villagers->kinship,
            $villagers->status,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'NIK',
            'Nama',
            'Usia',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Jenis Kelamin',
            'Golongan Darah',
            'Alamat',
            'Agama',
            'Status Kawin',
            'Kewarganegaraan',
            'Pendidikan',
            'Orang Tua',
            'URL Foto KTP',
            'Hubungan',
            'Status',
        ];
    }
}