<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'email' => 'admin@portal.com',
            'password' => Hash::make('appdev1224'),
            'status' => true,
            'role' => 'admin',
            'cby' => 'admin',
        ]);
    }
}
