<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_donante',
        'apellido_donante',
        'donacion',
        'mensaje',
        'fecha_donacion',
        'user_id',
        'metodo_pago_id',
        'tipo_donacion_id'
    ];
    //
    public function tipoDonacion()
    {
        return $this->belongsTo(TipoDonacion::class, 'tipo_donacion_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
