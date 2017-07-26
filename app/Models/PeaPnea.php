<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PeaPnea extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pea_pnea';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',  
        'pea',
        'pnea',
    ];
    
     
    
    
    
    
    
}
