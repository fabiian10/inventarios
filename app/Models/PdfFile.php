<?php
// app/Models/PdfFile.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}