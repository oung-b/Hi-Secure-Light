<?php

namespace App\Imports;

use App\Models\SystemLog;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SystemEventImport implements ToCollection, WithStartRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            SystemLog::create([
                'entry_type' => $row[1],
                'source' => $row[2],
                'event_id' => $row[3],
                'message' => $row[4],
                'created_at' => Carbon::parse($row[0]),
                'updated_at' => Carbon::parse($row[0]),
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
