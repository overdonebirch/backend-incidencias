<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    const URGENCIAS = [
        'URGENTE' => 'Urgente',
        'MUY_URGENTE' => 'Muy Urgente',
        'MEDIA' => 'Media',
        'BAJA' => 'Baja'
    ];

    use HasFactory;
}
