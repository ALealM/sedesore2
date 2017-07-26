<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CaracteristicasEducativas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'caracteristicas_educativas';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',  
        '15_o_mas',
        'sin_escolaridad',
        'total',
        'media_superior',
        'superior',
        'no_especificado',
        'grado_promedio_escolaridad',
    ];
    
     
    
    
    
    
    
}
