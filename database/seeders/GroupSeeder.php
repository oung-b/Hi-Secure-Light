<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'Administrators',
//            'Account Operators',
//            'Backup Operators',
//            'Guests',
//            'Print Operators',
//            'Power Users',
//            'Replicator',
//            'Server Operators',
            'User',
        ];
        foreach ($groups as $group) {
            Group::create(['name' => $group]);
        }
    }
}
