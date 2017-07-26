<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Promovidos extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'promovidos_nueva';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'logo',
    ];
    
    
}