<?php

namespace App\Imports;

use App\Models\Comer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ComerImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comer([
        'villager_id' => $row[1],
        'arrival_date' => $row[2],
        'id_number' => $row[3],
        'name' => $row[4],
        'age' => $row[5],
        'birth_date' => $row[6],
        'birth_place' => $row[7],
        'gender' => $row[8],
        'blood_type' => $row[9],
        'address' => $row[10],
        'religion' => $row[11],
        'marital_status' => $row[12],
        'citizenship' => $row[13],
        'education' => $row[14],
        'parent' => $row[15],
        ]);
    }

    public function StartRow(): int
    {
        return 2;
    }
}
