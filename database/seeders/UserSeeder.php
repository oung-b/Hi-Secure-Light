<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ids' => 'manager',
            'name' => 'manager',
            'password' => Hash::make('hgs_1qa@WS'),
            'group_id' => 1,
            'authority_id' => 1,
            'email' => 'manager@gmail.com',
            'period_of_use' => '2030-12-31',
        ]);
        User::create([
            'ids' => 'test@naver.com',
            'name' => 'test',
            'password' => Hash::make('test@naver.com'),
            'group_id' => 2,
            'authority_id' => 2,
            'email' => 'test@naver.com',
            'period_of_use' => '2030-12-31',
        ]);
    }
}
