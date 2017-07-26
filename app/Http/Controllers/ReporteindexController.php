<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Reporte;
use App\User;
use Illuminate\Support\Facades\Session;


class ReporteindexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
    $reportes = Reporte::where('id','<',2000)->get();
        return view('index')->with('reportes',$reportes);
    
    }
}

