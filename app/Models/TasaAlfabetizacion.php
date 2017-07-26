<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class TasaAlfabetizacion extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tasa_alfabetizacion';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'quince_a_veinticuatro',
        'veinticinco_y_mas'    
    ];
    
    
    
     
    
}
