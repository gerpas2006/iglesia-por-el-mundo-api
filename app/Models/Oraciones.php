<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oraciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_oracion',
        'texto_oracion',
        'autor',
        'estado',
        'tipo_oracion_id'
    ];
    //
    public function tipoOracion()
    {
        return $this->belongsTo(TipoOracion::class, 'tipo_oracion_id');
    }
    
}
