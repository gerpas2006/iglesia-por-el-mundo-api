<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
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
        return $this->hasMany(Donaciones::class, 'metodo_pago_id');
    }
}
