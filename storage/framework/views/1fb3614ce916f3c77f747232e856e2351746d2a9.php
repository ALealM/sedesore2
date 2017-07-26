

<div class="mt col-lg-12 col-md-12">
    <table id="example1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="example1_info">
        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
        <tr>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <!--<th>Municipio</th>-->
            <th>Partido</th>
            
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $padron; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a style="cursor:pointer" onclick="informacion(<?php echo $pad->id; ?>)"><?php echo $pad->nombre; ?></a></td>
            <td><?php echo $pad->ap_paterno; ?></td>
            <td><?php echo $pad->ap_materno; ?></td>
            <td><?php echo $pad->partido; ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tfoot>
        </tfoot>
    </table>
</div>
<?php echo $__env->make('resultados.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>