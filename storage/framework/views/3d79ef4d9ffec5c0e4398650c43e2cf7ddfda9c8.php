

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
            
        <?php if(count($beneficiarios)!=0): ?>
        <?php $__currentLoopData = $beneficiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <a onclick="modalDatos(<?php echo e($beneficiario->id); ?>)" style="cursor:pointer; color: #006633">
                    <?php echo $beneficiario->nombre(); ?><?php echo e(Form::hidden('nombre',$beneficiario->nombre(),['id'=>'nombre'.$beneficiario->id])); ?>

                </a>
            </td>
            <td><?php echo $beneficiario->municipio()->municipio; ?><?php echo e(Form::hidden('municipio',$beneficiario->municipio()->municipio,['id'=>'municipio'.$beneficiario->id])); ?>

            <?php echo e(Form::hidden('id_municipio',$beneficiario->id_municipio,['id'=>'id_municipio'.$beneficiario->id])); ?></td>
            <td><?php echo $beneficiario->domicilio(); ?><?php echo e(Form::hidden('domicilio',$beneficiario->domicilio(),['id'=>'domicilio'.$beneficiario->id])); ?></td>
            <td><?php echo substr($beneficiario->fecha_nacimiento,6,2); ?>/<?php echo substr($beneficiario->fecha_nacimiento,4,2); ?>/<?php echo substr($beneficiario->fecha_nacimiento,0,4); ?>

            <?php echo e(Form::hidden('fecha_nacimiento',substr($beneficiario->fecha_nacimiento,6,2).'/'.substr($beneficiario->fecha_nacimiento,4,2).'/'.substr($beneficiario->fecha_nacimiento,0,4),['id'=>'fecha_nacimiento'.$beneficiario->id])); ?></td>
            <td><?php echo $beneficiario->clave_electoral; ?><?php echo e(Form::hidden('clave_electoral',$beneficiario->clave_electoral,['id'=>'clave_electoral'.$beneficiario->id])); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td colspan="5">No se encontró ningún resultado</td>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: center">
                    <?php echo $beneficiarios->render(); ?>

                </td>
            </tr>
        </tfoot>
    </table>
</div>