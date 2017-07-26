<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Distritos extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'distritos';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'distrito_electoral_local_15',
        'distrito_electoral_local_18',
        'distrito_electoral_federal_15',
        'distrito_electoral_federal_18',
        'secciones_15',
        'secciones_18'      
    ];
    
    
    
     
    
}
