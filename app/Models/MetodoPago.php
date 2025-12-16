<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class MetodoPago extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_donacion',
        'descripcion_donacion'
    ];
    //
    public function donaciones()
    {
        return $this->hasMany(Donaciones::class, 'metodo_pago_id');
    }
}
