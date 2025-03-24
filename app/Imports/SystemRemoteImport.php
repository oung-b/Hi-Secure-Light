<?php

namespace App\Imports;

use App\Models\RemoteLog;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SystemRemoteImport implements ToCollection, WithStartRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            RemoteLog::create([
                'event_id' => $row[1],
                'message' => $row[2],
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
