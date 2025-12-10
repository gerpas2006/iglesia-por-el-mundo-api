<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoOracion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_oracion',
        'descripcion_oracion',
        'created_at',
        'updated_at'
    ];
    //
    public function oraciones()
    {
        return $this->hasMany(Oraciones::class, 'tipo_oracion_id');
    }
}
