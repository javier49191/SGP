<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padrino extends Model
{
    protected $fillable = [
    	'nombre',
    	'apellido',
    	'alias',
    	'dni',
    	'cuil',
    	'email',
    	'segundo_email',
    	'telefono',
    	'segundo_telefono',
    	'contacto',
    	'domicilio_id',
    	'checklist',
    	'deleted_at',
    ];

    public function domicilio(){
        return $this->belongsTo(Domicilio::class);
    }
}
