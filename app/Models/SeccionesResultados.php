<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SeccionesResultados extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'secciones_resultados';
    public $timestamps = false;
    protected $fillable = [
        'seccion',
        'resultado',
        'ganador',
        'anio',
    ];
    
    
    
    
    
}
