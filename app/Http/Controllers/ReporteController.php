<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Personal;
use App\Models\Localidad;
use App\Models\Padron;
use App\Models\PersonalPadron;
use App\Models\BusquedaSql;
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

class ReporteController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {

        $municipios = Municipio::pluck('municipio', 'id');
        return view('principal.index')->with('municipios', $municipios);
    }

    public function busqueda() {

        $municipios = Municipio::pluck('municipio', 'id');
        return view('principal.busqueda')->with('municipios', $municipios)->with('inicio', 0)
                        ->with('nombre', null)->with('apPat', null)->with('apMat', null)->with('mun', null)->with('cveElect', null);
    }

    public function getLocalidad(Request $request) {
        $municipio = $request->get('municipio');
        $municipios_ = Municipio::where('id', $municipio)->first();
        $clave = $municipios_->clave;
        $localidades = Localidad::where('id_municipio', $municipio)->select('localidad', 'id')->get();
        $i = 0;
        foreach ($localidades as $locs) {
            $localidades[$i]['claveM'] = $clave;
            $i++;
        }
        return $localidades;
    }

    public function validaDatos(Request $request) {
        $res['cantidad'] = 0;
        $res['motivos'] = '';
        $cveElector = $request->get('cveElector');
        $anio = $request->get('anio');
        $mes = ($request->get('mes') < 10) ? '0' . $request->get('mes') : $request->get('mes');
        $dia = ($request->get('dia') < 10) ? '0' . $request->get('dia') : $request->get('dia');
        $cveE = Padron::where('clave_electoral', $cveElector)->whereNotNull('clave_electoral')->count();
        if ($cveE == 0) {
            $res['cantidad'] += 1;
            $res['motivos'] .= 'La clave electoral no coincide con el padrón actual.';
        }
        $fechaAct = date('Y-m-d');
        $fechaPer = $anio . '-' . $mes . '-' . $dia;
        $fecha1 = new \DateTime($fechaAct);
        $fecha2 = new \DateTime($fechaPer);
        $fecha = $fecha1->diff($fecha2);
        if ($fecha->y < 18) {
            $res['cantidad'] += 1;
            $res['motivos'] .= ' La persona es menor de edad.';
        }
        return $res;
    }

    public function store(Request $request) {
        $input = $request->all();
        $mes = ($input['mes'] < 10) ? '0' . $input['mes'] : $input['mes'];
        $dia = ($input['dia'] < 10) ? '0' . $input['dia'] : $input['dia'];
        $file = $request->file('fotografia');
        $path = public_path() . '/img/personal';
        $padron = Padron::where('clave_electoral', $input['cve_elector'])->first();
        if ($file) {
            $data['fotografia'] = $file->getClientOriginalName();
            $subir = $file->move($path, $file->getClientOriginalName());
        } else {
            $data['fotografia'] = 'avatar.png';
        }
//        dd($input);
        $data['id_padron'] = $padron->id;
        $data['nombre'] = $input['nombre'];
        $data['ap_paterno'] = $input['apellido_paterno'];
        $data['ap_materno'] = $input['apellido_materno'];
        $data['curp'] = $input['curp'];
        $data['fb'] = $input['facebook'];
        $data['email'] = $input['email'];
        $data['telefono'] = $input['telefono'];
        $data['programa'] = 1;
        $data['responsable'] = $input['responsable'];
        $data['seccion'] = $padron->id_seccion;
        $data['casilla'] = 1;
        $data['id_municipio'] = $input['id_municipio'];
        $data['id_localidad'] = $input['id_localidad'];
        $data['domicilio'] = $input['domicilio'];
        $data['cve_elector'] = $input['cve_elector'];
        $data['fecha_nacimiento'] = $input['anio'] . "-" . $mes . "-" . $dia;
        Personal::creaRegistro($data);

        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha guardado existosamente el nuevo registro.");
        Session::flash('tipoMsg', 'success');

        return Redirect::to("/index");
    }

    public function guardaPersona(Request $request) {
        $input = $request->all();
        $data['id_padron'] = $input['id_padron'];
        $data['fb'] = $input['facebook'];
        $data['email'] = $input['email'];
        $data['telefono'] = $input['telefono'];
        $data['programa'] = 1;
        $data['responsable'] = $input['responsable'];
        $data['id_municipio'] = $input['id_municipio'];
        $data['id_usuario'] = $input['id_usuario'];
        $data['fecha_alta'] = date('Y-m-d');
        PersonalPadron::creaRegistro($data);

        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha guardado existosamente el nuevo registro.");
        Session::flash('tipoMsg', 'success');

        return Redirect::to("/busqueda");
    }

    public function listadoPersonal(Request $request) {
        if ($request->ajax()) {
        }
        else {
            $input = $request->all();
            $data['nombre'] = $input['nombre'];
            $data['ap_paterno'] = $input['apellido_paterno'];
            $data['ap_materno'] = $input['apellido_materno'];
            $data['id_municipio'] = $input['id_municipio'];
            $data['clave_electoral'] = $input['clave_electoral'];
            $data['id_usuario'] = \Auth::User()->id;
            BusquedaSql::creaRegistro($data);
            
        }
        $municipios = Municipio::pluck('municipio', 'id');
        $buscar = BusquedaSql::where('id_usuario',\Auth::User()->id)->orderBy('id','desc')->first();

        $filtro = SistemaController::controlPagAjax($request);
        
        $beneficiarios = $this->search($filtro, $buscar->nombre, $buscar->ap_paterno, $buscar->ap_materno, $buscar->id_municipio, $buscar->clave_electoral)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('principal.table')->with('inicio', 1)->with('beneficiarios', $beneficiarios)->with('municipios', $municipios)
                    ->with('nombre', $buscar->nombre)->with('apPat', $buscar->ap_paterno)->with('apMat', $buscar->ap_materno)
                    ->with('mun', $buscar->id_municipio)->with('cveElect', $buscar->clave_electoral);
        } else {
            return view('principal.busqueda')->with('inicio', 1)->with('beneficiarios', $beneficiarios)->with('municipios', $municipios)
                    ->with('nombre', $buscar->nombre)->with('apPat', $buscar->ap_paterno)->with('apMat', $buscar->ap_materno)
                    ->with('mun', $buscar->id_municipio)->with('cveElect', $buscar->clave_electoral);
        }
    }

    public function search($filtro, $nombre, $apPat, $apMat, $mun, $cevElect) {

        $texto = $filtro["filtro"];
        $order = $filtro["order"];
        $ot = $filtro["ot"];

        if ($nombre == null) {
            $nombre = '';
        } else {
            $nombre = " and nombre like '%$nombre%'";
        }
        if ($apPat == null) {
            $apPat = '';
        } else {
            $apPat = " and ap_paterno like '%$apPat%'";
        }
        if ($apMat == null) {
            $apMat = '';
        } else {
            $apMat = " and ap_materno like '%$apMat%'";
        }
        if ($mun == null) {
            $mun = '';
        } else {
            $mun = " and id_municipio = $mun";
        }
        if ($cevElect == null) {
            $cevElect = '';
        } else {
            $cevElect = " and clave_elector = '$cevElect'";
        }
        
        if(\Auth::User()->id_programa == 25){
            $prog = " and p_pri = 1 and total = 0";
        }
        else{
            $prog = " and p_prospera = 1";
        }

        $query = Padron::query()->whereRaw("id not in (select id_padron from personalPadron) $nombre $apPat $apMat $mun $cevElect $prog");

        $texto = str_replace(' ', '', $texto);
        $columns = Schema::getColumnListing('padron');
        $wh = "";
        if ($texto) {
            $query->whereRaw(" (REPLACE(CAST(CONCAT(nombre,' ',ap_paterno,' ',ap_materno) as CHAR),' ','') LIKE '%" . $texto . "%' "
                    . " OR fecha_nacimiento LIKE '%" . $texto . "%' OR clave_electoral LIKE '%" . $texto . "%'"
                    . " OR colonia LIKE '%" . $texto . "%' OR calle LIKE '%" . $texto . "%'"
                    . " OR (select municipio from municipios where id = id_municipio) LIKE '%" . $texto . "%')");
        }

        if ($order) {
            if ($ot == 0)
                $query->orderBy($order, 'asc');
            else
                $query->orderBy($order, 'desc');
        }

        $query->selectRaw("padron.*")->orderby('nombre_completo');
        return $query;
    }

    public function listadoPersonas(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $beneficiarios = $this->searchPersonas($filtro)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('principal.tableDetalle')->with('beneficiarios', $beneficiarios);
        } else {
            return view('principal.detalle')->with('beneficiarios', $beneficiarios);
        }
    }

    public function searchPersonas($filtro) {

        $texto = $filtro["filtro"];
        $order = $filtro["order"];
        $ot = $filtro["ot"];

        $query = PersonalPadron::query()->join("padron","padron.id","=","personalPadron.id_padron")->whereRaw("personalPadron.programa = ".\Auth::User()->id_programa);

        $texto = str_replace(' ', '', $texto);
        $columns = Schema::getColumnListing('personalPadron');
        $wh = "";
        if ($texto) {
            $query->whereRaw(" (REPLACE(CAST(CONCAT(nombre,' ',ap_paterno,' ',ap_materno) as CHAR),' ','') LIKE '%" . $texto . "%' "
                    . " OR fecha_nacimiento LIKE '%" . $texto . "%' OR clave_electoral LIKE '%" . $texto . "%'"
                    . " OR colonia LIKE '%" . $texto . "%' OR calle LIKE '%" . $texto . "%'"
                    . " OR (select municipio from municipios where id = personalPadron.id_municipio) LIKE '%" . $texto . "%')");
        }

        if ($order) {
            if ($ot == 0)
                $query->orderBy($order, 'asc');
            else
                $query->orderBy($order, 'desc');
        }

        $query->selectRaw("personalPadron.fb,personalPadron.email,personalPadron.telefono,personalPadron.responsable,"
                . "(select municipio from municipios where id = personalPadron.id_municipio) municipio,"
                . "CONCAT(padron.nombre,' ',padron.ap_paterno,' ',padron.ap_materno) nombre,padron.fecha_nacimiento,"
                . "padron.clave_electoral,CONCAT(padron.calle,' ',padron.n_ext,' ',padron.colonia) domicilio,"
                . "DATE_FORMAT(personalPadron.fecha_alta,'%d-%m-%Y') fecha")->orderBy(\DB::raw('DATE_FORMAT(personalPadron.fecha_alta,"%Y-%m-%d")'),'desc');
        return $query;
    }

    public function auditoria(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $beneficiarios = $this->searchAuditoria($filtro)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('principal.tableAuditoria')->with('beneficiarios', $beneficiarios);
        } else {
            return view('principal.auditoria')->with('beneficiarios', $beneficiarios);
        }
    }

    public function searchAuditoria($filtro) {

        $texto = $filtro["filtro"];
        $order = $filtro["order"];
        $ot = $filtro["ot"];

        $query = PersonalPadron::query()->join("padron","padron.id","=","personalPadron.id_padron")->whereRaw("personalPadron.programa =".\Auth::User()->id_programa);

        $texto = str_replace(' ', '', $texto);
        $columns = Schema::getColumnListing('personalPadron');
        $wh = "";
        if ($texto) {
            $query->whereRaw(" (REPLACE(CAST(CONCAT(nombre,' ',ap_paterno,' ',ap_materno) as CHAR),' ','') LIKE '%" . $texto . "%' "
                    . " OR fecha_nacimiento LIKE '%" . $texto . "%' OR clave_electoral LIKE '%" . $texto . "%'"
                    . " OR colonia LIKE '%" . $texto . "%' OR calle LIKE '%" . $texto . "%'"
                    . " OR (select municipio from municipios where id = personalPadron.id_municipio) LIKE '%" . $texto . "%')");
        }

        if ($order) {
            if ($ot == 0)
                $query->orderBy($order, 'asc');
            else
                $query->orderBy($order, 'desc');
        }

        $query->selectRaw("personalPadron.fb,personalPadron.email,personalPadron.telefono,personalPadron.responsable,"
                . "(select municipio from municipios where id = personalPadron.id_municipio) municipio,"
                . "CONCAT(padron.nombre,' ',padron.ap_paterno,' ',padron.ap_materno) nombre,padron.fecha_nacimiento,"
                . "padron.clave_electoral,CONCAT(padron.calle,' ',padron.n_ext,' ',padron.colonia) domicilio,"
                . "DATE_FORMAT(personalPadron.fecha_alta,'%d-%m-%Y') fecha,personalPadron.contacto,personalPadron.llamada,"
                . "personalPadron.carta,personalPadron.asistencia,personalPadron.id")
                ->orderBy(\DB::raw('DATE_FORMAT(personalPadron.fecha_alta,"%Y-%m-%d")'),'desc');
        return $query;
    }
    
    public function guardaAud(Request $request) {
        $data['contacto'] = $request->get('contacto');
        $data['llamada'] = $request->get('llamada');
        $data['carta'] = $request->get('carta');
        $data['asistencia'] = $request->get('asistencia');
        $data['id'] = $request->get('id');
        
        PersonalPadron::editarRegistro($data);
        
        return 1;
    }
    
    public function auditoriaShow(Request $request) {

        $filtro = SistemaController::controlPagAjax($request);
        $beneficiarios = $this->searchAuditoria($filtro)->paginate($filtro["tamPag"]);

        if ($request->ajax()) {
            return view('principal.tableAuditoriaShow')->with('beneficiarios', $beneficiarios);
        } else {
            return view('principal.auditoriaShow')->with('beneficiarios', $beneficiarios);
        }
    }
}
