<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ViviendasHabitadas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'viviendas_particulares_habitadas';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'cantidad'
        
    ];
    
    
    
     
    
}
