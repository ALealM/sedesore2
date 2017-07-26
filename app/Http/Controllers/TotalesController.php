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
use App\Models\PromovidosTotales;
use App\Models\PromotoresTotales;
use App\Models\PersonalPoderEntidad;
use App\Models\BeneficiariosProgTot;
use App\Models\Padron;
use App\Models\partidos\Pri;
use App\Models\partidos\Pan;
use App\Models\partidos\Panal;
use App\Models\partidos\Pvem;
use App\Models\partidos\Prd;
use App\Models\partidos\EncSoc;
use App\Models\partidos\MovCiud;
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
        $personalPoder = PersonalPoderEntidad::all();
        foreach ($personalPoder as $personalP){
           $personalP->rowP = PersonalPoderEntidad::where('poder',$personalP->poder)->count();
           $personalP->rowT = PersonalPoderEntidad::where('tipo',$personalP->tipo)->count();
       }
        $personalPSum = PersonalPoderEntidad::sum('numero');
        $municipios = Municipio::pluck('municipio', 'id');
        $totalpadron = Padron::where('id_municipio', $id)->count();
        $totalmujeres = Padron::where('id_municipio', $id)->where('genero', 'M')->count();
        $totalhombres = Padron::where('id_municipio', $id)->where('genero', 'H')->count();
        $progTotal = 0;
        if ($id == 0) {
            $programasT = MunicipioPrograma::where('id_municipio', 0)->where('descripcion', 'Programa')->get();
            foreach ($programasT as $progT) {
                $progT->total = $progT->total_beneficiarios;
            }
            $munic = '';
            $agrupadores = [];
            $programas = MunicipioPrograma::where('id_municipio', 0)->where('descripcion', 'Programa')->where('total_beneficiarios','>',0)->get();
            foreach ($programas as $prog) {
                $prog->total = $prog->total_beneficiarios;
                $prog->programa = Programas::find($prog->id_programa);
                $progTotal += $prog->total_beneficiarios;
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
            $munic = Municipio::where('id', $id)->first();
            $locAgrup = Localidad::where('id_municipio', $id)->select('agrupador')->pluck('agrupador');
            $agrupadores = TamLocalidad::whereIn('id', $locAgrup)->orderBy('id', 'desc')->get();
            $programas = $munic->programas()->where('total_beneficiarios', '>', 0);
            foreach ($programas as $prog) {
                $prog->total = $prog->total_beneficiarios;
                $prog->programa = Programas::find($prog->id_programa);
                $progTotal += $prog->total_beneficiarios;
            }
            $programasT = $munic->programas()->where('total_beneficiarios', '>', 0);
            foreach ($programasT as $progT) {
                $progT->total = $progT->total_beneficiarios;
            }
            $partidos[0] = Pan::where('id_municipio', $id)->count();
            $partidos[1] = Prd::where('id_municipio', $id)->count();
            $partidos[2] = Pvem::where('id_municipio', $id)->count();
            $partidos[3] = Panal::where('id_municipio', $id)->count();
            $partidos[4] = MovCiud::where('id_municipio', $id)->count();
            $partidos[5] = EncSoc::where('id_municipio', $id)->count();
            $partidos[6] = Pri::where('id_municipio', $id)->count();
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

        return view('totales.totales')->with('programas', $programas)->with('id_mun', $id)->with('partidos', $partidos)->with('partidosT', $partidosT)->with('personalPSum', $personalPSum)->with('personalPoder', $personalPoder)
                        ->with('padronT', $padronT)->with('mun_id', $id)->with('municipios', $municipios)->with('totalpadron', $totalpadron)->with('totalmujeres', $totalmujeres)->with('totalhombres', $totalhombres);
    }

public function totalesSumas() {

        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 17, 18, 19, 20, 21, 22, 23, 24];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                if ($programa->id < 12 || $programa->id == 15 || $programa->id > 21)
                    $data['descripcion'] = 'Programa';
                else
                    $data['descripcion'] = '';
                if ($programa->id != 11 && $programa->id != 15) {
                    $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->count();
                    if ($programa->id == 9) {
                        $icat = \DB::select(\DB::raw("select count(*) total from icat where id_municipio = $municipio->id "));
                        $stps = \DB::select(\DB::raw("select count(*) total from stps where id_municipio = $municipio->id "));
                        $totalG = $icat[0]->total + $stps[0]->total;
                        $data['id_programa'] = $programa->id;
                        $data['id_municipio'] = $municipio->id;
                        $data['total_beneficiarios'] = $total;
                        $data['total_general'] = $totalG;
                    } else {
                        $query = $programa->query;
                        if ($query != null){
                            $totalG = \DB::select(\DB::raw("select count(*) total from $query where id_municipio = $municipio->id "));
                            $data['id_programa'] = $programa->id;
                            $data['id_municipio'] = $municipio->id;
                            $data['total_beneficiarios'] = $total;
                            $data['total_general'] = $totalG[0]->total;
                        }
                        else{
                            $data['id_programa'] = $programa->id;
                            $data['id_municipio'] = $municipio->id;
                            $data['total_beneficiarios'] = $total;
                            $data['total_general'] = 0;
                        }
                    }
                }
                else {
                    $data['id_programa'] = $programa->id;
                    $data['id_municipio'] = $municipio->id;
                    $data['total_beneficiarios'] = 0;
                    $data['total_general'] = 0;
                }
                MunicipioPrograma::creaRegistro($data);
            }
        }
        foreach ($programas as $programa) {
            if ($programa->id < 12 || $programa->id == 15 || $programa->id > 21)
                $data['descripcion'] = 'Programa';
            else
                $data['descripcion'] = '';
            if ($programa->id != 11 && $programa->id != 15) {
                $total = Padron::where($programa->campo, 1)->count();
                if ($programa->id == 9) {
                    $icat = \DB::select(\DB::raw("select count(*) total from icat"));
                    $stps = \DB::select(\DB::raw("select count(*) total from stps"));
                    $totalG = $icat[0]->total + $stps[0]->total;
                    $data['id_programa'] = $programa->id;
                    $data['id_municipio'] = 0;
                    $data['total_beneficiarios'] = $total;
                    $data['total_general'] = $totalG;
                } else {
                    $query = $programa->query;
                    if ($query != null){
                        $totalG = \DB::select(\DB::raw("select count(*) total from $query"));
                        $data['id_programa'] = $programa->id;
                        $data['id_municipio'] = 0;
                        $data['total_beneficiarios'] = $total;
                        $data['total_general'] = $totalG[0]->total;
                    }
                    else{
                        $data['id_programa'] = $programa->id;
                        $data['id_municipio'] = 0;
                        $data['total_beneficiarios'] = $total;
                        $data['total_general'] = 0;
                    }
                }
            }
            else {
                $data['id_programa'] = $programa->id;
                $data['id_municipio'] = 0;
                $data['total_beneficiarios'] = 0;
                $data['total_general'] = 0;
            }
            MunicipioPrograma::creaRegistro($data);
        }
    }

    public function totalesBeneficios() {
        $mun = 1;
        while ($mun <= 58) {
            $query = "SELECT total, count(*) suma
                        FROM (select coalesce(p_prospera,0)+coalesce(p_65,0)+coalesce(p_empleo_sedesol,0)+coalesce(p_conafe,0)+coalesce(p_ieea,0)
                        +coalesce(p_uniformes,0)+coalesce(p_comit_salud,0)+coalesce(p_pesa,0)+coalesce(p_apoyo_empleo,0)+coalesce(p_desayunos,0)
                        +coalesce(p_vivienda,0)+coalesce(p_liconsa_t,0)+coalesce(p_cuartos_rosas,0) total, id_municipio
                        from padron where id_municipio = $mun) totales
                        GROUP BY total
                        HAVING COUNT(*) > 1";
            $results = \DB::select(\DB::raw($query));
            foreach ($results as $res) {
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
                        +coalesce(p_vivienda,0)+coalesce(p_liconsa_t,0)+coalesce(p_cuartos_rosas,0) total, id_municipio
                        from padron) totales
                        GROUP BY total
                        HAVING COUNT(*) > 1";
        $results = \DB::select(\DB::raw($query));
        foreach ($results as $res) {
            $data['municipio'] = 0;
            $data['cantidad'] = $res->total;
            $data['total'] = $res->suma;
            BeneficiariosProgTot::creaRegistro($data);
        }
    }

    public function totalesPartidos() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 17, 18, 19, 20, 21, 22, 23, 24];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $partidos = Partidos::all();
        $i = 0;
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
        $i = 0;
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

    public function totalesPromovidos() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 13, 14, 17, 18, 19, 21, 22, 23, 24];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $i = 0;
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->where('p_promovido_n', 1)->count();
                $data[$i]['programa'] = $programa->id;
                $data[$i]['total'] = $total;
                $data[$i]['municipio'] = $municipio->id;
                PromovidosTotales::creaRegistro($data[$i]);
                $i++;
            }
        }
        $i = 0;
        foreach ($programas as $programa) {
            $total = Padron::where($programa->campo, 1)->where('p_promovido_n', 1)->count();
            $data[$i]['programa'] = $programa->id;
            $data[$i]['total'] = $total;
            $data[$i]['municipio'] = 0;
            PromovidosTotales::creaRegistro($data[$i]);
            $i++;
        }
    }

    public function totalesSindicatos() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 17, 18, 19, 20, 21, 22, 23, 24];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $i = 0;
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->where('p_snte', 1)->count();
                $data[$i]['sindicato'] = 1;
                $data[$i]['programa'] = $programa->id;
                $data[$i]['total'] = $total;
                $data[$i]['municipio'] = $municipio->id;
                SindicatosTotales::creaRegistro($data[$i]);
                $i++;
            }
        }
        $i = 0;
        foreach ($programas as $programa) {
            $total = Padron::where($programa->campo, 1)->where('p_snte', 1)->count();
            $data[$i]['sindicato'] = 1;
            $data[$i]['programa'] = $programa->id;
            $data[$i]['total'] = $total;
            $data[$i]['municipio'] = 0;
            SindicatosTotales::creaRegistro($data[$i]);
            $i++;
        }
    }

    public function totalesPromotores() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 13, 14, 17, 18, 19, 20, 22, 23, 24];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $i = 0;
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->where('p_promotor', 1)->count();
                $data[$i]['programa'] = $programa->id;
                $data[$i]['total'] = $total;
                $data[$i]['municipio'] = $municipio->id;
                PromotoresTotales::creaRegistro($data[$i]);
                $i++;
            }
        }
        $i = 0;
        foreach ($programas as $programa) {
            $total = Padron::where($programa->campo, 1)->where('p_promotor', 1)->count();
            $data[$i]['programa'] = $programa->id;
            $data[$i]['total'] = $total;
            $data[$i]['municipio'] = 0;
            PromotoresTotales::creaRegistro($data[$i]);
            $i++;
        }
    }

    public function totalesRosas() {
        $parts = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 13, 14, 17, 18, 19, 20, 21, 22, 23];
        $programas = Programas::whereIn('id', $parts)->get();
        $municipios = Municipio::all();
        $i = 0;
        foreach ($programas as $programa) {
            foreach ($municipios as $municipio) {
                $total = Padron::where('id_municipio', $municipio->id)->where($programa->campo, 1)->where('p_cuartos_rosas', 1)->count();
                $data[$i]['programa'] = $programa->id;
                $data[$i]['total'] = $total;
                $data[$i]['municipio'] = $municipio->id;
                CuartosRosasTotales::creaRegistro($data[$i]);
                $i++;
            }
        }
        $i = 0;
        foreach ($programas as $programa) {
            $total = Padron::where($programa->campo, 1)->where('p_cuartos_rosas', 1)->count();
            $data[$i]['programa'] = $programa->id;
            $data[$i]['total'] = $total;
            $data[$i]['municipio'] = 0;
            CuartosRosasTotales::creaRegistro($data[$i]);
            $i++;
        }
    }    
}
