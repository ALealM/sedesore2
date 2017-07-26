<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class InversionMunicipio extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'inversion_municipio';
    public $timestamps = false;
    protected $fillable = [
        'id_municipio',
        'id_programa',
        'programa',
        'monto',

    ];
    
    
}
