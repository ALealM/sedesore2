<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PoblacionDesocupada extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'poblacion_desocupada';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',  
        'pob_desocupada_total',
        'pob_desocupada_hombres',
        'pob_desocupada_mujeres',
    ];
    
     
    
    
    
    
    
}
