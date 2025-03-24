<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    public function run(): void
    {
        $systems = [
            // Navigation
            [
                'category' => 'Navigation',
                'name' => 'Automatic Identification System',
                'supplier' => 'FURUNO',
                'model' => 'FA-170',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Voyage Data Recorder',
                'supplier' => 'FURUNO',
                'model' => 'VR-7000',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Navigation Assistance System',
                'supplier' => 'O.F.E',
                'model' => 'PENDING',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Echo Sounder',
                'supplier' => 'FURUNO',
                'model' => 'FE-800',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Doppler Speed Log',
                'supplier' => 'FURUNO',
                'model' => 'DS-85',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Satellite Speed Log',
                'supplier' => 'FURUNO',
                'model' => 'GS-100',
            ],
            [
                'category' => 'Navigation',
                'name' => 'Marine Radar',
                'supplier' => 'FURUNO',
                'model' => 'FAR-2338S-NXT, FAR-2328',
            ],
            [
                'category' => 'Navigation',
                'name' => 'ECDIS (incl. Conning Display)',
                'supplier' => 'FURUNO',
                'model' => 'FMD-3300',
            ],

            // Communication
            [
                'category' => 'Communication',
                'name' => 'MF/HF/DSC Radio',
                'supplier' => 'FURUNO',
                'model' => 'RC-1800F2-2D',
            ],
            [
                'category' => 'Communication',
                'name' => 'VSAT',
                'supplier' => 'FURUNO',
                'model' => 'FELCOM 18',
            ],
            [
                'category' => 'Communication',
                'name' => 'DGPS Navigator',
                'supplier' => 'FURUNO',
                'model' => 'GP-170',
            ],
            [
                'category' => 'Communication',
                'name' => 'Auto Telephone System',
                'supplier' => 'MRC',
                'model' => 'MED-100',
            ],
            [
                'category' => 'Communication',
                'name' => "Ship's Network System",
                'supplier' => 'O.F.E',
                'model' => null,
            ],
            [
                'category' => 'Communication',
                'name' => 'VSAT (incl. Smart Ship Solution System)',
                'supplier' => 'O.F.E',
                'model' => 'PENDING',
            ],

            // Control & Instrumentation
            [
                'category' => 'Control & Instrumentation',
                'name' => 'M/E Control System',
                'supplier' => 'HHI-EMD',
                'model' => 'MAN B&W 7G95ME-C10.5-LGIM',
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'Integrated Control and Monitoring System',
                'supplier' => 'HGS',
                'model' => 'HiCONiS',
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'Emergency Shutdown System',
                'supplier' => 'HGS',
                'model' => 'HiCONiS',
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'DF G/E Control System',
                'supplier' => 'HHI-EMD',
                'model' => '9H32DF-LM',
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'Valve Remote Control System',
                'supplier' => 'HOPPE',
                'model' => null,
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'Anti-Heeling System',
                'supplier' => 'HOPPE',
                'model' => null,
            ],
            [
                'category' => 'Control & Instrumentation',
                'name' => 'Shaft Power Meter',
                'supplier' => 'VAF',
                'model' => null,
            ],

            // Power
            [
                'category' => 'Power',
                'name' => 'Shaft Generator System',
                'supplier' => 'ABB',
                'model' => null,
            ],
            [
                'category' => 'Power',
                'name' => 'Refeer Container Monitoring System',
                'supplier' => 'Emerson',
                'model' => null,
            ],
        ];

        foreach ($systems as $system) {
            $category = Category::firstOrCreate(['name' => $system['category']]);

            $category->systems()->create([
                "name" => $system["name"],
                "supplier" => $system["supplier"],
                "model" => $system["model"],
            ]);
        }
    }
}
