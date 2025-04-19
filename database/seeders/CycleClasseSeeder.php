<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cycle;
use App\Models\Classe;

class CycleClasseSeeder extends Seeder
{
    public function run()
    {
        $primaire = Cycle::create(['nom' => 'Primaire']);
        $secondaire = Cycle::create(['nom' => 'Secondaire Général']);

        $primaire->classes()->createMany([
            ['nom' => 'CI'],
            ['nom' => 'CP1'],
            ['nom' => 'CP2'],
            ['nom' => 'CE1'],
            ['nom' => 'CE2'],
            ['nom' => 'CM1'],
            ['nom' => 'CM2'],
        ]);

        $secondaire->classes()->createMany([
            ['nom' => '6e'],
            ['nom' => '5e'],
            ['nom' => '4e ML'],
            ['nom' => '4e MC'],
            ['nom' => '3e MC'],
            ['nom' => '3e ML'],
            ['nom' => 'Seconde A'],
            ['nom' => 'Seconde B'],
            ['nom' => 'Seconde C'],
            ['nom' => 'Seconde D'],
            ['nom' => '1ère A'],
            ['nom' => '1ère B'],
            ['nom' => '1ère C'],
            ['nom' => '1ère D'],
            ['nom' => 'Terminale A'],
            ['nom' => 'Terminale A1'],
            ['nom' => 'Terminale B'],
            ['nom' => 'Terminale C'],
            ['nom' => 'Terminale D'],
        ]);
    }
}
