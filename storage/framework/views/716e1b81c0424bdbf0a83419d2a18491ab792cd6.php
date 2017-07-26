<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<script type="text/javascript">

$(function () {
    Highcharts.getOptions().colors = Highcharts.map(['#03a678','#9e392f','#6e6e6e','#d95244','#4e1972','#c4d0d0','#a0ec95'], function (color) {
    return {
        radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
        },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});
    // Build the chart
    Highcharts.chart('grafica', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<b>Distribución por tipo de Contratación</b>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Porcentaje',
            data: [
<?php $pt=0;
            foreach ($personalTOrd as $perTOrd){
                if($pt==0){
                    echo "{ name: '".$perTOrd->tipo."', y: ".round($perTOrd->empleados/$personalTSum*100,2).", sliced: true, selected: true },";
                }
                else{
                    echo "{ name: '".$perTOrd->tipo."', y: ".round($perTOrd->empleados/$personalTSum*100,2)." },";
                }
                $pt++;
            }
?>
//                { name: 'Pobl. sin rezago educativo', y: 80, sliced: true, selected: true },
//                { name: 'Pobl. con rezago educativo', y: 20 },
            ]
        }]
    });
});
</script>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">

        <h1 class="page-title ng-scope"><span class="fw-semi-bold">Resumen de Plantillas</span></h1>
        <div class="row ng-scope">
            <div class="col-md-11">
                <div class="clearfix">
                    <div>
                        <h2>Resumen de Personal por Poder / Entidad</h2>
                    </div>
                    <hr>
                    <div class="row ng-scope">
                        <div class="col-md-11">
                            <section class="widget">
                                <header>
                                    <h6>Información obtenida del reporte de INEGI 2016</h6>
                                </header>
                                <div class="widget-body">
                                    <div class="stats-row">
                                        <table class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                                            <thead style="background-color: #03A678; color: #fff; font-size:0.7em;">
                                            <th>Poder</th>
                                            <th>Tipo</th>
                                            <th>Comentario</th>
                                            <th>Número</th>
                                            <th>%</th>
                                            </thead>
                                            <tbody>
                                               <?php $row=0; ?>
                                               <?php $__currentLoopData = $personalPoder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perPod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php 
                                               $auxP[$row]=$perPod->poder;
                                               $auxT[$row]=$perPod->tipo;
                                               ?>
                                               <tr>
                                                   <?php if($row==0): ?> 
                                                   <td rowspan="<?php echo $perPod->rowP; ?>" style="vertical-align: middle"><?php echo $perPod->poder; ?></td>
                                                       <td rowspan="<?php echo $perPod->rowT; ?>" style="vertical-align: middle"><?php echo $perPod->tipo; ?></td>
                                                       <td><?php echo $perPod->comentario; ?></td>
                                                       <td><?php echo number_format($perPod->numero); ?></td>
                                                       <td><?php echo round($perPod->numero/$personalPSum*100,2); ?></td>
                                                   <?php else: ?>
                                                       <?php if($auxP[$row]!=$auxP[$row-1]): ?>
                                                           <td rowspan="<?php echo $perPod->rowP; ?>" style="vertical-align: middle"><?php echo $perPod->poder; ?></td>
                                                           <?php if($auxT[$row]!=$auxT[$row-1]): ?>
                                                               <td rowspan="<?php echo $perPod->rowT; ?>" style="vertical-align: middle"><?php echo $perPod->tipo; ?></td>
                                                               <td><?php echo $perPod->comentario; ?></td>
                                                               <td><?php echo number_format($perPod->numero); ?></td>
                                                               <td><?php echo round($perPod->numero/$personalPSum*100,2); ?>%</td>
                                                           <?php else: ?>
                                                               <td><?php echo $perPod->comentario; ?></td>
                                                               <td><?php echo number_format($perPod->numero); ?></td>
                                                               <td><?php echo round($perPod->numero/$personalPSum*100,2); ?>%</td>
                                                           <?php endif; ?>
                                                       <?php else: ?>
                                                           <?php if($auxT[$row]!=$auxT[$row-1]): ?>
                                                               <td rowspan="<?php echo $perPod->rowT; ?>" style="vertical-align: middle"><?php echo $perPod->tipo; ?></td>
                                                               <td><?php echo $perPod->comentario; ?></td>
                                                               <td><?php echo number_format($perPod->numero); ?></td>
                                                               <td><?php echo round($perPod->numero/$personalPSum*100,2); ?>%</td>
                                                           <?php else: ?>
                                                               <td><?php echo $perPod->comentario; ?></td>
                                                               <td><?php echo number_format($perPod->numero); ?></td>
                                                               <td><?php echo round($perPod->numero/$personalPSum*100,2); ?>%</td>
                                                           <?php endif; ?>
                                                       <?php endif; ?>
                                                   <?php endif; ?>
                                               </tr>
                                               <?php $row++; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                                                <tr>
                                                    <td colspan="3" style="text-align: center"><b>Gran Total</b></td>
                                                    <td><b><?php echo number_format($personalPSum); ?></b></td>
                                                    <td><b>100%</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-11">
                <p>*Faltan organismos autónomos.</p>
            </div>
            
            <div class="col-md-11">
                <div class="clearfix">
<!--                    <div>
                        <h2>Resumen de Personal por Poder / Entidad</h2>
                    </div>-->
                    <hr>
                    <div class="row ng-scope">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-9">
                            <section class="widget">
<!--                                <header>
                                    <h6>Información obtenida del reporte de INEGI 2016</h6>
                                </header>-->
                                <div class="widget-body">
                                    <div class="stats-row">
                                        <table class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                                            <thead style="background-color: #03A678; color: #fff; font-size:0.7em;">
                                            <th>Tipo</th>
                                            <th>Número empleados</th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $personalTipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perTipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo $perTipo->tipo; ?></td>
                                                    <td><?php echo number_format($perTipo->empleados); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><b>Gran Total</b></td>
                                                    <td><b><?php echo number_format($personalTSum); ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11">
                <div class="clearfix">
<!--                    <div>
                        <h2>Resumen de Personal por Poder / Entidad</h2>
                    </div>-->
                    <hr>
                    <div class="row ng-scope">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-9">
                            <section class="widget">
<!--                                <header>
                                    <h6>Información obtenida del reporte de INEGI 2016</h6>
                                </header>-->
                                <div class="widget-body">
                                    <div class="stats-row">
                                        <div id="grafica">
                                            
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-11">
                <div class="clearfix">
                    <div><h2>Desglose por Dependencia - Entidad</h2></div><hr>
                </div>
                <div class="row ng-scope">
                    
                    <div class="col-md-11">
                        <section class="widget">
                            <!--                                <header>
                                                                <h6>Información obtenida del reporte de INEGI 2016</h6>
                                                            </header>-->
                            <div class="widget-body">
                                <div class="stats-row">
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
                        </section>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
        </div>
    </main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>