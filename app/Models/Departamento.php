<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = ["Nombre_departamento", "Nombre_titular", "Tratamiento_titular", "Cargo_titular", "Prefijo","Carpeta", "Ur_Perteneciente"];
}
