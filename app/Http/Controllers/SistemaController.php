<?php namespace App\Http\Controllers;

/*
 *  Creado por:Cristian de Jesús Martínez Salazar 
 *  Fecha de creacion:   6/09/2015 06:21:02 PM        
 *  Ultima modificacion: 7/11/2015 05:00:00 PM       
 *  Modificado por: Raymundo A. González Grimaldo 
 */

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
//use Carbon\Carbon;
/*
 * Clase donde se pondria todas aquellas funciones generales para el sistema
 */
class SistemaController extends Controller {
    
    public function dameArrEstados(Request $request){
        return Estado::arrSelectEstados($request['id_pais']);
    }
    
    public function dameArrMunicipios(Request $request){
        return Municipio::arrSelectMunicipios($request['id_estado']);
    }
    
    /**
    * Método encargado de mostrar una feche específica con formato
    * @param date $date
    * @return la fecha con el siguiente formato d/m/Y
    */
    static function dateShow($date){
        //Carbon::parse($pedido->fecha_elaboracion)->format('d/m/Y');
        $nDate = \DateTime::createFromFormat('Y-m-d', $date);
        if($nDate)
            return $nDate->format('d/m/Y');
        else 
            "-";
    }
    
    /**
    * Método encargado de mostrar una feche específica con formato
    * @param date $date
    * @return la fecha con el siguiente formato d/m/Y
    */
    static function dateTimeShow($date){
        //Carbon::parse($pedido->fecha_elaboracion)->format('d/m/Y');
        $nDate = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if($nDate)
            return $nDate->format('d/m/Y - H:i:s');
        else
            return "-";
    }
    
    /**
    * Método encargado de mostrar una feche específica con formato
    * @param date $date
    * @return la fecha con el siguiente formato d/m/Y H:i
    */
    static function dateTime($date){
        $nDate = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if($nDate)
            return $nDate->format('d/m/Y - H:i');
        else
            return "-";
    }
    
    /**
    * Método encargado de mostrar una feche específica con formato
    * @param date $date
    * @return la fecha con el siguiente formato d/m/Y
    */
    static function dateShort($date){
        //Carbon::parse($pedido->fecha_elaboracion)->format('d/m/Y');
        $nDate = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $nDate->format('d/m/Y');
    }

   /**
    * Método encargado de tranformar una fecha a formato 
    * adecuado para ser guardado en la base de datos
    * 
    * @param date $date
    * @return fecha con formato Y-m-d
    */
    static function dateSave($date){
        $nDate = \DateTime::createFromFormat('d/m/Y', $date);
        return $nDate->format('Y-m-d');
    }
    
    static function dateTimeSave($date){
        $nDate = \DateTime::createFromFormat('d/m/Y', $date);
        return $nDate->format('Y-m-d');
    }
    
    static function dateLongSave($date){
        $nDate = \DateTime::createFromFormat('Y/m/d H:i', $date);
        return $nDate->format('Y-m-d H:i');
    }
    
    /**
    * Método encargado de tranformar una fecha a formato 
    * adecuado para ser guardado en la base de datos
    * 
    * @param date $date
    * @return fecha con formato Y-m-d
    */
    static function dateTimeToDate($dateTime){
        $nDate = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        return $nDate->format('Y-m-d');
    }

    static function dateTimeToDateShow($dateTime){
        $nDate = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        if($nDate && $dateTime != "0000-00-00 00:00:00" && $dateTime != "0000-00-00")
            return $nDate->format('d/m/Y');
        else
            return "----";
    }
    
    /**
    * Método encargado de devolver la fecha actual del sistema
    * @param bool $hora indica si la fecha contiende hora
    * @return date
    */
    static function fechaActual($hora=false){
       if($hora)
           return date('Y-m-d H:i:s');
       else
           return date('Y-m-d');

    }

    /**
    * Método que da formato de dinero a una catidad especificada 
    * @param type $money
    * @return type
    */
    static function moneyShow($money){          
        /*$locale='en_US';//"es_MX";
        setlocale(LC_MONETARY, 'en_US');
        $money = money_format('%(#10n', $money);*/
        $dinero = number_format($money, 2, '.', ' ');
        return '$ '.$dinero;
    }
    
    /*Ray*/
    static function controlPagAjax(Request $request){
        if(isset($request["tampag"]))
                    $tamPag=$request["tampag"];
        else
            $tamPag=10;

        if(isset($request["order"]))
            $order = $request["order"];
        else
            $order = NULL;

         if(isset($request["filtro"]))
             $filtro = $request["filtro"];
         else
             $filtro = NULL;
         
        if(isset($request["ot"]))
            $ot = $request["ot"];
        else
            $ot = NULL;
         
         return ["tamPag"=>$tamPag,"order"=> $order,"ot"=> $ot,"filtro"=>$filtro];        
    }
    
    static function rutas(){
        $r = Session::get("rutas");
        return $r;
    }
    
    static function acciones(){
         $r = Session::get("rutas")[Route::currentRouteName()];        
         $acciones = null;
        if(isset($r["acciones"]))
             $acciones = $r["acciones"];  
        return $acciones;
           
    }
    
     static function accionesRuta($ruta){
         if( ! isset(Session::get("rutas")[$ruta]))
             return null;
         $r = Session::get("rutas")[$ruta];        
         $acciones = null;
        if(isset($r["acciones"]))
             $acciones = $r["acciones"];  
        return $acciones;
           
    }
    
    static function fabricaSel(Request $request){
         if(isset($request["id_fabrica"]))
            $id_fabrica=$request["id_fabrica"];
        else
            $id_fabrica= 0;
        
        return $id_fabrica;
    }
    
    static function estatusSol(Request $request){
         if(isset($request["estatus"]))
            $estatus=$request["estatus"];
        else
            $estatus= '1,2';
        
        return $estatus;
    }
    
    static function analisisSel(Request $request){
         if(isset($request["id_TA"]))
            $id_TA=$request["id_TA"];
        else
            $id_TA= 0;
        
        return $id_TA;
    }
}