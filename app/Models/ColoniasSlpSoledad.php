<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ColoniasSlpSoledad extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'colonias_slp_soledad';
    public $timestamps = false;
    
    public function nivel(){
        return $this->belongsTo('App\Models\CatalogoNvlSocioeconomico','nivel_socioeconomico','id')->first();
    }
    
}
