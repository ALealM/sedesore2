

<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
        <tr>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Domicilio</th>
            <th>Fecha de nacimiento</th>
            <th>Clave electoral</th>
        </tr>
        </thead>
        <tbody>
            
        @if(count($beneficiarios)!=0)
        @foreach($beneficiarios as $beneficiario)
        <tr>
            <td>
                <a onclick="modalDatos({{$beneficiario->id}})" style="cursor:pointer; color: #006633">
                    {!! $beneficiario->nombre() !!}{{ Form::hidden('nombre',$beneficiario->nombre(),['id'=>'nombre'.$beneficiario->id]) }}
                </a>
            </td>
            <td>{!! $beneficiario->municipio()->municipio !!}{{ Form::hidden('municipio',$beneficiario->municipio()->municipio,['id'=>'municipio'.$beneficiario->id]) }}
            {{ Form::hidden('id_municipio',$beneficiario->id_municipio,['id'=>'id_municipio'.$beneficiario->id]) }}</td>
            <td>{!! $beneficiario->domicilio() !!}{{ Form::hidden('domicilio',$beneficiario->domicilio(),['id'=>'domicilio'.$beneficiario->id]) }}</td>
            <td>{!! substr($beneficiario->fecha_nacimiento,6,2) !!}/{!! substr($beneficiario->fecha_nacimiento,4,2) !!}/{!! substr($beneficiario->fecha_nacimiento,0,4) !!}
            {{ Form::hidden('fecha_nacimiento',substr($beneficiario->fecha_nacimiento,6,2).'/'.substr($beneficiario->fecha_nacimiento,4,2).'/'.substr($beneficiario->fecha_nacimiento,0,4),['id'=>'fecha_nacimiento'.$beneficiario->id]) }}</td>
            <td>{!! $beneficiario->clave_electoral !!}{{ Form::hidden('clave_electoral',$beneficiario->clave_electoral,['id'=>'clave_electoral'.$beneficiario->id]) }}</td>
        </tr>
        @endforeach
        @else
        <td colspan="5">No se encontró ningún resultado</td>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: center">
                    {!! $beneficiarios->render() !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>