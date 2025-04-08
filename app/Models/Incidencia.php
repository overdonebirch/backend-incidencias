<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Incidencia extends Model
{
    protected $fillable = ['id','urgencia', 'descripcion','titulo'];
    const URGENCIAS = [
        'URGENTE' => 'Alta',
        'MUY_URGENTE' => 'Muy Alta',
        'MEDIA' => 'Media',
        'BAJA' => 'Baja'
    ];

    use HasFactory;
}
