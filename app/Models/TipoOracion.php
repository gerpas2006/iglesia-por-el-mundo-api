<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TipoOracion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_oracion',
        'descripcion_oracion'
    ];
    //
    public function oraciones()
    {
        return $this->hasMany(Oraciones::class, 'tipo_oracion_id');
    }
}
