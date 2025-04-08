<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class IncidenciaFilter
{

    protected $request;
    protected $filters = [
        "urgencia",
        "fecha"
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function apply(Builder $query)
    {
        foreach ($this->filters as $filter) {
            if ($this->request->has($filter)) {
                $method = $filter;
                if (method_exists($this, $method)) {
                    $query = $this->$method($query, $this->request->input($filter));
                }
            }
        }

        return $query;
    }

    public function urgencia(Builder $query, $value)
    {

        $mapeoUrgencias = [
            "Muy Alta" => ["Muy Alta", "Alta", "Media", "Baja"],
            "Alta" => ["Alta", "Muy Alta", "Media", "Baja"],
            "Media" => ["Media", "Muy Alta", "Alta", "Baja"],
            "Baja" => ["Baja", "Muy Alta", "Alta", "Media"],
        ];

        if (!isset($mapeoUrgencias[$value])) {
            return $query; 
        }

        $ordenUrgencias = $mapeoUrgencias[$value];


        $prioridades = [
            $ordenUrgencias[0] => 4,
            $ordenUrgencias[1] => 3,
            $ordenUrgencias[2] => 2,
            $ordenUrgencias[3] => 1,
        ];

        return $query->get()->sortByDesc(function ($incidencia) use ($prioridades) {
            return $prioridades[$incidencia->urgencia] ?? 0;
        })->values(); 

    }

}