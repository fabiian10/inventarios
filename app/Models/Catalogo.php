<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    protected $fillable = ["Oficina", "Titular", "Tratamiento", "Cargo", "Prefijo","carpeta_documentos", "Ur"];
}
