<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ResultadoElectoral extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'resultado_electoral';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'seccion',
        'lista_nominal',
        'pri',
        'votacion_nula',
        'votacion_valida',
        'votacion_emitida',
        'anio',
        'llave',
    ];
    
     
    public function benef($secc){
//                return $this->hasMany('App\Models\Padron','id_seccion',$secc)->get();
                $benef = Padron::where('id_seccion',$secc)->orderByRaw("p_promovidos DESC,total DESC")->get();
                return $benef;

    }
    
    public function seccion($a,$s){
        $seccion = SeccionesResultados::where('seccion',$s)->where('anio',$a)->first();
        if(count($seccion)>0)
            return $seccion->resultado;
        else
            return 'Indefinido';
    }
    
    public function ganador($a,$s){
        $seccion = SeccionesResultados::where('seccion',$s)->where('anio',$a)->first();
        if(count($seccion)>0)
            return $seccion->ganador.": ".number_format($seccion->votacion);
        else
            return 'Indefinido';
    }
    
    public function colonias(){
        $colonias = ColoniasSlpSoledad::where('seccion', $this->seccion)->get();
            return $colonias;
    }
    
    
    
}
