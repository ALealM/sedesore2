

<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<div class="row" style="margin: 2% 0 2% 0;">
    <div class="col-lg-12">
        <section>
            <div class="widget-body">
                <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                    <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                        <span class="fw-semi-bold">Sistema de Captura: <?php echo e(\Auth::User()->programa()->nombre); ?></span></h3>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row" style="margin: 0 0 2% 0;">
    <div class="col-lg-12" style="padding-left: 0px">
        <section>
            <div class="widget-body">
                <div class="form-group "> 
                    <div class="pagAjax table-responsive" id="pagAjax_form"data-url="<?php echo e(url('personas/listado')); ?>">
                        <?php echo $__env->make('principal.tableDetalle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php echo $__env->make('principal.datosDetalle', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>