<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{

    use HasFactory;

    protected $fillable = [
        'nombre_evento',
        'fecha_evento',
        'ubicacion',
        'descripcion_evento',
        'user_id',
        'tipo_evento_id',
        'created_at',
        'updated_at'
    ];
    //

    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class, 'tipo_evento_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
