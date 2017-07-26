<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class TamLocalidad extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tamano_localidad';
    public $timestamps = false;
    protected $fillable = [
        'clasificador', 
        'minimo', 
        'maximo',
        'descripcion'
    ];

    public function localidades($idM) {
        $query = "SELECT * from localidades where agrupador = ".$this->id." and id_municipio = $idM";
        return $results = \DB::select(\DB::raw($query));
            
    }

}
