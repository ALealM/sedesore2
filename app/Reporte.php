<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Reporte extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'beneficiarios';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'fecha_nacimiento',
        'curp',
        'municipio',
        'localidad',
        'calle', 
        'numero_ext', 
        'numero_int', 
        'colonia',
        'codigo_postal',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function nombre(){
        return $this->attributes['nombre']." ".$this->attributes['apellido_paterno']." ".$this->attributes['apellido_materno'];
    }
    
    public function domicilio(){
        return "Calle ".$this->attributes['calle']." No. ".$this->attributes['num_ext']." Int.".$this->attributes['num_int']." Col. ".$this->attributes['colonia'];
    }
    
    
}
