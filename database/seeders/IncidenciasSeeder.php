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

        $incidencias = [
            [
                'titulo' => 'Fuga de agua en el pasillo principal',
                'descripcion' => 'Se detectó una fuga constante de agua cerca de la entrada del edificio. Puede representar riesgo de resbalones.',
                'urgencia' => 'Alta',
            ],
            [
                'titulo' => 'Corte de energía en el segundo piso',
                'descripcion' => 'Desde la mañana no hay suministro eléctrico en varias oficinas del segundo nivel.',
                'urgencia' => 'Muy Alta',
            ],
            [
                'titulo' => 'Problema con el acceso a internet',
                'descripcion' => 'Los usuarios reportan intermitencia en la conexión Wi-Fi en el área administrativa.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Papelera desbordada en baño de visitas',
                'descripcion' => 'La papelera del baño de visitas no ha sido vaciada desde ayer.',
                'urgencia' => 'Baja',
            ],
            [
                'titulo' => 'Puerta de emergencia trabada',
                'descripcion' => 'La puerta de emergencia del tercer piso no abre correctamente. Representa un riesgo en caso de evacuación.',
                'urgencia' => 'Muy Alta',
            ],
            [
                'titulo' => 'Aire acondicionado no funciona',
                'descripcion' => 'La unidad de aire en la sala de reuniones dejó de funcionar, causando incomodidad a los asistentes.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Ruidos extraños en el sistema eléctrico',
                'descripcion' => 'Se escuchan zumbidos constantes en el cuarto de servidores. Posible sobrecarga.',
                'urgencia' => 'Alta',
            ],
            [
                'titulo' => 'Escalera con peldaño flojo',
                'descripcion' => 'Uno de los peldaños de la escalera central está flojo y podría causar un accidente.',
                'urgencia' => 'Alta',
            ],
            [
                'titulo' => 'Solicitar recarga de extintores',
                'descripcion' => 'Varios extintores se encuentran con carga vencida, según etiquetas de revisión.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Foco fundido en pasillo de entrada',
                'descripcion' => 'El foco principal del pasillo de entrada no funciona, dejando el área oscura.',
                'urgencia' => 'Baja',
            ],
            [
                'titulo' => 'Elevador detenido entre pisos',
                'descripcion' => 'El elevador se quedó trabado entre el piso 1 y 2 con una persona dentro. Ya se llamó al técnico.',
                'urgencia' => 'Muy Alta',
            ],
            [
                'titulo' => 'Grieta en pared de la sala de espera',
                'descripcion' => 'Se detectó una grieta vertical en una de las paredes principales, cerca del techo.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Computadora con fallas al arrancar',
                'descripcion' => 'Una de las computadoras de recepción no inicia correctamente. Pantalla negra al prender.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Cables expuestos en zona de carga',
                'descripcion' => 'Hay cables eléctricos sin protección en la zona donde se recibe mercancía.',
                'urgencia' => 'Alta',
            ],
            [
                'titulo' => 'Olor a gas en cocina del comedor',
                'descripcion' => 'Se percibe un fuerte olor a gas cerca de la estufa. Se cerró el suministro preventivamente.',
                'urgencia' => 'Muy Alta',
            ],
            [
                'titulo' => 'Basura acumulada en patio trasero',
                'descripcion' => 'Hay acumulación de bolsas de basura sin recoger desde hace dos días.',
                'urgencia' => 'Baja',
            ],
            [
                'titulo' => 'Fallo en sistema de alarma contra incendios',
                'descripcion' => 'La alarma se activó sin razón y no se pudo desactivar por varios minutos.',
                'urgencia' => 'Muy Alta',
            ],
            [
                'titulo' => 'Problemas con la cerradura del archivo',
                'descripcion' => 'La puerta del archivo principal no cierra completamente, dejando documentos expuestos.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Daño en la pantalla informativa del lobby',
                'descripcion' => 'La pantalla principal que muestra anuncios está rota y parpadea constantemente.',
                'urgencia' => 'Media',
            ],
            [
                'titulo' => 'Falta de jabón en baños de empleados',
                'descripcion' => 'Los dispensadores de jabón en los baños de empleados están vacíos desde esta mañana.',
                'urgencia' => 'Baja',
            ],
        ];

        foreach ($incidencias as &$incidencia) {
            $incidencia['created_at'] = Carbon::now();
            $incidencia['updated_at'] = Carbon::now();
        }

        DB::table('incidencias')->insert($incidencias);
    }
}