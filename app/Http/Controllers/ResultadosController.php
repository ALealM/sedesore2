<?php

namespace App\Http\Controllers;

use App\Models\Padron;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ResultadosController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function partPolOp( $id) {
        
        if($id==0){
            $query = "select * from padron where (p_func_educacion = 1 or p_func_estatales = 1 or p_func_salud = 1) and (p_prd = 1 or p_pan = 1 or p_mov_ciud = 1 or p_enc_soc = 1 or p_panal = 1 or p_pvem = 1 or p_pri = 1 )";
            $padron = \DB::select( \DB::raw($query) );   
            foreach ($padron as $pad){
                if($pad->p_prd ==1) $pad->partido = 'PRD';
                if($pad->p_pan ==1) $pad->partido = 'PAN';
                if($pad->p_mov_ciud ==1) $pad->partido = 'MOVIMIENTO CIUDADANO';
                if($pad->p_enc_soc ==1) $pad->partido = 'ENCUENTRO SOCIAL';
                if($pad->p_panal ==1) $pad->partido = 'PANAL';
                if($pad->p_pvem ==1) $pad->partido = 'PARTIDO VERDE ECOLOGISTA DE MÉXICO';
                if($pad->p_pri ==1) $pad->partido = 'PARTIDO REVOLUCIONARIO INSTITUCIONAL';
//                dd($pad);
            }
        }
        else{
            $query = "select * from padron where (p_func_educacion = 1 or p_func_estatales = 1 or p_func_salud = 1) and (p_prd = 1 or p_pan = 1 or p_mov_ciud = 1 or p_enc_soc = 1 or p_panal = 1 or p_pvem = 1 or p_pri = 1) and id_municipio = $id";
            $padron = \DB::select( \DB::raw($query) );   
            foreach ($padron as $pad){
                if($pad->p_prd ==1) $pad->partido = 'PRD';
                if($pad->p_pan ==1) $pad->partido = 'PAN';
                if($pad->p_mov_ciud ==1) $pad->partido = 'MOVIMIENTO CIUDADANO';
                if($pad->p_enc_soc ==1) $pad->partido = 'ENCUENTRO SOCIAL';
                if($pad->p_panal ==1) $pad->partido = 'PANAL';
                if($pad->p_pvem ==1) $pad->partido = 'PARTIDO VERDE ECOLOGISTA DE MÉXICO';
                if($pad->p_pri ==1) $pad->partido = 'PARTIDO REVOLUCIONARIO INSTITUCIONAL';
            }
        }
//        dd($padron);

            return view('resultados.index')->with('padron', $padron)->with('id_mun', $id);
    }
    
    

}