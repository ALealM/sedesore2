

<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
        <tr>
            <th>Nombre Beneficiario</th>
            <?php if($progr==0): ?>
            <?php $cols = 3; ?>
            <th style="text-align:center !important;" data-order='total'>Total</th>
            <?php else: ?>
            <?php $cols = 2; ?>
            <?php endif; ?>
            <?php $__currentLoopData = $programasB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programaB): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th style="text-align:center !important;" ><?php echo $programaB->programa()->nombre; ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $programasB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programaB): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td><center> <?php echo ($beneficiario[$programaB->programa()->campo]==1) ? '<span><i class="glyphicon glyphicon-ok"></i></span>' :  '<span><i class="glyphicon glyphicon-remove"></i></span>'; ?></center></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td colspan="2">Sin beneficiarios para mostrar en este municipio</td>
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