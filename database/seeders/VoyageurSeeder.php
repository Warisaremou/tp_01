<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Voyageur;
use Illuminate\Database\Seeder;

class VoyageurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Voyageur::create([
        //     'nom' => 'JOHN',
        //     'prenom' => 'Doe',
        //     'ville' => 'Cotonou',
        //     'region' => 'Benin',
        //     'sexe' => 'M',
        // ]);

        // Voyageur::create([
        //     'nom' => 'BALOGOUN',
        //     'prenom' => 'Mariam',
        //     'ville' => 'Lokossa',
        //     'region' => 'Benin',
        //     'sexe' => 'F',
        // ]);

        Voyageur::create([
            'nom' => 'OGUNMOLA',
            'prenom' => 'Bilal',
            'ville' => 'Porto-Novo',
            'region' => 'Benin',
            'sexe' => 'M',
        ]);

        // Voyageur::create([
        //     'nom' => 'ASSOGBA',
        //     'prenom' => 'Oscar',
        //     'ville' => 'Cotonou',
        //     'region' => 'Benin',
        //     'sexe' => 'M',
        // ]);
    }
}
