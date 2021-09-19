<?php

namespace App\Exports;

use App\Models\Comer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComerExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comer::all();
    }

    public function map($comers): array
    {
        return [
            $comers->id,
            $comers->villager->name,
            $comers->arrival_date,
            $comers->id_number,
            $comers->name,
            $comers->age,
            $comers->birth_date,
            $comers->birth_place,
            $comers->gender,
            $comers->blood_type,
            $comers->address,
            $comers->religion,
            $comers->marital_status,
            $comers->citizenship,
            $comers->education,
            $comers->parent,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Pelapor',
            'Tanggal Datang',
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
        ];
    }
}
