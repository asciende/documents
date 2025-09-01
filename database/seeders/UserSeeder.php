<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User::firstOrCreate(
        //     ['email' => 'cmoretti@gmail.com'],
        //     [
        //         'name' => 'cmoretti',
        //         'password' => Hash::make('cmoretti'),
        //     ]
        // );

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
            'name'=>'Christian Admin',
            'email'=>'cderderian@mail.com',
            'password'=>Hash::make('cderderian.ADM-885'),
        ]);
        User::create([
            'name'=>'cmoretti Admin',
            'email'=>'cmoretti@mail.com',
            'password'=>Hash::make('cmoretti.ADM-875'),
        ]);



    }
}
