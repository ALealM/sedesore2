<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CoordinadoresLocales extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'coordinadores_locales';
    public $timestamps = false;
    protected $fillable = [
        'distrito',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'nombre_completo',
    ];
     
    
}
