<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Client::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Client::create([
            'name'=>'Launy',
            'email'=>'garciavinolessrl@gmail.com',
            'password'=>Hash::make('launy-2025.AAC'),
        ]);
        Client::create([
            'name'=>'Guarnieri',
            'email'=>'gesport.mvdeo@gmail.com',
            'password'=>Hash::make('guarnieri-2025.REW'),
        ]);
        Client::create([
            'name'=>'cderderian cliente',
            'email'=>'cderderiancli@mail.com',
            'password'=>Hash::make('cderderiancli-2025.EAG'),
        ]);
        Client::create([
            'name'=>'cmoretti cliente',
            'email'=>'cmoretticli@mail.com',
            'password'=>Hash::make('cmoretticli-2025.AG8'),
        ]);


        // solo para mgap
        Client::create([
            'name'=>'Ivo 800',
            'email'=>'Ivo800@mgap.gub.uy',
            'password'=>Hash::make('ivo800-2025.RE5'),
        ]);
        Client::create([
            'name'=>'Casilla',
            'email'=>'casilla@mgap.gub.uy',
            'password'=>Hash::make('casilla-MGA.20o9'),
        ]);

        // documento 1 y 2
        Client::create([
            'name'=>'rama logistica',
            'email'=>'rama.logistica@aramaycia.com.uy',
            'password'=>Hash::make('logis.44s*5S8'),
        ]);
        Client::create([
            'name'=>'rama docs cona',
            'email'=>'rama.docs.cona@aramaycia.com.uy',
            'password'=>Hash::make('doxco+A.CON'),
        ]);

        Client::create([
            'name'=>'rama docs gral',
            'email'=>'rama.docs.general@aramaycia.com.uy',
            'password'=>Hash::make('gene-558.2205'),
        ]);







        //Client::factory()->count(30)->create();
    }
}
