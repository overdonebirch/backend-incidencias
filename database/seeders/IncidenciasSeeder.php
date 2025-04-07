<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Incidencia;
use Carbon\Carbon;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $urgencias = ['Alta', 'Muy Alta', 'Media', 'Baja'];

        for ($i = 0; $i < 20; $i++) {
            Incidencia::create([
                'titulo' => fake()->sentence(4),
                'descripcion' => fake()->paragraph(3),
                'urgencia' => fake()->randomElement($urgencias),
            ]);
        }
    }
}