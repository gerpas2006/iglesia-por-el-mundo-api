<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reseñas extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo_reseneas',
        'calificacion_resenea',
        'comentario_resenea',
        'fecha_resenea',
        'usuario',
    ];
    //
}
