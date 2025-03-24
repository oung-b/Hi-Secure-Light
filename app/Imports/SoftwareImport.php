<?php

namespace App\Imports;

use App\Models\Software;
use App\Models\System;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoftwareImport implements ToCollection, WithStartRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $system = System::whereName($row[1])->first();
            if ($system && $row[4]) {
                Software::create([
                    'system_id' => $system->id,
                    'name' => $row[4],
                    'firmware' => $row[5],
                    'application' => $row[6],
                    'patch_level'=> $row[7],
                    'purpose' => $row[8],
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
