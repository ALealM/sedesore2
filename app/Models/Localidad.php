<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Localidad extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'localidades';
    public $timestamps = false;
    protected $fillable = [
        'localidad', 
        'clave',
        'id_municipio', 
        'poblacion', 
        'agrupador'
    ];
    
    public function agrupador(){
        
        return $this->hasOne('App\Models\TamLocalidad','id','agrupador')->first();

    }
    
}
