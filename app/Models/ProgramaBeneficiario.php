<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ProgramaBeneficiario extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'programa_beneficiario';
    public $timestamps = false;
    protected $fillable = [
        'id_beneficiario', 
        'id_programa', 
    ];
    
     public function totalbenef($id){
                return $this->hasMany('App\Models\Beneficiarios','id','id_beneficiario')->where('id',$id)->get();

    }
}
