<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Conafe;
use App\Models\Localidad;
use App\Models\Programas;
use App\Models\ProgramaBeneficiario;
use App\Models\Beneficiarios;
use App\Models\Marginacion;
use App\Models\TamLocalidad;
use App\Models\ComposicionEdadSexo;
use App\Models\ViviendasHabitadas;
use App\Models\Demografia;
use App\Models\Distritos;
use App\Models\Casillas;
use App\Models\RepresentantesCasillas;
use App\Models\MunicipioPrograma;
use App\Models\Promovidos;
use App\Models\PersonalPoderEntidad;
use App\Models\BeneficiariosProgTot;
use App\Models\Padron;
use App\Models\partidos\Pan;
use App\Models\partidos\Panal;
use App\Models\partidos\Pvem;
use App\Models\partidos\Prd;
use App\Models\partidos\EncSoc;
use App\Models\partidos\MovCiud;
use App\Models\partidos\Pri;
use App\Models\partidos\PartidosTotales;
use App\Models\partidos\Partidos;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Reporte;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SistemaController;
use Illuminate\Http\Request;
use Redirect;
use File;
use Schema;

class TotalesController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function totales(Request $request, $id) {
        $municipios = Municipio::pluck('municipio','id');
        $totalpadron = Padron::where('id_municipio',$id)->count();
        $totalmujeres = Padron::where('id_municipio',$id)->where('genero','M')->count();
        $totalhombres = Padron::where('id_municipio',$id)->where('genero','H')->count();
        $progTotal=0;
        if ($id == 0) {
            $programasT = MunicipioPrograma::where('id_municipio',0)->where('descripcion','Programa')->get();
            foreach ($programasT as $progT) {
                $progT->total = $progT->total_beneficiarios;
            }
            $munic='';
            $agrupadores = [];
            $programas = MunicipioPrograma::where('id_municipio',0)->where('descripcion','Programa')->get();
            foreach ($programas as $prog) {
                $prog->total = $prog->total_beneficiarios;
                $prog->programa = Programas::find($prog->id_programa);
                $progTotal+= $prog->total_beneficiarios;
            }
            
            $partidos[0] = Pan::count();
            $partidos[1] = Prd::count();
            $partidos[2] = Pvem::count();
            $partidos[3] = Panal::count();
            $partidos[4] = MovCiud::count();
            $partidos[5] = EncSoc::count();
            $partidos[6] = Pri::count();
//            $partidos[0] = Pan::where('padron',1)->count();
//            $partidos[1] = Panal::where('padron',1)->count();
//            $partidos[2] = Prd::where('padron',1)->count();
//            $partidos[3] = Pvem::where('padron',1)->count();
//            $partidos[4] = EncSoc::where('padron',1)->count();
//            $partidos[5] = MovCiud::where('padron',1)->count();
//            dd($partidos);
        } else {
            $munic= Municipio::where('id',$id)->first();
            $locAgrup= Localidad::where('id_municipio',$id)->select('agrupador')->pluck('agrupador');
            $agrupadores = TamLocalidad::whereIn('id',$locAgrup)->orderBy('id','desc')->get();
            $programas = $munic->programas()->where('total_beneficiarios','>',0);
            foreach ($programas as $prog) {
                $prog->total = $prog->total_beneficiarios;
                $prog->programa = Programas::find($prog->id_programa);
                $progTotal+=$prog->total_beneficiarios;
            }
            $programasT = $munic->programas()->where('total_beneficiarios','>',0);
            foreach ($programasT as $progT) {
                $progT->total = $progT->total_beneficiarios;
            }
            $partidos[0] = Pan::where('id_municipio',$id)->count();
            $partidos[1] = Prd::where('id_municipio',$id)->count();
            $partidos[2] = Pvem::where('id_municipio',$id)->count();
            $partidos[3] = Panal::where('id_municipio',$id)->count();
            $partidos[4] = MovCiud::where('id_municipio',$id)->count();
            $partidos[5] = EncSoc::where('id_municipio',$id)->count();
            $partidos[6] = Pri::where('id_municipio',$id)->count();
        }
        
        
//        foreach ($programasPart as $programasP){
//            
//        }
//        dd($programasPart);
        $partidosT[0] = Pan::count();
        $partidosT[1] = Prd::count();
        $partidosT[2] = Pvem::count();
        $partidosT[3] = Panal::count();
        $partidosT[4] = MovCiud::count();
        $partidosT[5] = EncSoc::count();
        $partidosT[6] = Pri::count();
//        $partidoNombre = $programasPart->where('partido',1)->first();
//        dd($partidoNombre->partido());
        $padronT = Padron::count();
        
