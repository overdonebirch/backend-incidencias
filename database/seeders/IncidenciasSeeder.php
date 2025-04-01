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

        DB::table('incidencias')->insert([
            [   'nombre' => 'incidencia1',
                'urgencia' => 'Urgente',
                'descripcion' => 'Servidor principal caído. Requiere atención inmediata.',
            ],
            [
                'nombre' => 'incidencia2',
                'urgencia' => 'Media',
                'descripcion' => 'Problemas con el inicio de sesión de algunos usuarios en el portal de clientes.',
            ],
            [
                'nombre' => 'incidencia3',
                'urgencia' => 'Baja',
                'descripcion' => 'Mejora solicitada para el diseño del reporte mensual de incidencias.',
            ],
        ]);
    }
}