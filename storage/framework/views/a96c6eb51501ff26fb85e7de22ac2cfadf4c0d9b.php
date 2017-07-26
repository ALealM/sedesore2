<?php use App\Models\SeccionesResultados;
?>

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
<div class='form-group' style="margin-bottom: 0px;">
    
    <!--<div class="container">-->
    <ul class="nav nav-tabs">
        <li><a data-toggle="tab" href="#2012" onclick="borrarContenido()"><b>Año 2012 con Programas</b></a></li>
        <li class="active"><a data-toggle="tab" href="#2015" onclick="borrarContenido()"><b>Año 2015 con Programas</b></a></li>
        <li><a data-toggle="tab" href="#2012G" onclick="borrarContenido()"><b>Año 2012 con Gráficas</b></a></li>
        <li><a data-toggle="tab" href="#2015G" onclick="borrarContenido()"><b>Año 2015 con Gráficas</b></a></li>
        <li><a data-toggle="tab" href="#comp" onclick="borrarContenido()"><b>Comparación 2012-2015 Gráficas</b></a></li>
        <li><a data-toggle="tab" href="#colonias" onclick="borrarContenido()"><b>Sección/Colonias</b></a></li>
    </ul>
    <div class="tab-content">
        
        <div id="2012" class="tab-pane fade" style="padding-bottom: 0px;">
            <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">                    
                    <tr>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Lista nominal</th>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                        <th>Votación PRI</th>
                        <th>Abstencionismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $p12 = 0;
                    $g12 = 0;
                    $vn = 0;
                    $vl = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    $vnT = 0;
                    $vlT = 0;
                    $vvT = 0;
                    $veT = 0;
                    $vpT = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2012; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $vlT += $res->lista_nominal;
                    $vnT += $res->votacion_nula;
                    $vvT += $res->votacion_valida;
                    $veT += $res->votacion_emitida;
                    $vpT += $res->pri;
                    $row[$i] = $res->seccion;
                    if ($i == 0) {
                        $vl += $res->lista_nominal;
                        $vn += $res->votacion_nula;
                        $vv += $res->votacion_valida;
                        $ve += $res->votacion_emitida;
                        $vp += $res->pri;
                    } else {
                        if ($row[$i] != $row[$i - 1]) {
                            ?>
                    <tr onclick="listadoImg('resultados',<?php echo e($row[$i-1]); ?>,<?php echo $vl; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                                <td><?php echo $row[$i-1]; ?></td>
                                <td style="text-align: center"><?php echo $res->seccion('2012',$row[$i-1]); ?></td>
                                <?php ($res->seccion('2012',$row[$i-1])=='GANADA') ? $g12++ : $p12++ ?>
                                <td style="text-align: center"><?php echo $res->ganador('2012',$row[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $vl; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <?php if($vl>0): ?>
                                <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                                <?php else: ?>
                                <td style="text-align: center"><?php echo '0%'; ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $vl = $res->lista_nominal;
                            $vn = $res->votacion_nula;
                            $vv = $res->votacion_valida;
                            $ve = $res->votacion_emitida;
                            $vp = $res->pri;
                        } else {
                            $vl += $res->lista_nominal;
                            $vn += $res->votacion_nula;
                            $vv += $res->votacion_valida;
                            $ve += $res->votacion_emitida;
                            $vp += $res->pri;
                        }
                    }
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="listadoImg('resultados',<?php echo e($row[$i-1]); ?>,<?php echo $vl; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <?php $seccion = SeccionesResultados::where('seccion',$row[$i-1])->where('anio',2012)->first();
                        if(count($seccion)>0){
                            $sec = $seccion->resultado;
                            $gan = $seccion->ganador;
                        }
                        else{
                            $sec = 'Indefinido';
                            $gan = 'Indefinido';
                        }?>
                        <?php ($sec=='GANADA') ? $g12++ : $p12++ ?>
                        <td><?php echo $row[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $sec; ?></td>
                        <td style="text-align: center"><?php echo $gan; ?></td>
                        <td style="text-align: center"><?php echo $vl; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <?php if($vl>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                <tfoot>
                    <tr>
                        <td><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g12); ?> / P: <?php echo number_format($p12); ?></b></td>
                        <td></td>
                        <td style="text-align: center"><b><?php echo number_format($vlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($veT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($veT/$vlT)*100,2); ?>%</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="2015" class="tab-pane fade in active" style="padding-bottom: 0px;">
            <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Lista nominal</th>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                        <th>Votación PRI</th>
                        <th>Votos necesarios 2018</th>
                        <th>Abstencionismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $g15 = 0;
                    $p15 = 0;
                    $vn = 0;
                    $vl = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    $vnT = 0;
                    $vlT = 0;
                    $vvT = 0;
                    $veT = 0;
                    $vpT = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2015; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $vlT += $res2->lista_nominal;
                    $vnT += $res2->votacion_nula;
                    $vvT += $res2->votacion_valida;
                    $veT += $res2->votacion_emitida;
                    $vpT += $res2->pri;
                    $row2[$i] = $res2->seccion;
                    if ($i == 0) {
                        $vl += $res2->lista_nominal;
                        $vn += $res2->votacion_nula;
                        $vv += $res2->votacion_valida;
                        $ve += $res2->votacion_emitida;
                        $vp += $res2->pri;
                    } else {
                        if ($row2[$i] != $row2[$i - 1]) {
                            ?>
                    
                            <tr onclick="listadoImg('resultados',<?php echo e($row2[$i-1]); ?>,<?php echo $vl; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                                <td><?php echo $row2[$i-1]; ?></td>
                                <?php ($res->seccion('2015',$row2[$i-1])=='GANADA') ? $g15++ : $p15++ ?>
                                <td style="text-align: center"><?php echo $res->seccion('2015',$row2[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $res->ganador('2015',$row2[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $vl; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                                <?php if($vl>0): ?>
                                <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                                <?php else: ?>
                                <td style="text-align: center"><?php echo '0%'; ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $vl = $res2->lista_nominal;
                            $vn = $res2->votacion_nula;
                            $vv = $res2->votacion_valida;
                            $ve = $res2->votacion_emitida;
                            $vp = $res2->pri;
                        } else {
                            $vl += $res2->lista_nominal;
                            $vn += $res2->votacion_nula;
                            $vv += $res2->votacion_valida;
                            $ve += $res2->votacion_emitida;
                            $vp += $res2->pri;
                        }
                    }
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="listadoImg('resultados',<?php echo e($row2[$i-1]); ?>,<?php echo $vl; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <?php $seccion = SeccionesResultados::where('seccion',$row2[$i-1])->where('anio',2015)->first();
                        if(count($seccion)>0){
                            $sec = $seccion->resultado;
                            $gan = $seccion->ganador;
                        }
                        else{
                            $sec = 'Indefinido';
                            $gan = 'Indefinido';
                        }?>
                        <?php ($sec=='GANADA') ? $g15++ : $p15++ ?>
                        <td><?php echo $row2[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $sec; ?></td>
                        <td style="text-align: center"><?php echo $gan; ?></td>
                        <td style="text-align: center"><?php echo $vl; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                        <?php if($vl>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                <tfoot>
                    <tr>
                        <td style="text-align: center"><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g15); ?> / P: <?php echo number_format($p15); ?></b></td>
                        <td></td>
                        <td style="text-align: center"><b><?php echo number_format($vlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($veT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($meta); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($veT/$vlT)*100,2); ?>%</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="2012G" class="tab-pane fade" style="padding-bottom: 0px;">
            <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Lista nominal</th>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                        <th>Votación PRI</th>
                        <th>Abstencionismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $ii = 0;
                    $vl = 0;
                    $vn = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    $vlT = 0;
                    $vnT = 0;
                    $vvT = 0;
                    $veT = 0;
                    $vpT = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2012; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $vlT += $res->lista_nominal;
                    $vnT += $res->votacion_nula;
                    $vvT += $res->votacion_valida;
                    $veT += $res->votacion_emitida;
                    $vpT += $res->pri;
                    $row[$i] = $res->seccion;
                    if ($i == 0) {
                        $vl += $res->lista_nominal;
                        $vn += $res->votacion_nula;
                        $vv += $res->votacion_valida;
                        $ve += $res->votacion_emitida;
                        $vp += $res->pri;
                    } else {
                        if ($row[$i] != $row[$i - 1]) {
                            ?>
                    <tr onclick="graficaE(2012,<?php echo e($row[$i-1]); ?>,'resultados',<?php echo $vl; ?>,<?php echo $vn; ?>,<?php echo $vv; ?>,<?php echo $ve; ?>,<?php echo $vp; ?>,<?php echo $vv-$vp; ?>,<?php echo $vl-$ve; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                    <?php $x['gan'][$ii]=$res->ganador('2012',$row[$i-1]);$x['res'][$ii]=$res->seccion('2012',$row[$i-1]);$x['secc'][$ii]=$row[$i-1];$x['vl'][$ii]=$vl;$x['vn'][$ii]=$vn;$x['vv'][$ii]=$vv;$x['ve'][$ii]=$ve;$x['vp'][$ii]=$vp;$ii++;?>
                                <td><?php echo $row[$i-1]; ?></td>
                                <td style="text-align: center"><?php echo $res->seccion('2012',$row[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $res->ganador('2012',$row[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $vl; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <?php if($vl>0): ?>
                                <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                                <?php else: ?>
                                <td style="text-align: center"><?php echo '0%'; ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $vl = $res->lista_nominal;
                            $vn = $res->votacion_nula;
                            $vv = $res->votacion_valida;
                            $ve = $res->votacion_emitida;
                            $vp = $res->pri;
                        } else {
                            $vl += $res->lista_nominal;
                            $vn += $res->votacion_nula;
                            $vv += $res->votacion_valida;
                            $ve += $res->votacion_emitida;
                            $vp += $res->pri;
                        }
                    }
                    $i++;
                    
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="graficaE(2012,<?php echo e($row[$i-1]); ?>,'resultados',<?php echo $vl; ?>,<?php echo $vn; ?>,<?php echo $vv; ?>,<?php echo $ve; ?>,<?php echo $vp; ?>,<?php echo $vv-$vp; ?>,<?php echo $vl-$ve; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <?php $seccion = SeccionesResultados::where('seccion',$row[$i-1])->where('anio',2012)->first();
                        if(count($seccion)>0){
                            $sec = $seccion->resultado;
                            $gan = $seccion->ganador;
                        }
                        else{
                            $sec = 'Indefinido';
                            $gan = 'Indefinido';
                        }?>
                        <?php $x['gan'][$ii]=$gan;$x['res'][$ii]=$sec;$x['secc'][$ii]=$row[$i-1];$x['vl'][$ii]=$vl;$x['vn'][$ii]=$vn;$x['vv'][$ii]=$vv;$x['ve'][$ii]=$ve;$x['vp'][$ii]=$vp;$ii++;?>
                        <td><?php echo $row[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $sec; ?></td>
                        <td style="text-align: center"><?php echo $gan; ?></td>
                        <td style="text-align: center"><?php echo $vl; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <?php if($vl>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                <tfoot>
                    <tr>
                        <td style="text-align: center"><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g12); ?> / P: <?php echo number_format($p12); ?></b></td>
                        <td></td>
                        <?php $xvlT=$vlT;$xvnT=$vnT;$xvvT=$vvT;$xveT=$veT;$xvpT=$vpT;?>
                        <td style="text-align: center"><b><?php echo number_format($vlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($veT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($veT/$vlT)*100,2); ?>%</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="2015G" class="tab-pane fade" style="padding-bottom: 0px;">
            <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Lista nominal</th>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                        <th>Votación PRI</th>
                        <th>Votos necesarios 2018</th>
                        <th>Abstencionismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $ii = 0;
                    $vl = 0;
                    $vn = 0;
                    $vv = 0;
                    $ve = 0;
                    $vp = 0;
                    $vlT = 0;
                    $vnT = 0;
                    $vvT = 0;
                    $veT = 0;
                    $vpT = 0;
                    ?>
                    <?php $__currentLoopData = $resultados2015; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $vlT += $res2->lista_nominal;
                    $vnT += $res2->votacion_nula;
                    $vvT += $res2->votacion_valida;
                    $veT += $res2->votacion_emitida;
                    $vpT += $res2->pri;
                    $row2[$i] = $res2->seccion;
                    if ($i == 0) {
                        $vl += $res2->lista_nominal;
                        $vn += $res2->votacion_nula;
                        $vv += $res2->votacion_valida;
                        $ve += $res2->votacion_emitida;
                        $vp += $res2->pri;
                    } else {
                        if ($row2[$i] != $row2[$i - 1]) {
                            ?>
                            <tr onclick="graficaE(2015,<?php echo e($row2[$i-1]); ?>,'resultados',<?php echo $vl; ?>,<?php echo $vn; ?>,<?php echo $vv; ?>,<?php echo $ve; ?>,<?php echo $vp; ?>,<?php echo $vv-$vp; ?>,<?php echo $vl-$ve; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                                <?php $x2['gan'][$ii]=$res->ganador('2015',$row2[$i-1]);$x2['res'][$ii]=$res->seccion('2015',$row2[$i-1]);$x2['secc'][$ii]=$row2[$i-1];$x2['vl'][$ii]=$vl;$x2['vn'][$ii]=$vn;$x2['vv'][$ii]=$vv;$x2['ve'][$ii]=$ve;$x2['vp'][$ii]=$vp;$ii++;?>
                                <td><?php echo $row2[$i-1]; ?></td>
                                <td style="text-align: center"><?php echo $res->seccion('2015',$row2[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $res->ganador('2015',$row2[$i-1]); ?></td>
                                <td style="text-align: center"><?php echo $vl; ?></td>
                                <td style="text-align: center"><?php echo $vn; ?></td>
                                <td style="text-align: center"><?php echo $vv; ?></td>
                                <td style="text-align: center"><?php echo $ve; ?></td>
                                <td style="text-align: center"><?php echo $vp; ?></td>
                                <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                                <?php if($vl>0): ?>
                                <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                                <?php else: ?>
                                <td style="text-align: center"><?php echo '0%'; ?></td>
                                <?php endif; ?>
                            </tr>
                            </tr>
                            <?php
                            $vl = $res2->lista_nominal;
                            $vn = $res2->votacion_nula;
                            $vv = $res2->votacion_valida;
                            $ve = $res2->votacion_emitida;
                            $vp = $res2->pri;
                        } else {
                            $vl += $res2->lista_nominal;
                            $vn += $res2->votacion_nula;
                            $vv += $res2->votacion_valida;
                            $ve += $res2->votacion_emitida;
                            $vp += $res2->pri;
                        }
                    }
                    $i++;
                    
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="graficaE(2015,<?php echo e($row2[$i-1]); ?>,'resultados',<?php echo $vl; ?>,<?php echo $vn; ?>,<?php echo $vv; ?>,<?php echo $ve; ?>,<?php echo $vp; ?>,<?php echo $vv-$vp; ?>,<?php echo $vl-$ve; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <?php $seccion = SeccionesResultados::where('seccion',$row2[$i-1])->where('anio',2015)->first();
                        if(count($seccion)>0){
                            $sec = $seccion->resultado;
                            $gan = $seccion->ganador;
                        }
                        else{
                            $sec = 'Indefinido';
                            $gan = 'Indefinido';
                        }?>
                        <?php $x2['gan'][$ii]=$gan;$x2['res'][$ii]=$sec;$x2['secc'][$ii]=$row2[$i-1];$x2['vl'][$ii]=$vl;$x2['vn'][$ii]=$vn;$x2['vv'][$ii]=$vv;$x2['ve'][$ii]=$ve;$x2['vp'][$ii]=$vp;?>
                        <td><?php echo $row2[$i-1]; ?></td>
                        <td style="text-align: center"><?php echo $sec; ?></td>
                        <td style="text-align: center"><?php echo $gan; ?></td>
                        <td style="text-align: center"><?php echo $vl; ?></td>
                        <td style="text-align: center"><?php echo $vn; ?></td>
                        <td style="text-align: center"><?php echo $vv; ?></td>
                        <td style="text-align: center"><?php echo $ve; ?></td>
                        <td style="text-align: center"><?php echo $vp; ?></td>
                        <td style="text-align: center"><?php echo $vv-$vp; ?></td>
                        <?php if($vl>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($ve/$vl)*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                <tfoot>
                    <tr>
                        <td><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g15); ?> / P: <?php echo number_format($p15); ?></b></td>
                        <td></td>
                        <?php $x2vlT=$vlT;$x2vnT=$vnT;$x2vvT=$vvT;$x2veT=$veT;$x2vpT=$vpT;?>
                        <td style="text-align: center"><b><?php echo number_format($vlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($veT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($vpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($meta); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($veT/$vlT)*100,2); ?>%</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="comp" class="tab-pane fade" style="padding-bottom: 0px;">
            <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Año</th>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Lista nominal</th>
                        <th>Votos nulos</th>
                        <th>Votación válida emitida</th>
                        <th>Votación emitida</th>
                        <th>Votación PRI</th>
                        <th>Abstencionismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $x['vl']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $secc=$x['secc'][$i];$xvn=$x['vn'][$i];$xvv=$x['vv'][$i];$xve=$x['ve'][$i];$xvp=$x['vp'][$i];
                    $x2vl=$x2['vl'][$i];$x2vn=$x2['vn'][$i];$x2vv=$x2['vv'][$i];$x2ve=$x2['ve'][$i];$x2vp=$x2['vp'][$i];?>
                    <tr onclick="graficaComp(<?php echo $secc; ?>,'resultados',<?php echo $xvl; ?>,<?php echo $xvn; ?>,<?php echo $xvv; ?>,<?php echo $xve; ?>,<?php echo $xvp; ?>,<?php echo $x2vl; ?>,<?php echo $x2vn; ?>,<?php echo $x2vv; ?>,<?php echo $x2ve; ?>,<?php echo $x2vp; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <td>2012</td>
                        <td><?php echo $x['secc'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['res'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['gan'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['vl'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['vn'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['vv'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['ve'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x['vp'][$i]; ?></td>
                        <?php if($x['vl'][$i]>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($x['ve'][$i]/$x['vl'][$i])*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr onclick="graficaComp(<?php echo $secc; ?>,'resultados',<?php echo $xvl; ?>,<?php echo $xvn; ?>,<?php echo $xvv; ?>,<?php echo $xve; ?>,<?php echo $xvp; ?>,<?php echo $x2vl; ?>,<?php echo $x2vn; ?>,<?php echo $x2vv; ?>,<?php echo $x2ve; ?>,<?php echo $x2vp; ?>)" style="cursor:pointer" class="jumper" href="#resultados">
                        <td>2015</td>
                        <td><?php echo $x2['secc'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['res'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['gan'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['vl'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['vn'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['vv'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['ve'][$i]; ?></td>
                        <td style="text-align: center"><?php echo $x2['vp'][$i]; ?></td>
                        <?php if($x2['vl'][$i]>0): ?>
                        <td style="text-align: center"><?php echo 100 - round(($x2['ve'][$i]/$x2['vl'][$i])*100,2); ?>%</td>
                        <?php else: ?>
                        <td style="text-align: center"><?php echo '0%'; ?></td>
                        <?php endif; ?>
                    </tr>
                    <?php
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <tfoot>
                    <tr>
                        <td><b>2012</b></td>
                        <td><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g12); ?> / P: <?php echo number_format($p12); ?></b></td>
                        <td></td>
                        <td style="text-align: center"><b><?php echo number_format($xvlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($xvnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($xvvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($xveT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($xvpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($xveT/$xvlT)*100,2); ?>%</b></td>
                    </tr>
                    <tr>
                        <td><b>2015</b></td>
                        <td><b>Totales</b></td>
                        <td><b>G: <?php echo number_format($g15); ?> / P: <?php echo number_format($p15); ?></b></td>
                        <td></td>
                        <td style="text-align: center"><b><?php echo number_format($x2vlT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($x2vnT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($x2vvT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($x2veT); ?></b></td>
                        <td style="text-align: center"><b><?php echo number_format($x2vpT); ?></b></td>
                        <td style="text-align: center"><b><?php echo 100 - round(($x2veT/$x2vlT)*100,2); ?>%</b></td>
                    </tr>                
                </tfoot>
            </table>
        </div>
        <div id="colonias" class="tab-pane fade" style="padding-bottom: 0px;">
            <table class="table table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                    <tr>
                        <th>Sección</th>
                        <th>Ganada ó Perdida</th>
                        <th>Ganada por</th>
                        <th>Colonia</th>
                        <th>Nivel socioeconómico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0; $color1 = 'background-color:#f3f3f3'; $color2 = '';?>
                    <?php $__currentLoopData = $resultados2015; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $rowC[$i] = $res2->seccion;   
                    if($i==0){
                    $color = $color1;
                    $colonias = $res2->colonias();
                    if(count($colonias)>0){
                        $c=0;
                        foreach ($colonias as $colonia){
//                            dd($colonia);
                           ?>         
                            <tr>
                                <?php if($c==0): ?>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion; ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion('2015',$res2->seccion); ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->ganador('2015',$res2->seccion); ?></td>
                                <?php else: ?>
                                <td style="<?php echo e($color); ?>"></td>
                                <td style="<?php echo e($color); ?>"></td>
                                <td style="<?php echo e($color); ?>"></td>
                                <?php endif; ?>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $colonia->colonia; ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $colonia->nivel()->nivel; ?></td>
                            </tr>
                    <?php
                    $c++;
                        }
                    }
                    else{
                        ?>
                            <tr>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion; ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion('2015',$res2->seccion); ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->ganador('2015',$res2->seccion); ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"></td>
                                <td style="text-align: center; <?php echo e($color); ?>"></td>
                            </tr>
                        <?php
                    }
                    }
                    else{
                        if ($rowC[$i] != $rowC[$i - 1]) {
                             $colonias = $res2->colonias();
                             
                            if($color == $color1)  $color = $color2; else $color = $color1;
                    if(count($colonias)>0){
                        $c=0;
                        foreach ($colonias as $colonia){
//                            dd($colonia);
                           ?>         
                            <tr>
                                <?php if($c==0): ?>
                                <td style="border-top: solid 1px;text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion; ?></td>
                                <td style="border-top: solid 1px;text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion('2015',$res2->seccion); ?></td>
                                <td style="border-top: solid 1px;text-align: center; <?php echo e($color); ?>"><?php echo $res2->ganador('2015',$res2->seccion); ?></td>
                                <td style="border-top: solid 1px;text-align: center; <?php echo e($color); ?>"><?php echo $colonia->colonia; ?></td>
                                <td style="border-top: solid 1px;text-align: center; <?php echo e($color); ?>"><?php echo $colonia->nivel()->nivel; ?></td>
                                <?php else: ?>
                                <td style="<?php echo e($color); ?>"></td>
                                <td style="<?php echo e($color); ?>"></td>
                                <td style="<?php echo e($color); ?>"></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $colonia->colonia; ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $colonia->nivel()->nivel; ?></td>
                                <?php endif; ?>
                            </tr>
                    <?php
                        $c++;
                        }
                    }
                    else{
                        ?>
                            <tr>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion; ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->seccion('2015',$res2->seccion); ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"><?php echo $res2->ganador('2015',$res2->seccion); ?></td>
                                <td style="text-align: center; <?php echo e($color); ?>"></td>
                                <td style="text-align: center; <?php echo e($color); ?>"></td>
                            </tr>
                        <?php
                    }
                        }
                    }
                    $i++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
               
            </table>
        </div>
    </div>
    <!--</div>-->
</div>    
<?php echo $__env->make('resultados.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>