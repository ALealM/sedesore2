

<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
        <tr>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Domicilio</th>
            <th>Fecha de nacimiento</th>
            <th>Clave electoral</th>
            <th>Facebook</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Responsable</th>
            <th>Fecha alta</th>
        </tr>
        </thead>
        <tbody>
            
        @if(count($beneficiarios)!=0)
        @foreach($beneficiarios as $beneficiario)
        <tr>
            <td>
                <a onclick="modalDatos({{$beneficiario->id}})" style="cursor:pointer; color: #006633">
                    {!! $beneficiario->nombre !!}
                </a>
            </td>
            <td>{!! $beneficiario->municipio !!}</td>
            <td>{!! $beneficiario->domicilio !!}</td>
            <td>{!! substr($beneficiario->fecha_nacimiento,6,2) !!}/{!! substr($beneficiario->fecha_nacimiento,4,2) !!}/{!! substr($beneficiario->fecha_nacimiento,0,4) !!}</td>
            <td>{!! $beneficiario->clave_electoral !!}</td>
            <td>{!! $beneficiario->fb !!}</td>
            <td>{!! $beneficiario->email !!}</td>
            <td>{!! $beneficiario->telefono !!}</td>
            <td>{!! $beneficiario->responsable !!}</td>
            <td>{!! date("d/m/Y", strtotime($beneficiario->fecha)) !!}</td>
        </tr>
        @endforeach
        @else
        <td colspan="10">No se encontró ningún resultado</td>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10" style="text-align: center">
                    {!! $beneficiarios->render() !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>