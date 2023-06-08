<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    public $timestamps = false; //le indicamos que los tiempos estaran deshabilitados
    protected $fillable = [
        'nombre',
        'correo',
        'fk_carrera',
    ];
}
