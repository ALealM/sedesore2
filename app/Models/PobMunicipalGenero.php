<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PobMunicipalGenero extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'poblacion_municipal_hombre_mujer';
    public $timestamps = false;
    protected $fillable = [
        'id_rango', 
//        'grupos_quinquenal', 
        'total',
        'hombres',
        'mujeres',
        'id_municipio'
        
    ];
    
     
    
    
    
    
    
}
