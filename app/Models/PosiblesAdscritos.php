<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PosiblesAdscritos extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'posiblesAdscritos';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'total',
        'hombres',
        'mujeres',
    ];
    
    
    public static function creaRegistro($data) {
            return PosiblesAdscritos::create([       
                'id_municipio' => $data['id_municipio'],                 
                'total' => $data['total'],                 
                'hombres' => $data['hombres'],                 
                'mujeres' => $data['mujeres'],                 
            ]);
    }
    
    
}
