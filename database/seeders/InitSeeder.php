<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Board;
use App\Models\Category;
use App\Models\Column;
use App\Models\Device;
use App\Models\Document;
use App\Models\Facility;
use App\Models\Guide;
use App\Models\Information;
use App\Models\Management;
use App\Models\Notice;
use App\Models\PayMethod;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\Concerns\Has;
use Symfony\Component\Console\Question\Question;

class InitSeeder extends Seeder
{
    protected $user;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        // Device::truncate();
        DB::statement("SET foreign_key_checks=1");

        $this->createDevices();
    }

    public function createDevices()
    {
        $items = [
            [
                "title" => "FW1",
                "left" => "45.8",
                "top" => "29.5",
            ],
            [
                "title" => "FW#2",
                "left" => "39.4",
                "top" => "34.5",
            ],
            [
                "title" => "FW#3",
                "left" => "33.78",
                "top" => "42.5",
            ],
            [
                "title" => "FW#4",
                "left" => "39.3",
                "top" => "53.2",
            ],
            [
                "title" => "FW#5",
                "left" => "64.5",
                "top" => "52.6",
            ],
            [
                "title" => "FW#6",
                "left" => "69",
                "top" => "39.6",
            ],
            [
                "title" => "L3 Switch",
                "left" => "49.4",
                "top" => "41.6",
            ],
            [
                "title" => "NMS",
                "left" => "68.3",
                "top" => "13.6",
            ],
            [
                "title" => "TMS",
                "left" => "60.3",
                "top" => "12",
            ]
        ];

        foreach($items as $item){
            Device::updateOrCreate([
               "title" => $item["title"],
            ],[
                "title" => $item["title"],
                "left" => $item["left"],
                "top" => $item["top"]
            ]);
        }
    }

}
