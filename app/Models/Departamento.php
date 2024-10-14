<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = ["nombre_departamento", "nombre_titular", "tratamiento_titular", "cargo_titular", "prefijo","carpeta", "ur_perteneciente"];
}
