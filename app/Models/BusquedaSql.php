<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class BusquedaSql extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'busquedaSQL';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'id_municipio',
        'clave_electoral',
        'id_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function nombre(){
        return $this->attributes['nombre']." ".$this->attributes['apellido_paterno']." ".$this->attributes['apellido_materno'];
    }
    
    public static function creaRegistro($data) {
            return BusquedaSql::create([
                'nombre' => $data['nombre'],
                'ap_paterno' => $data['ap_paterno'],
                'ap_materno' => $data['ap_materno'],
                'id_municipio' => $data['id_municipio'],
                'clave_electoral' => $data['clave_electoral'],
                'id_usuario' => $data['id_usuario'],
            ]);
    }
    
    
    public static function editarRegistro($data) {
            $registro=BusquedaSql::where('id',$data['id'])->first();
            $registro->nombre=$data['nombre'];
            $registro->ap_paterno=$data['ap_paterno'];
            $registro->ap_materno=$data['ap_materno'];
            $registro->id_municipio=$data['id_municipio'];
            $registro->clave_electoral=$data['clave_electoral'];
            $registro->save();
            return true;
    }
}
