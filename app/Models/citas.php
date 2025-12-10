<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_solicitante',
        'apellido_solicitante',
        'fecha_y_hora_cita',
        'mensaje',
        'tipo_cita_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    //
    public function tipoCita()
    {
        return $this->belongsTo(TipoCita::class, 'tipo_cita_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
}
}