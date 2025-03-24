<?php

namespace App\Imports;

use App\Models\Hardware;
use App\Models\System;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HardwareImport implements ToCollection, WithStartRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $system = System::whereName($row[1])->first();
            if ($system && $row[4] && $row[5]) {
                Hardware::create([
                    'system_id' => $system->id,
                    'name' => $row[4],
                    'location' => $row[5],
                    'model' => $row[6],
                    'q_type'=> $row[7],
                    'version' => $row[8],
                    'rj45' => $row[9],
                    'usb' => $row[10],
                    'serial' => $row[11],
                    'ip_address' => $row[12],
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
