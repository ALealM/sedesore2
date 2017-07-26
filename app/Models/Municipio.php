<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Municipio extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'municipios';
    public $timestamps = false;
    protected $fillable = [
        'municipio', 
        'clave',
        'id_zona',
        'id_microregiones',
        'localizacion',
        'extension',
        'orografia',
        'hidrografia',
        'clima',
        'edad_mediana',
        'edad_mediana_hombres',
        'edad_mediana_mujeres',
        'relacion_hombre_mujer',
        'promedio_hijos_nacidos_vivos',
        'defunciones',
        'matrimonios',
        'divorcios',
        'hablante_indigena',
        'presidencia',
        'partido_politico',
        'nombre_diputado',
        'distrito_diputados',
    ];
    
    
    public function totales($dist) {
            // return $this->hasMany('App\Models\Casillas','clave_mpio','id')->where('distrito',$dist)->get();
            return $this->hasOne('App\Models\CasillasTotales','municipio','id')->where('distrito',$dist)->first();
            // $total= Casillas::where('clave_mpio',$this->id)->count();
            // return $total;
    }
    public function totalCasillas($dist) {
            // return $this->hasMany('App\Models\Casillas','clave_mpio','id')->where('distrito',$dist)->get();
            return $this->hasMany('App\Models\Casillas','clave_mpio','id')->where('dl2015',$dist)->orderby('seccion')->get();
            // $total= Casillas::where('clave_mpio',$this->id)->count();
            // return $total;
    }
    
    public function totalrepresentantes($dist) {
            $casillas=$this->hasMany('App\Models\Casillas','clave_mpio','id')->where('dl2015',$dist)->get();

            $cont=0;
            foreach ($casillas as $casilla) {
                $cont+=$casilla->totalRepresentantes();
            }
            return $cont;
    }
    
    public function programas() {
            return $this->hasMany('App\Models\MunicipioPrograma','id_municipio','id')->where('descripcion','Programa')->get();
    }
    
    
    public function totalSeccionesG($dist) {
        $total=0;
        
        $secciones = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
        foreach ($secciones as $sec){
            // $representantes = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->pluck('representante');
            $secc = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->count();
            $secg = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->where('resultado','GANADO')->count();
            if($secc==$secg)
                $total+=1;
        }
            return $total;
            
    }
    
    public function representantegano($dist) {
        $secciones = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
        foreach ($secciones as $sec){
            $secc = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->where('seccion',$sec)->count();
            $representante = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->where('seccion',$sec)->where('resultado','Gano')->pluck('representante');
            //dd($representante);
        }
        
            return $representante;
            
    }
    
    
    
    public function totalSeccionesE($dist) {
        $total=0;
        $secciones = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
        foreach ($secciones as $sec){
            // $representantes = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->pluck('representante');
            $secc = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->count();
            $sece = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->where('resultado','EMPATADO')->count();
            if($secc==$sece)
                $total+=1;
        }
            return $total;
            
    }
    // public function totalSeccionesI($dist) {
    //     $total=0;
    //     $secciones = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
    //     foreach ($secciones as $sec){
    //         $representantes = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->where('seccion',$sec)->pluck('representante');
    //         $secc = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->where('seccion',$sec)->count();
    //         $seci = Casillas::where('distrito', $dist)->where('id_municipio', $this->id)->where('seccion',$sec)->where('resultado','Ilegible')->count();
    //         if($secc==$seci)
    //             $total+=1;
    //     }
    //         return $total;
            
    // }
    
    public function totalSeccionesP($dist) {
        $total=0;
        $secciones = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
        foreach ($secciones as $sec){
            // $representantes = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->pluck('representante');
            //dd($representantes);
            $secc = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->count();
            $secp = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->where('seccion',$sec)->where('resultado','PERDIDO')->count();
            if($secc==$secp)
                $total+=1;
        }
            return $total;
            
    }
    
    public function totalSeccionesM($dist) {
        $total=0;
        $secciones = Casillas::where('dl2015', $dist)->where('clave_mpio', $this->id)->select('seccion')->distinct('seccion')->pluck('seccion');
        foreach ($secciones as $sec){
            $secc = Casillas::where('dl2015', $dist)->select('seccion','resultado')->where('clave_mpio', $this->id)->where('seccion',$sec)->groupby('seccion','resultado')->get();
            if(count($secc)>1)
                $total+=1;
        }
            return $total;
            
    }
    
    
    
    
    
}
