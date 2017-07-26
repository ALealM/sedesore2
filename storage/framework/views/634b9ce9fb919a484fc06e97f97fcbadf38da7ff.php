<script>
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.in').collapse('hide');
    });
</script>
<style>
    .hiddenRow {
        padding: 0 !important;
    }
</style>
<div class='form-group'>
    <!--<div class="container">-->
    <ul class="nav nav-tabs">
        <li><a data-toggle="tab" href="#2012">Resultados 2012</a></li>
        <li class="active"><a data-toggle="tab" href="#2015">Resultados 2015</a></li>
    </ul>
    <div class="tab-content">
        <div id="2012" class="tab-pane fade">
            <table class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th rowspan="2">Sección</th>
                        <th colspan="3" style="text-align: center">Resultados electorales 2012</th>
                        <th rowspan="2">Votación PRI</th>
                        <th rowspan="2">Votos necesarios</th>
                    </tr>
                    <tr>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $vn = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2012; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $row[$i] = $res->seccion;
                    if ($i == 0) {
                        $vn += $res->votacion_nula;
                        $vv += $res->votacion_valida;
                        $ve += $res->votacion_emitida;
                        $vp += $res->pri;
                    } else {
                        if ($row[$i] != $row[$i - 1]) {
                            ?>
                    <tr data-toggle="collapse" data-target=".demo<?php echo e($i); ?>" onclick="listado('2012<?php echo e($i); ?>',<?php echo e($row[$i-1]); ?>)" style="cursor:pointer">
                                <td><?php echo $row[$i-1]; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="collapse demo<?php echo e($i); ?>" id='2012<?php echo e($i); ?>'>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <?php
                            $vn = $res->votacion_nula;
                            $vv = $res->votacion_valida;
                            $ve = $res->votacion_emitida;
                            $vp = $res->pri;
                        } else {
                            $vn += $res->votacion_nula;
                            $vv += $res->votacion_valida;
                            $ve += $res->votacion_emitida;
                            $vp += $res->pri;
                        }
                    }
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr data-toggle="collapse" data-target=".demo<?php echo e($i); ?>" onclick="listado('2012<?php echo e($i); ?>',<?php echo e($row[$i-1]); ?>)" style="cursor:pointer">
                        <td><?php echo $row[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div class="collapse demo<?php echo e($i); ?>" id='2012<?php echo e($i); ?>'>
                                
                            </div>
                        </td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td><b>Totales</b></td>
                        <td style="text-align: center"><b>275</b></td>
                        <td style="text-align: center"><b>4,526</b></td>
                        <td style="text-align: center"><b>4,801</b></td>
                        <td style="text-align: center"><b>2,271</b></td>
                        <td style="text-align: center"><b>2,255</b></td>
                    </tr>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <div id="2015" class="tab-pane fade in active">
            <table class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th rowspan="2">Sección</th>
                        <th colspan="3" style="text-align: center">Resultados electorales 2015</th>
                        <th rowspan="2">Votación PRI</th>
                        <th rowspan="2">Votos necesarios</th>
                    </tr>
                    <tr>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $vn = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2015; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $row2[$i] = $res2->seccion;
                    if ($i == 0) {
                        $vn += $res2->votacion_nula;
                        $vv += $res2->votacion_valida;
                        $ve += $res2->votacion_emitida;
                        $vp += $res2->pri;
                    } else {
                        if ($row2[$i] != $row2[$i - 1]) {
                            ?>
                            <tr data-toggle="collapse" data-target=".demo<?php echo e($i); ?>a" onclick="listado('2015<?php echo e($i); ?>',<?php echo e($row2[$i-1]); ?>)" style="cursor:pointer">
                                <td><?php echo $row2[$i-1]; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="collapse demo<?php echo e($i); ?>a" id='2015<?php echo e($i); ?>'>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <?php
                            $vn = $res2->votacion_nula;
                            $vv = $res2->votacion_valida;
                            $ve = $res2->votacion_emitida;
                            $vp = $res2->pri;
                        } else {
                            $vn += $res2->votacion_nula;
                            $vv += $res2->votacion_valida;
                            $ve += $res2->votacion_emitida;
                            $vp += $res2->pri;
                        }
                    }
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr data-toggle="collapse" data-target=".demo<?php echo e($i); ?>a" onclick="listado('2015<?php echo e($i); ?>',<?php echo e($row2[$i-1]); ?>)" style="cursor:pointer">
                        <td><?php echo $row2[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div class="collapse demo<?php echo e($i); ?>a" id='2015<?php echo e($i); ?>'>
                                
                            </div>
                        </td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td><b>Totales</b></td>
                        <td style="text-align: center"><b>189</b></td>
                        <td style="text-align: center"><b>3,292</b></td>
                        <td style="text-align: center"><b>3,481</b></td>
                        <td style="text-align: center"><b>1,844</b></td>
                        <td style="text-align: center"><b>1,488</b></td>
                    </tr>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div> 
    <!--</div>-->
</div>
<?php echo $__env->make('resultados.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>