        return view('totales.totales')->with('programas', $programas)->with('id_mun', $id)->with('partidos', $partidos)->with('partidosT', $partidosT)
                ->with('padronT', $padronT)->with('mun_id', $id)->with('municipios', $municipios)->with('totalpadron', $totalpadron)->with('totalmujeres',$totalmujeres)->with('totalhombres',$totalhombres);
    }
    
    public function totalesSumas() {
        
        $munProg = MunicipioPrograma::where('id_municipio','>',0)->get();
        foreach ($munProg as $munP){
            if($munP->id_programa != 11 && $munP->id_programa != 15){
                $data['id'] = $munP->id;
                $data['total_beneficiarios'] = Padron::where('id_municipio',$munP->id_municipio)->where($munP->programa()->campo,1)->count();
                MunicipioPrograma::editaRegistro($data);
            }
        }               
        $munProgT = MunicipioPrograma::where('id_municipio',0)->get();
//        dd($munProgT);
        foreach ($munProgT as $munPT){
            if($munPT->id_programa != 11 && $munPT->id_programa != 15){
                $data['id'] = $munPT->id;
                $data['total_beneficiarios'] = Padron::where($munPT->programa()->campo,1)->count();
                MunicipioPrograma::editaRegistro($data);
            }
        }               
    }
    
    public function totalesBeneficios() {
        $mun=1;
        while($mun<=58){
            $query = "SELECT total, count(*) suma
                        FROM (select coalesce(p_prospera,0)+coalesce(p_65,0)+coalesce(p_empleo_sedesol,0)+coalesce(p_conafe,0)+coalesce(p_ieea,0)
                        +coalesce(p_uniformes,0)+coalesce(p_comit_salud,0)+coalesce(p_pesa,0)+coalesce(p_apoyo_empleo,0)+coalesce(p_desayunos,0)
                        total, id_municipio
                        from padron where id_municipio = $mun) totales
                        GROUP BY total
                        HAVING COUNT(*) > 1";
            $results = \DB::select( \DB::raw($query) );   
            foreach($results as $res){
                $data['municipio'] = $mun;
                $data['cantidad'] = $res->total;
                $data['total'] = $res->suma;
                BeneficiariosProgTot::creaRegistro($data);
            }
            $mun++;
        }
        $query = "SELECT total, count(*) suma
                        FROM (select coalesce(p_prospera,0)+coalesce(p_65,0)+coalesce(p_empleo_sedesol,0)+coalesce(p_conafe,0)+coalesce(p_ieea,0)
                        +coalesce(p_uniformes,0)+coalesce(p_comit_salud,0)+coalesce(p_pesa,0)+coalesce(p_apoyo_empleo,0)+coalesce(p_desayunos,0)
                        total, id_municipio
                        from padron) totales
                        GROUP BY total
                        HAVING COUNT(*) > 1";
            $results = \DB::select( \DB::raw($query) );   
            foreach($results as $res){
                $data['municipio'] = 0;
                $data['cantidad'] = $res->total;
                $data['total'] = $res->suma;
                BeneficiariosProgTot::creaRegistro($data);
            }
    }
    
    public function totalesPartidos() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 17, 18, 19];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $partidos = Partidos::all();
        $i=0;
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                foreach ($partidos as $partido) {
                    $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->where($partido->campo, 1)->count();
                    $data[$i]['partido'] = $partido->id;
                    $data[$i]['programa'] = $programa->id;
                    $data[$i]['total'] = $total;
                    $data[$i]['municipio'] = $municipio->id;
                    PartidosTotales::creaRegistro($data[$i]);
                    $i++;
                }
            }
        }
        $i=0;
        foreach ($programas as $programa) {
            foreach ($partidos as $partido) {
                $total = Padron::where($programa->campo, 1)->where($partido->campo, 1)->count();
                $data[$i]['partido'] = $partido->id;
                $data[$i]['programa'] = $programa->id;
                $data[$i]['total'] = $total;
                $data[$i]['municipio'] = 0;
                PartidosTotales::creaRegistro($data[$i]);
                $i++;
            }
        }
    }

}