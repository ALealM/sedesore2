<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Marginacion extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'marginacion';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio', 
        'id_localidad', 
        'localidad',
        'poblacion',
        'viviendas_habitadas',
        'grado_marginacion',
        'lugar_estatal',
        
    ];
    
    
    
     
    
}
