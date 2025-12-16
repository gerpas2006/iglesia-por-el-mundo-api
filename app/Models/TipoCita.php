<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TipoCita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cita',
        'descripcion_cita'
    ];
    //
    public function citas()
    {
        return $this->hasMany(citas::class, 'tipo_cita_id');
    }
}
