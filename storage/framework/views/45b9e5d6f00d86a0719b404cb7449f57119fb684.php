

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
            
        <?php if(count($beneficiarios)!=0): ?>
        <?php $__currentLoopData = $beneficiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <a onclick="modalDatos(<?php echo e($beneficiario->id); ?>)" style="cursor:pointer; color: #006633">
                    <?php echo $beneficiario->nombre; ?>

                </a>
            </td>
            <td><?php echo $beneficiario->municipio; ?></td>
            <td><?php echo $beneficiario->domicilio; ?></td>
            <td><?php echo substr($beneficiario->fecha_nacimiento,6,2); ?>/<?php echo substr($beneficiario->fecha_nacimiento,4,2); ?>/<?php echo substr($beneficiario->fecha_nacimiento,0,4); ?></td>
            <td><?php echo $beneficiario->clave_electoral; ?></td>
            <td><?php echo $beneficiario->fb; ?></td>
            <td><?php echo $beneficiario->email; ?></td>
            <td><?php echo $beneficiario->telefono; ?></td>
            <td><?php echo $beneficiario->responsable; ?></td>
            <td><?php echo date("d/m/Y", strtotime($beneficiario->fecha)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td colspan="10">No se encontró ningún resultado</td>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10" style="text-align: center">
                    <?php echo $beneficiarios->render(); ?>

                </td>
            </tr>
        </tfoot>
    </table>
</div>