<?php

namespace App\Imports;

use App\Models\Mover;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MoverImport implements ToModel, WithStartRow
{
    public function StartRow(): int
    {
        return 2;
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mover([
            'villager_id' => $row[1],
            'villager_id' => $row[2],
            'date' => $row[3],
            'cause' => $row[4]
        ]);
    }

}
