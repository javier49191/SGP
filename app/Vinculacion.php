<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinculacion extends Model
{
    protected $fillable = [
    	'padrino_id',
    	'alumno_id',
    	'se_conocen',
    	'observaciones',
    	'deleted_at'
    ];

    public function alumnos(){
    	return $this->hasMany(Alumno::class);
    }

    public function padrinos(){
    	return $this->hasMany(Padrino::class);
    }
}
