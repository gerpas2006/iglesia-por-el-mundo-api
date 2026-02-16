<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reseneas extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo_reseneas',
        'calificacion_resenea',
        'comentario_resenea',
        'fecha_resenea',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
