

<div class="mt col-lg-12 col-md-12">
    <table id="datatable-table" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable-table_info">
        <thead style="background-color: #03A678; color: #ffffff">
        <tr>
            <th>Nombre Beneficiario</th>
            <?php if($progr==0): ?>
            <?php $cols = 3;?>
            <th style="text-align:center !important;" data-order='total'>Total</th>
            <?php else: ?>
            <?php $cols = 2;?>
            <?php endif; ?>
            <?php $__currentLoopData = $programasB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programaB): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($programaB->id==2): ?>
            <th style="text-align:center !important;" ><?php echo $programaB->nombre; ?></th>
            <?php endif; ?>
            <?php if($programaB->id==3): ?>
            <th style="text-align:center !important;" ><?php echo $programaB->nombre; ?></th>
            <?php endif; ?>
            <?php if($programaB->id==1): ?>
            <th style="text-align:center !important;" ><?php echo $programaB->nombre; ?></th>
            <?php endif; ?>
            <?php if($programaB->id>3): ?>
            <th style="text-align:center !important;"><?php echo $programaB->nombre; ?></th>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th style="text-align:center !important;">Promovido</th>
        </tr>
        </thead>
        <tbody>

        <?php if(count($beneficiarios)!=0): ?>
        <?php $__currentLoopData = $beneficiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a onclick="datos(<?php echo e($beneficiario->id); ?>)" style="cursor:pointer; color: #006633"><?php echo $beneficiario->nombre(); ?></a></td>
            <?php if($progr==0): ?>
            <td style="text-align:left;"><b><?php echo e($beneficiario->total); ?></b></td>
            <?php endif; ?>
            <?php $__currentLoopData = $beneficiario->programas($ps); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td style="text-align:left;">
                <?php echo $prog->tiene; ?>

            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td style="text-align:left;">
                <span><i class="glyphicon glyphicon-ok"></i></span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td colspan="2">Sin beneficiarios para mostrar en esta localidad</td>
        <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="<?php echo e(count($programasB)+$cols); ?>" style="text-align: center">
                    <?php echo $beneficiarios->render(); ?>

                </td>
            </tr>
        </tfoot>
    </table>
</div>