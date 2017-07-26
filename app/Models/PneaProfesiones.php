<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PneaProfesiones extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pnea_profesiones';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',  
        'funcionarios',
        'agropecuarios',
        'industria',
        'comerciantes',
        'no_especifico',
    ];
    
     
    
    
    
    
    
}
