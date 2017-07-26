<?php

namespace App\Http\Controllers;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Redirect;
use File;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    
    public function index($id)
    {
        $p=1;
        while($p<=58){
            $pobLoc[$p] = Localidad::where('id_municipio',$p)->sum('poblacion');
            $p++;
        }
        dd($pobLoc);
        $municipio = Municipio::where('id',$id)->first();
//        $localidades = Localidad::where('id_municipio',$municipio->id)->get();
        return view('index')->with('municipio',$municipio)->with('pobLoc',$pobLoc);
    }
   
    
   
}
