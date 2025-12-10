<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cita',
        'descripcion_cita',
        'created_at',
        'updated_at'
    ];
    //
    public function citas()
    {
        return $this->hasMany(citas::class, 'tipo_cita_id');
    }
}
