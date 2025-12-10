<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDonacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_donacion',
        'descripcion_donacion',
        'created_at',
        'updated_at'
    ];
    //
    public function donaciones()
    {
        return $this->hasMany(Donaciones::class, 'tipo_donacion_id');
    }
    
}
