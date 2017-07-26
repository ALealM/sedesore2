<?php

namespace App\Models\partidos;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Partidos extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'partidos';
    public $timestamps = false;
    protected $fillable = [
        'partido',
        'descripcion',
        'campo',
        'color',
        'colores',
    ];
    
     
    
    
    
    
    
}
