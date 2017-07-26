<?php

namespace App\Models\partidos;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Pan extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'padron_pan_def';
    public $timestamps = false;
    protected $fillable = [
        'ap_paterno',
        'ap_materno',
        'nombre',
        'id_municipio',
        'municipio',
        'id_localidad',
        'localidad',
        'curp',
        'calle',
        'colonia',
        'num_ext',
        'num_int',
        'cp',
        'fecha_nacimiento',
        'genero',
        'id_padron',
        'padron',
    ];
    
     
    
    
    
    
    
}
