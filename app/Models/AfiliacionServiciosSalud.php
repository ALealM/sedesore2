<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class AfiliacionServiciosSalud extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'afiliacion_servicios_salud';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio', 
        'poblacion_total', 
        'pob_afiliada_porcentaje',
        'pob_no_afiliada',
        'no_especifica',
        'imss',
        'issste',
        'pemex_defensa_marina',
        'seguro_popular',
        'institucion',
        'otra_institucion'
        
    ];
    
    
    
     
    
}
