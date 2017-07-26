<?php

namespace App\Models\partidos;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PartidosTotales extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'partidosTotales';
    public $timestamps = false;
    protected $fillable = [
        'partido',
        'programa',
        'total',
        'municipio',
    ];
    
     public static function creaRegistro($data) {
            return PartidosTotales::create([
                'partido' => $data['partido'],         
                'programa' => $data['programa'],                 
                'total' => $data['total'],                 
                'municipio' => $data['municipio'],                 
            ]);
    }
    
    
    public function programa(){
        return $this->belongsTo('App\Models\Programas','programa','id')->first();
    }
    
//    public function partido(){
//        return $this->belongsTo('App\Models\partidos\Partidos','partido','id')->first();
//    }
    
    public function partido()
    {
        $aux= Partidos::where('id', $this->partido)->first();
        return $aux;
    }
    
    
}
