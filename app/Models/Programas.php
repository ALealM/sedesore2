<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Programas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'programas';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'logo',
    ];
    
    public function beneficiario(){
                return $this->hasMany('App\Models\ProgramaBeneficiarios','id_programa','id')->get();

    }
    
    
    
    public function totalbeneficiarios() {
            return $this->hasMany('App\Models\ProgramaBeneficiario','id_programa','id')->count();
            
    }
    
    public function totalbeneficiariosmun($idM,$idP) {
        $query = "SELECT count(*) total from beneficiarios ben inner join programa_beneficiario pb on pb.id_beneficiario = ben.id "
                . "inner join programas pr on pr.id = pb.id_programa where ben.id_municipio = $idM and pr.id = $idP";
        $results = \DB::select(\DB::raw($query));
            return $results[0]->total;
            
    }
    
    public function totalbeneficiariosloc($idL,$idP) {
        $query = "SELECT count(*) total from beneficiarios ben inner join programa_beneficiario pb on pb.id_beneficiario = ben.id "
                . "inner join programas pr on pr.id = pb.id_programa where ben.id_localidad = $idL and pr.id = $idP";
        $results = \DB::select(\DB::raw($query));
            return $results[0]->total;
            
    }
    
    
    public function totalbenmun(){
                $beneficiarios = Beneficiarios::all();
                $programas = $this->attributes['id'];
                foreach ($beneficiarios as $beneficiario){
                    $programa->tiene =0;
                    $cond = ProgramaBeneficiario::where('id_beneficiario',$ben)
                            ->where('id_programa',$programa->id)->count();
                    if($cond==1){
                        $programa->tiene =1;
                    }
                    
                }
                return $programas;

    }

   
    
    
}
