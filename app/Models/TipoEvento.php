<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TipoEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_evento',
        'descripcion_evento'
    ];
    //
    public function eventos()
    {
        return $this->hasMany(Eventos::class, 'tipo_evento_id');
}
    
}