<?php

namespace App\Http\Controllers;
use App\Models\PersonalPoderEntidad;
use App\Models\DesglocePoderEntidad;
use App\Models\PersonalTipoEmpleado;
use Illuminate\Http\Request;
use Redirect;
use File;
use Illuminate\Support\Facades\Session;

class ResumenPlantillasController extends Controller
{
    
    public function index()
    {
        $personalPoder = PersonalPoderEntidad::all();
        foreach ($personalPoder as $personalP){
           $personalP->rowP = PersonalPoderEntidad::where('poder',$personalP->poder)->count();
           $personalP->rowT = PersonalPoderEntidad::where('tipo',$personalP->tipo)->count();
       }
        $personalPSum = PersonalPoderEntidad::sum('numero');
        $personalTipo = PersonalTipoEmpleado::all();
        $personalTOrd = PersonalTipoEmpleado::all()->sortByDesc('empleados');
        $personalTSum = PersonalTipoEmpleado::sum('empleados');
        $personal = DesglocePoderEntidad::all();
        return view('resumen_plantillas/index')
        ->with(['personalPoder'=>$personalPoder,'personalTipo'=>$personalTipo,'id_mun'=> 0,'personalPSum'=>$personalPSum,'personalTSum'=>$personalTSum,'personalTOrd'=>$personalTOrd])->with('personal', $personal);
    }
     
   
}
