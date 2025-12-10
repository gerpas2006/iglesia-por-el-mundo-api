<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oraciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_oracion',
        'texto_oracion',
        'tipo_oracion_id',
        'created_at',
        'updated_at'
    ];
    //
    public function tipoOracion()
    {
        return $this->belongsTo(TipoOracion::class, 'tipo_oracion_id');
    }
    
}
