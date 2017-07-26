<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PersonalTipoEmpleado extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personal_tipo_empleados';
    public $timestamps = false;
    protected $fillable = [
        'tipo', 
        'empleados',
    ];
    
    
    
}
