<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CasillasTotales extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'casillas_totales';
    public $timestamps = false;
    protected $fillable = [
        'municipio',
        'sec_t',
        'sec_g',
        'sec_p',
        'sec_m',
        'cas_t',
        'cas_g',
        'cas_p',
        'cas_e',
        'distrito',

    ];
    
    public static function creaRegistro($data) {
            return CasillasTotales::create([
                'municipio' => $data['municipio'],         
                'sec_t' => $data['sec_t'],                 
                'sec_g' => $data['sec_g'],                 
                'sec_p' => $data['sec_p'],                 
                'sec_m' => $data['sec_m'],                 
                'cas_t' => $data['cas_t'],                 
                'cas_g' => $data['cas_g'],                 
                'cas_p' => $data['cas_p'],                 
                'cas_e' => $data['cas_e'],                 
                'distrito' => $data['distrito']                
            ]);
    }
    
    
}
