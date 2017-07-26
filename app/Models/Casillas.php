<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Casillas extends Model
{   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'casillas';
    public $timestamps = false;
    protected $fillable = [
/*       'folio',  
        'municipio',
        'id_municipio',
        'distrito',
        'seccion',
        'tipo_casilla',
        'resultado',
        'representante',*/
        'clave_mpio',
        'nombre_mpio',
        'seccion',
        'cve_tipo_casilla',
        'ln2015',
        'dl2015',
        'df2015',
        'dl2018',
        'seccion_casilla',
        'resultado',
        'identificador',

    ];
    
     
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio','id_municipio','id')->first();
    }
    
    public function representantes()
    {
        return $this->hasMany('App\Models\RepresentantesCasillas','identificador_casilla','identificador')->get();
    }

    public function r_propietario1()
    {
        $aux= RepresentantesCasillas::where('identificador_casilla', $this->identificador)->where('tipo','propietario1')->first();
        return $aux;
    }

    public function r_propietario2()
    {
        $aux= RepresentantesCasillas::where('identificador_casilla', $this->identificador)->where('tipo','propietario2')->first();
        return $aux;
    }

    public function r_suplente1()
    {
        $aux= RepresentantesCasillas::where('identificador_casilla', $this->identificador)->where('tipo','suplente1')->first();
        return $aux;
    }

    public function r_suplente2()
    {
        $aux= RepresentantesCasillas::where('identificador_casilla', $this->identificador)->where('tipo','suplente2')->first();
        return $aux;
    }

    public function totalRepresentantes()
    {
            $sec = RepresentantesCasillas::where('identificador_casilla', $this->identificador)->count();
            return $sec;
    }
    

    
    
}
