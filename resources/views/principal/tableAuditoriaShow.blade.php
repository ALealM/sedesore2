

<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
        <tr>
            <th>Nombre</th>
            <th>Municipio</th>
            <th>Domicilio</th>
            <th>Fecha de nacimiento</th>
            <th>Clave electoral</th>
            <th>Contacto personal</th>
            <th>Llamada telefónica</th>
            <th>Carta</th>
            <th>Asistencia a evento</th>
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
            <td><center>{!! ($beneficiario->contacto) ? '<i class="fa fa-check-square-o"></i>' : '<i class="fa fa-square-o"></i>' !!}</center></td>
            <td><center>{!! ($beneficiario->llamada) ? '<i class="fa fa-check-square-o"></i>' : '<i class="fa fa-square-o"></i>' !!}</center></td>
            <td><center>{!! ($beneficiario->carta) ? '<i class="fa fa-check-square-o"></i>' : '<i class="fa fa-square-o"></i>' !!}</center></td>
            <td><center>{!! ($beneficiario->asistencia) ? '<i class="fa fa-check-square-o"></i>' : '<i class="fa fa-square-o"></i>' !!}</center></td>
        </tr>
        @endforeach
        @else
        <td colspan="9">No se encontró ningún resultado</td>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9" style="text-align: center">
                    {!! $beneficiarios->render() !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>