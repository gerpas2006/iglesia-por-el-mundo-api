<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_evento',
        'descripcion_evento',
        'created_at',
        'updated_at'
    ];
    //
    public function eventos()
    {
        return $this->hasMany(Eventos::class, 'tipo_evento_id');
}
    
}