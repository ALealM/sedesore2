<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class FuncIngresos extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'func_ingresos';
    public $timestamps = false;
    
    
    
    public function partido(){
        return $this->belongsTo('App\Models\partidos\Partidos','partido','id')->first();
    }
    
     
    
}
