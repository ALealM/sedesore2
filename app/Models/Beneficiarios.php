<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Beneficiarios extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'padron';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno',
        'fecha_nac',
        'curp',
        'municipio',
        'localidad',
        'calle',
        'num_ext',
        'num_int',
        'colonia',
        'codigo_postal',
        
    ];
    
     public function nombre(){
        return $this->attributes['nombre']." ".$this->attributes['ap_paterno']." ".$this->attributes['ap_materno'];
    }
    
    public function programa(){
                return $this->hasMany('App\Models\ProgramaBeneficiario','id_beneficiario','id')->get();

    }
    
    public function total_programas(){
                return $this->hasMany('App\Models\ProgramaBeneficiario','id_beneficiario','id')->count();

    }
    
    public function programas($ps){
                $ben = $this->attributes['id'];
                $programas = Programas::whereIn('id',$ps)->orderBy('id')->get();
                foreach ($programas as $programa){
                    $programa->tiene ='<span><i class="glyphicon glyphicon-remove"></i></span>';
                    $cond = ProgramaBeneficiario::where('id_beneficiario',$ben)
                            ->where('id_programa',$programa->id)->count();
                    if($cond==1){
                        $programa->tiene ='<span><i class="glyphicon glyphicon-ok"></i></span>';
                    }
                    
                }
                return $programas;

    }
    
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','id_municipio','id')->first();
    }
    
    public function localidad(){
        $loc = Localidad::where('clave',$this->attributes['id_localidad'])->where('id_municipio',$this->attributes['id_municipio'])->first();
        if(count($loc)==0)
            $res = '';
        else
            $res = $loc->localidad;
        return $res;
    }
    
    
}
