<!-- Modal -->
<div class="modal fade col-lg-12 col-md-12" id="datosAuditoria" role="dialog" aria-labelledby="myModalLabel">
    <!-- Modal -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3CB371 !important">
                <h3 class="modal-title" id="myModalLabelPrivacidad" style="color:white !important">Datos de contacto</h3>
            </div>
            <form method="POST" action="<?php echo e(url('personal/guardaPersona')); ?>" accept-charset="UTF-8" class="form-horizontal" id="formGuardar">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body form-horizontal">  
                    <div class="form-group col-lg-12 col-md-12">
                        <div class="col-lg-12 col-md-12">
                            <table class="table table-condensed table-bordered table-striped table-info">
                                <tr>
                                    <td><label for="nombre" class="control-label">Nombre:</label></td>
                                    <td><?php echo Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre','disabled','autofocus','id'=>'nombre_']); ?>

                                        <?php echo e(Form::hidden('id_municipio',null,['id'=>'id_municipio_'])); ?>

                                        <?php echo e(Form::hidden('id_padron',null,['id'=>'id_padron_'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="municipio" class="control-label">Municipio:</label></td>
                                    <td><?php echo Form::text('municipio',null,['class'=>'form-control','placeholder'=>'Municipio','disabled','autofocus','id'=>'municipio_']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="domicilio" class="control-label">Domicilio:</label></td>
                                    <td><?php echo Form::text('domicilio',null,['class'=>'form-control','placeholder'=>'Domicilio','disabled','autofocus','id'=>'domicilio_']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="fecha_nacimiento" class="control-label">Fecha de nacimiento:</label></td>
                                    <td><?php echo Form::text('fecha_nacimiento',null,['class'=>'form-control','placeholder'=>'Fecha de nacimiento','disabled','autofocus','id'=>'fecha_nacimiento_']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="clave_electoral" class="control-label">Clave electoral:</label></td>
                                    <td><?php echo Form::text('localidad',null,['class'=>'form-control','placeholder'=>'Localidad','disabled','autofocus','id'=>'clave_electoral_']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="telefono" class="control-label">Teléfono:</label></td>
                                    <td><?php echo Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono','required','autofocus']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="control-label">Email:</label></td>
                                    <td><?php echo Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required','autofocus']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="facebook" class="control-label">Facebook:</label></td>
                                    <td><?php echo Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook','required','autofocus']); ?></td>
                                </tr>
                                <tr>
                                    <td><label for="responsable" class="control-label">Responsable:</label></td>
                                    <td><?php echo Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Responsable','required','autofocus']); ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">                        
                                <a class="btn btn-danger btn-sm" data-dismiss="modal" style="cursor: pointer">Cerrar</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>  Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>