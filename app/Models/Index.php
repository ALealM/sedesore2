<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Index extends Model
{   

    public function localidad(){
       return $this->belongsTo('App\Models\Localidad','ubicacion_micro','id')->first();
   }
   
    
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','ubicacion_macro','id')->first();
    }
    
    
}