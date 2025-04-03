<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Incidencia::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidencia = Incidencia::create($request->all());
        return json_encode(["message" => "Incidencia creada con id $incidencia->id"]);
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
            'nombre' => 'sometimes',
            'descripcion' => 'sometimes',
            'urgencia' => 'sometimes|in:Urgente,Muy Urgente,Media,Baja',
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

    public function getIncidenciaSchema()
    {
        $schema = [
            'title' => 'Incidencia',
            'description' => 'Schema de una Incidencia',
            'type' => 'object',
            'properties' => [
                'id' => [
                    'description' => 'El id de la incidencia',
                    'type' => 'string'
                ],
                'nombre' => [
                    'description' => 'El nombre de la incidencia',
                    'type' => 'string'
                ],
                'descripcion' => [
                    'description' => 'La descripcion de la incidencia',
                    'type' => 'string'
                ],
                'urgencia' => [
                    'description' => 'La urgencia de la incidencia',
                    'type' => 'string'
                ]
            ],
            'required' => ['id', 'nombre', 'descripcion', 'urgencia'],
            "additionalProperties" => false
        ];

        return response()->json($schema);
    }
}
