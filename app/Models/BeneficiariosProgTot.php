<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BeneficiariosProgTot extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'beneficiarios_programas_totales';
    public $timestamps = false;
    protected $fillable = [
        'municipio', 
        'cantidad', 
        'total',
    ];
    
    public static function creaRegistro($data) {
            return BeneficiariosProgTot::create([
                'municipio' => $data['municipio'],         
                'cantidad' => $data['cantidad'],                 
                'total' => $data['total']                
            ]);
    }
    
}
