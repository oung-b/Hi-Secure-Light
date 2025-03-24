<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GroupSeeder::class,
            AuthoritySeeder::class,
            UserSeeder::class,
            SystemSeeder::class,
            InitSeeder::class,
            GlobalSettingSeeder::class
        ]);
    }
}
