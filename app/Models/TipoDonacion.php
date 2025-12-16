<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoDonacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_donacion',
        'descripcion_donacion'
    ];
    //
    public function donaciones()
    {
        return $this->hasMany(Donaciones::class, 'tipo_donacion_id');
    }
    
}
