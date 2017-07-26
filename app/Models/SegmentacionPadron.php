<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SegmentacionPadron extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'segmentacion_padron';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio', 
        'id_rango',
        'grupos_quinquenales',
        'total',
        'hombres',
        'mujeres',
    ];
    
    public static function creaRegistro($data) {
            return SegmentacionPadron::create([
                'id_municipio' => $data['id_municipio'],         
                'id_rango' => $data['id_rango'],                 
                'grupos_quinquenales' => $data['grupos_quinquenales'],                 
                'total' => $data['total'],      
                'hombres' => $data['hombres'],  
                'mujeres' => $data['mujeres'], 
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= SegmentacionPadron::where('id',$data['id'])->first();
        $registro->id_municipio=$data['id_municipio'];
        $registro->id_rango=$data['id_rango'];
        $registro->grupos_quinquenales=$data['grupos_quinquenales'];
        $registro->total=$data['total'];
        $registro->hombres=$data['hombres'];
        $registro->mujeres=$data['mujeres'];
        $registro->save();
        return true;
    }
    
    public function municipio() {
        return $this->belongsTo('App\Models\Municipio', 'id_municipio', 'id')->first();
    }
    
}
