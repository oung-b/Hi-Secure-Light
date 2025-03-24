<?php

namespace Database\Seeders;

use App\Models\GlobalSetting;
use Illuminate\Database\Seeder;

class GlobalSettingSeeder extends Seeder
{
    public function run(): void
    {
        GlobalSetting::create([
            'warning_text' => "Legal and privacy information.
Unauthorized users prohibited."
        ]);
    }
}
