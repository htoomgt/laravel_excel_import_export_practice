<?php

namespace App\Imports;


use App\Models\Developer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class DeveloperImportDirect implements ToModel
{
    // use Importable;

    /**
    * @param array $row
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        if($row[0] == 'fullname'){
            return null;
        }

        return new Developer([
            'fullname' => $row[0],
            'email' => $row[1],
            'phone' => $row[2]
        ]);
    }
}
