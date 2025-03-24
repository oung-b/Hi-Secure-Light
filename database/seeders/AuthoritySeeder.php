<?php

namespace Database\Seeders;

use App\Models\Authority;
use Illuminate\Database\Seeder;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = [
            'Admin',
//            'Account Operators',
//            'Backup Operators',
//            'Guests',
//            'Print Operators',
//            'Power Users',
//            'Replicator',
//            'Server Operators',
            'User',
        ];
        foreach ($authorities as $authority) {
            Authority::create(['name' => $authority]);
        }
    }
}
