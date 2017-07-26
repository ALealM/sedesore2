<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PersonalPoderEntidad extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personal_poder_entidad';
    public $timestamps = false;
    protected $fillable = [
        'poder', 
        'tipo', 
        'comentario',
        'numero',
    ];
    
    
    
}
