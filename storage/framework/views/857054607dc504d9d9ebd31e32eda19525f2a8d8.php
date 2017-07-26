<!-- Modal -->
<div class="modal fade col-lg-12 col-md-12" id="modalficha" role="dialog" aria-labelledby="myModalLabel">
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
                                <td><label for="nombre" class="control-label">Nombre:</label></td>
                                <td><?php echo Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','required','autofocus','id'=>'nombre']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="apellido_paterno" class="control-label">Apellido paterno:</label></td>
                                <td><?php echo Form::text('apellido_paterno',null,['class'=>'form-control','placeholder'=>'Apellido paterno','required','autofocus','id'=>'apellido_paterno']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="apellido_materno" class="control-label">Apellido materno:</label></td>
                                <td><?php echo Form::text('apellido_materno',null,['class'=>'form-control','placeholder'=>'Apellido materno','required','autofocus','id'=>'apellido_materno']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="fecha_nacimiento" class="control-label">Fecha de nacimiento:</label></td>
                                <td><?php echo Form::text('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Fecha de nacimiento','required','autofocus','id'=>'fecha_nacimiento']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="curp" class="control-label">CURP:</label></td>
                                <td><?php echo Form::text('curp',null,['class'=>'form-control','placeholder'=>'CURP','required','autofocus','id'=>'curp']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="municipio" class="control-label">Municipio:</label></td>
                                <td><?php echo Form::text('municipio',null,['class'=>'form-control','placeholder'=>'Municipio','required','autofocus','id'=>'municipio']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="localidad" class="control-label">Localidad:</label></td>
                                <td><?php echo Form::text('localidad',null,['class'=>'form-control','placeholder'=>'Localidad','required','autofocus','id'=>'localidad']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="calle" class="control-label">Calle:</label></td>
                                <td><?php echo Form::text('calle',null,['class'=>'form-control','placeholder'=>'Calle','required','autofocus','id'=>'calle']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="num_ext" class="control-label">Número exterior:</label></td>
                                <td><?php echo Form::text('num_ext',null,['class'=>'form-control','placeholder'=>'Número exterior','required','autofocus','id'=>'num_ext']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="num_int" class="control-label">Número interior:</label></td>
                                <td><?php echo Form::text('num_ixt',null,['class'=>'form-control','placeholder'=>'Número interior','required','autofocus','id'=>'num_int']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="colonia" class="control-label">Colonia:</label></td>
                                <td><?php echo Form::text('colonia',null,['class'=>'form-control','placeholder'=>'Colonia','required','autofocus','id'=>'colonia']); ?></td>
                            </tr>
                            <tr>
                                <td><label for="codigo_postal" class="control-label">Código postal:</label></td>
                                <td><?php echo Form::text('codigo_postal',null,['class'=>'form-control','placeholder'=>'Código postal','required','autofocus','id'=>'codigo_postal']); ?></td>
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