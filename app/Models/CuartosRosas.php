<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CuartosRosas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cuartos_rosas';
    public $timestamps = false;
    protected $fillable = [
        'ap_paterno', 
        'ap_materno', 
        'nombre',
        'id_municipio',
        'municipio'
    ];
    
    
    public function programa(){
        return $this->belongsTo('App\Models\Programas','programa','id')->first();
    }
    
}