<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Padron extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'padron';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'ap_paterno',
        'ap_materno',
        'nombre_completo',
        'fecha_nacimiento',
        'lug_nac',
        'genero',
        'curp',
        'rfc',
        'ocupacion',
        'calle',
        'n_ext',
        'n_int',
        'colonia',
        'cp',
        'df',
        'id_municipio',
        'id_seccion',
        'id_localidad',
        'manzana',
        'listanom',
    ];
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','id_municipio','id')->first();
    }
    
    public function nombre(){
        return $this->attributes['nombre']." ".$this->attributes['ap_paterno']." ".$this->attributes['ap_materno'];
    }
    
    public function domicilio(){
        return $this->attributes['calle']." ".$this->attributes['n_ext']." ".$this->attributes['colonia'];
    }
}
