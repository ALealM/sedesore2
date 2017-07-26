<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Demografia extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'demografia';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'rango',
        'poblacion_total',
        'hombres',
        'mujeres',
        'lista_nominal',
        'mayores_18',
        
    ];
    
    
    
     
    
}
