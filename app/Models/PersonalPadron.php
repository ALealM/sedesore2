<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class PersonalPadron extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personalPadron';
    public $timestamps = false;
    protected $fillable = [
        'id_padron',
        'fb',
        'email',
        'telefono',
        'programa',
        'responsable',
        'id_municipio',
        'id_usuario',
        'fecha_alta',
        'carta',
        'llamada',
        'contacto',
        'asistencia',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return PersonalPadron::create([
                'id_padron' => $data['id_padron'],
                'fb' => $data['fb'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'programa' => $data['programa'],
                'responsable' => $data['responsable'],
                'id_municipio' => $data['id_municipio'],
                'id_usuario' => $data['id_usuario'],
                'fecha_alta' => $data['fecha_alta'],
            ]);
    }
    
    
    public static function editarRegistro($data) {
            $registro=PersonalPadron::where('id',$data['id'])->first();
            $registro->carta=$data['carta'];
            $registro->llamada=$data['llamada'];
            $registro->contacto=$data['contacto'];
            $registro->asistencia=$data['asistencia'];
            $registro->save();
            return true;
    }
}
