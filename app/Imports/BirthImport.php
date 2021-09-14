<?php

namespace App\Imports;

use App\Models\Birth;
use Maatwebsite\Excel\Concerns\ToModel;

class BirthImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Birth([
            'family_card_id' => $row[1],
            'name' => $row[2],
            'birth_date' => $row[3],
        ]);
    }
}
