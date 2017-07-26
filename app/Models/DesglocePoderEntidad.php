<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class DesglocePoderEntidad extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'desglose_dependencia_entidad';
    public $timestamps = false;
    protected $fillable = [
        'poder', 
        'tipo',
        'dependencia',
        'no_empleados',
    ];
    
    
    
}
