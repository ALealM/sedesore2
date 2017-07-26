<?php 
use App\Models\Municipio;

?>


<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">

    <h1 class="page-title ng-scope"><span class="fw-semi-bold">Resumen de Personal por Poder / Entidad</span></h1>
    <div class="row ng-scope">
        <div class="col-md-11">
            <div class="clearfix">
                <div><h2>Desglose por Dependencia - Entidad</h2></div><hr>
            </div>

            
                  
            <div class="mt col-lg-12 col-md-12">
                <table id="example1" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                    <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Poder</th>
                        <th>Tipo</th>
                        <th>Dependencia</th>
                        <th>No Empleado</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $personal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($persona->poder); ?></td>
                            <td><?php echo e($persona->tipo); ?></td>
                            <td><?php echo e($persona->dependencia); ?></td>
                            <td><?php echo e($persona->no_empleados); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            
        </div>
    </div>
</main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>