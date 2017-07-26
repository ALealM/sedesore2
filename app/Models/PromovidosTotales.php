<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PromovidosTotales extends Model 
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'promovidosTotales';
    public $timestamps = false;
    protected $fillable = [
        'programa',
        'total',
        'municipio',
    ];
    
     public static function creaRegistro($data) {
            return PromovidosTotales::create([       
                'programa' => $data['programa'],                 
                'total' => $data['total'],                 
                'municipio' => $data['municipio'],                 
            ]);
    }
    
    
    public function programa(){
        return $this->belongsTo('App\Models\Programas','programa','id')->first();
    }
    
}
