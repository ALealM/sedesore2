<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PoblacionOcupada extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'poblacion_ocupada';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',  
        'pob_ocupada_total',
        'pob_ocupada_hombres',
        'pob_ocupada_mujeres',
    ];
    
     
    
    
    
    
    
}
