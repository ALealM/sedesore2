<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class RepresentantesCasillas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'representante_casilla';
    public $timestamps = false;
    protected $fillable = [
        'cve_municipio', 
        'municipio',
        'cve_seccion',
        'cve_tipo_casilla',
        'lista_nominal',
        'distrito_local',
        'distrito_federal',
        'llave_concat',
        'resultado',
        'curp',
        'representante',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'observacion_representante',
        'observacion_resultados',
    ];
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','id_municipio','id')->first();
    }
    
}
