<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ComposicionEdadSexo extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'composicion_edad_sexo';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_municipio',
        'rango',
        'poblacion_total',
        'hombres',
        'mujeres',
        'relacion_hombres_mujeres',
        'porc_hombres',
        'porc_mujeres',
        'edad_media',
        'razon_dependencia_edad',
        
    ];
    
    
    
     
    
}
