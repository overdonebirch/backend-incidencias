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
        $estados = ['Abierta', 'En Proceso', 'Resuelta', 'Cerrada'];

        $titulos = [
            'Fallo en la impresora',
            'Problema con el correo',
            'Corte de red',
            'Pantalla azul en Windows',
            'No funciona el ratón',
            'Actualización de software',
            'Error al iniciar sesión',
            'Lentitud en el sistema',
            'Solicitud de acceso',
            'Problema con VPN',
            'Fallo en la base de datos',
            'No se guarda el archivo',
            'Error al imprimir',
            'Sistema caído',
            'Problemas con Zoom',
            'Configuración de correo',
            'Sin acceso a Internet',
            'Actualización pendiente',
            'Fallos de seguridad',
            'Usuario bloqueado',
            'Problema con Office',
            'Teclado no responde',
            'Error en SAP',
            'Soporte para instalación',
            'Restablecer contraseña',
        ];

        $descripciones = [
            'El usuario reporta que el equipo no responde al intentar imprimir.',
            'El sistema operativo no carga correctamente y se reinicia solo.',
            'Se requiere actualización de antivirus en varios equipos.',
            'Solicitan configuración del cliente de correo para nuevos usuarios.',
            'Error persistente en la conexión a la base de datos del sistema.',
            'Red muy lenta, no se puede trabajar adecuadamente.',
            'Fallo intermitente de conexión a Internet en la oficina principal.',
            'Problema con los permisos de una carpeta compartida.',
            'El sistema SAP lanza error de autenticación.',
            'Se detectó posible intento de acceso no autorizado.',
        ];

        for ($i = 0; $i < 25; $i++) {
            DB::table('incidencias')->insert([
                'titulo' => $titulos[array_rand($titulos)],
                'descripcion' => $descripciones[array_rand($descripciones)],
                'urgencia' => $urgencias[array_rand($urgencias)],
                'estado' => $estados[array_rand($estados)],
                'created_at' => Carbon::now()->subDays(rand(0, 60)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}