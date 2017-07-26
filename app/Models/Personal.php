<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Personal extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personal';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'curp',
        'fb',
        'email',
        'telefono',
        'programa',
        'responsable',
        'seccion',
        'casilla',
        'id_municipio',
        'id_localidad',
        'domicilio',
        'fotografia',
        'cve_elector',
        'id_padron',
        'fecha_nacimiento'
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
            return Personal::create([
                'nombre' => $data['nombre'],
                'ap_paterno' => $data['ap_paterno'],
                'ap_materno' => $data['ap_materno'],
                'curp' => $data['curp'],
                'fb' => $data['fb'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'programa' => $data['programa'],
                'responsable' => $data['responsable'],
                'seccion' => $data['seccion'],
                'casilla' => $data['casilla'],
                'id_municipio' => $data['id_municipio'],
                'id_localidad' => $data['id_localidad'],            
                'domicilio' => $data['domicilio'],            
                'fotografia' => $data['fotografia'],    
                'cve_elector' => $data['cve_elector'],
                'id_padron' => $data['id_padron'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
            ]);
    }
    
    
    public static function editarRegistro($data) {
            $registro=Personal::where('id',$data['id'])->first();
            $registro->nombre=$data['nombre'];
            $registro->apellido_paterno=$data['apellido_paterno'];
            $registro->apellido_materno=$data['apellido_materno'];
            $registro->id_categoria=$data['id_categoria'];
            $registro->id_institucion=$data['id_institucion'];
            $registro->id_municipio=$data['id_municipio'];
            $registro->password=  bcrypt($data['password']);
            $registro->email=$data['email'];
            $registro->direccion_oficina=$data['direccion_oficina'];
            $registro->extension=$data['extension'];
            $registro->fotografia=$data['fotografia'];
            $registro->horario=$data['horario'];
            $registro->telefono=$data['telefono'];
            $registro->jefe_inmediato=$data['jefe_inmediato'];
            $registro->cargo=$data['cargo'];
            $registro->save();
            return true;
    }
}
