<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Prospera extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'prospera';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'ap_paterno',
        'ap_materno',
        'fecha_nacimiento',
        'genero',
        'curp',
        'rfc',
        'municipio',
        'id_municipio',
        'localidad',
        'id_localidad',
        'calle',
        'num_ext',
        'num_int',
        'colonia',
        'cp',
        'origen',
        'descripcion',
        'adulto_mayor',
        'educativo',
        'alimentario',
        'monto_bimestral',
    ];
    
    
    
}
