<!-- Modal -->
<div class="modal fade col-lg-12 col-md-12" id="info" role="dialog" aria-labelledby="myModalLabel">
    <!-- Modal -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3CB371 !important">
                <h3 class="modal-title" id="myModalLabelPrivacidad" style="color:white !important">Información del beneficiario</h3>
            </div>
            <div class="modal-body form-horizontal">  
                <div class="form-group col-lg-12 col-md-12">
                    <div class="col-lg-12 col-md-12">
                        <table class="table table-condensed table-bordered table-striped table-info">
                            <tr>
                                <td><label for="promovido" class="control-label">Promovido:</label></td>
                                <td><?php echo Form::text('promovido',null,['class'=>'form-control','placeholder'=>'Promovido','disabled','autofocus','id'=>'promovido']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="nombre" class="control-label">Nombre:</label></td>
                                <td><?php echo Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','disabled','autofocus','id'=>'nombre']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="apellido_paterno" class="control-label">Apellido paterno:</label></td>
                                <td><?php echo Form::text('apellido_paterno',null,['class'=>'form-control','placeholder'=>'Apellido paterno','disabled','autofocus','id'=>'apellido_paterno']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="apellido_materno" class="control-label">Apellido materno:</label></td>
                                <td><?php echo Form::text('apellido_materno',null,['class'=>'form-control','placeholder'=>'Apellido materno','disabled','autofocus','id'=>'apellido_materno']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="fecha_nacimiento" class="control-label">Fecha de nacimiento:</label></td>
                                <td><?php echo Form::text('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Fecha de nacimiento','disabled','autofocus','id'=>'fecha_nacimiento']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="curp" class="control-label">CURP:</label></td>
                                <td><?php echo Form::text('curp',null,['class'=>'form-control','placeholder'=>'CURP','disabled','autofocus','id'=>'curp']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="municipio" class="control-label">Municipio:</label></td>
                                <td><?php echo Form::text('municipio',null,['class'=>'form-control','placeholder'=>'Municipio','disabled','autofocus','id'=>'municipioInfo']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="localidad" class="control-label">Localidad:</label></td>
                                <td><?php echo Form::text('localidad',null,['class'=>'form-control','placeholder'=>'Localidad','disabled','autofocus','id'=>'localidad']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="programas" class="control-label">Programas:</label></td>
                                <td><?php echo Form::textarea('programas',null,['class'=>'form-control','placeholder'=>'Sin programas','disabled','autofocus','id'=>'programas']); ?></td>
                            </tr>
                        </table>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">                        
                            <a class="btn btn-danger btn-sm" data-dismiss="modal" style="cursor: pointer">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>