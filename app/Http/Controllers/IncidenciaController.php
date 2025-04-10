<?php

namespace App\Http\Controllers;

use App\Filters\IncidenciaFilter;
use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Incidencia::query();
        $page = 5;
        $filter = new IncidenciaFilter($request);
        $query = $filter->apply($query);

        if ($request->has("perPage")) {
            $page = $request->input("perPage");
        }



        return $query->paginate($page);
    }

    public function urgencias(Request $request)
    {
        $urgencias = Incidencia::query()->distinct()->pluck("urgencia");
        $prioridades = [
            'Muy Alta',
            'Alta',
            'Media',
            'Baja'
        ];

        // Ordenar las urgencias según el orden de las prioridades
        $urgenciasOrdenadas = $urgencias->sortBy(function ($urgencia) use ($prioridades) {
            return array_search($urgencia, $prioridades);
        })->values()->toArray();

        return $urgenciasOrdenadas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $incidencia = Incidencia::create($request->all());

            return response()->json([
                "message" => "Incidencia creada",
                "incidencia" => $incidencia
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia): Incidencia
    {
        return $incidencia;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        $validated = $request->validate([
            'titulo' => 'sometimes',
            'descripcion' => 'sometimes',
            'urgencia' => 'sometimes|in:Baja,Media,Alta,Muy Alta',
        ]);

        $incidencia->update($validated);

        return json_encode(["message" => "Incidencia actualizada"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();
   
    }

    public function enviarMail($subject, $cuerpoMensaje, $colorTitulo)
    {
        $mail = new TestEmail($subject, $cuerpoMensaje, $colorTitulo);
        Mail::to('destinatario@example.com')->send($mail);
    }

    public function getIncidenciaSchema()
    {
        $schema = [
            'title' => 'Incidencia',
            'description' => 'Schema de una Incidencia',
            'type' => 'object',
            'properties' => [
                'id' => [
                    'description' => 'El id de la incidencia',
                    'type' => 'string',
                    'minLength' => 1
                ],
                'titulo' => [
                    'description' => 'El titulo de la incidencia',
                    'type' => 'string',
                    'minLength' => 1
                ],
                'descripcion' => [
                    'description' => 'La descripcion de la incidencia',
                    'type' => 'string',
                    'minLength' => 1
                ],
                'urgencia' => [
                    'description' => 'La urgencia de la incidencia',
                    'type' => 'string',
                    'enum' => array_values(Incidencia::URGENCIAS)
                ]
            ],
            'required' => ['id', 'titulo', 'descripcion', 'urgencia'],
            "additionalProperties" => false
        ];

        return response()->json($schema);
    }
}
