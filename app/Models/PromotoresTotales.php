<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PromotoresTotales extends Model 
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'promotoresTotales';
    public $timestamps = false;
    protected $fillable = [
        'programa',
        'total',
        'municipio',
    ];
    
     public static function creaRegistro($data) {
            return PromotoresTotales::create([       
                'programa' => $data['programa'],                 
                'total' => $data['total'],                 
                'municipio' => $data['municipio'],                 
            ]);
    }
    
    
    public function programa(){
        return $this->belongsTo('App\Models\Programas','programa','id')->first();
    }
    
}
