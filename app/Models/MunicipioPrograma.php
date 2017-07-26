<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class MunicipioPrograma extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'municipio_programa';
    public $timestamps = false;
    protected $fillable = [
        'total_beneficiarios', 
       'total_general',
       'id_programa',
       'id_municipio',
       'descripcion',
    ];

    
     
    public function programa(){
        return $this->belongsTo('App\Models\Programas','id_programa','id')->first();
    }
    
    
    public static function editaRegistro($data) {
        $registro= MunicipioPrograma::where('id',$data['id'])->first();
        $registro->total_beneficiarios = $data['total_beneficiarios'];
        $registro->save();
        return true;
    }
    
    
    public static function creaRegistro($data) {
           return MunicipioPrograma::create([
               'descripcion' => $data['descripcion'],         
               'id_programa' => $data['id_programa'],         
               'total_general' => $data['total_general'],         
               'id_municipio' => $data['id_municipio'],                 
               'total_beneficiarios' => $data['total_beneficiarios']                
           ]);
   }

    
}
