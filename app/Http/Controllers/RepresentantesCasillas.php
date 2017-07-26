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
    protected $table = 'representantes';
    public $timestamps = false;
    protected $fillable = [
        // 'cve_municipio', 
        // 'municipio',
        // 'cve_seccion',
        // 'cve_tipo_casilla',
        // 'lista_nominal',
        // 'distrito_local',
        // 'distrito_federal',
        // 'llave_concat',
        // 'resultado',
        // 'curp',
        // 'representante',
        // 'nombre',
        // 'ap_paterno',
        // 'ap_materno',
        // 'observacion_representante',
        // 'observacion_resultados',
            'nombre',
            'ap_pat',
            'ap_mat',
            'tipo',
            'rcasilla',
            'rgeneral',
            'seccion',
            'casilla',
            'cve_municipio',
            'origen',
            'identificador_casilla',


    ];
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','id_municipio','id')->first();
    }

    public function getNombre()
    {
        $cad=$this->nombre." ".$this->ap_pat." ".$this->ap_mat;
        return $cad;
    }
    
    public function nombre(){
        return $this->attributes['nombre']." ".$this->attributes['ap_pat']." ".$this->attributes['ap_mat'];
    }
    
}
