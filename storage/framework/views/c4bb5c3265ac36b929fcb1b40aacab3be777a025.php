<?php 
use App\Models\partidos\Partidos;
use App\Models\partidos\PartidosTotales;
use App\Models\Programas;
use App\Models\BeneficiariosProgTot;
use App\Models\PromovidosTotales;
use App\Models\PromotoresTotales;
?>


<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<script type="text/javascript">
    
$(function () {    
    
    <?php 
        $sumPromTot = 0;
        $promovidos = PromovidosTotales::where('municipio',$mun_id)->where('total','>',0)->whereIn('programa',[1,2,3,4,5,6,7,8,9,10])->get();
        $valoresProm='';
        foreach($promovidos as $prom){ 
            $valoresProm.= "{name:'".$prom->programa()->nombre."',data:[".$prom->total."]},";
            $sumPromTot += $prom->total;
        }  
        ?>
        Highcharts.chart('promovidosProgramas', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 20
                }
                
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: '<b style="color:black"><a href="<?php echo e(url('/mesa2/0')); ?>" style="color:blue;">PERSONAS PROMOVIDAS POR PROGRAMA</a></b>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumPromTot)) ?> personas con programa'
            },
            xAxis: {
                categories: [
                    'Programas',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Número de personas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px;color:black">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0;color:black"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true
            },
            plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                },
                shadow: {
                    offsetX: 1,
                    offsetY: -1,
                    width: 5,
                    opacity: 0.1
                },
                states: {
                    hover: {
                        brightness: 0.2
                    }
                }
            }
        },
            series: [<?php 
                        echo $valoresProm;                        
                    ?>]
        });  
        <?php 
        $sumPromPartTot = 0;
        $promovidosPart = PartidosTotales::where('municipio',$mun_id)->where('total','>',0)->where('programa',12)->get();
        $valoresPromPart='';
        $coloresPromPart='';
        foreach($promovidosPart as $promPart){ 
            $valoresPromPart.= "{name:'".$promPart->partido()->partido."',data:[".$promPart->total."]},";
            $sumPromPartTot += $promPart->total;
            $coloresPromPart .= $promPart->partido()->color.",";
        }  
        ?>
        Highcharts.chart('promovidosPartidos', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 20
                }
                
            },
            colors: [<?php echo $coloresPromPart ?>],
            title: {
                text: '<b style="color:black">PROMOVIDOS AFILIADOS A PARTIDOS POLÍTICOS</b>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumPromPartTot)) ?> personas afiliadas'
            },
            xAxis: {
                categories: [
                    'Partidos',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Número de personas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px;color:black">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0;color:black"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true
            },
            plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                },
                shadow: {
                    offsetX: 1,
                    offsetY: -1,
                    width: 5,
                    opacity: 0.1
                },
                states: {
                    hover: {
                        brightness: 0.2
                    }
                }
            }
        },
            series: [<?php 
                        echo $valoresPromPart;                        
                    ?>]
        });
        
    
    
    <?php 
        $sumPromTot = 0;
        $promovidos = PromotoresTotales::where('municipio',$mun_id)->where('total','>',0)->whereIn('programa',[1,2,3,4,5,6,7,8,9,10])->get();
        $valoresProm='';
        foreach($promovidos as $prom){ 
            $valoresProm.= "{name:'".$prom->programa()->nombre."',data:[".$prom->total."]},";
            $sumPromTot += $prom->total;
        }  
        ?>
        Highcharts.chart('promotoresProgramas', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 20
                }
                
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: '<b style="color:black"><a href="<?php echo e(url('/mesa2/0')); ?>" style="color:blue;">PROMOTORES POR PROGRAMA</a></b>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumPromTot)) ?> personas con programa'
            },
            xAxis: {
                categories: [
                    'Programas',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Número de personas'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px;color:black">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0;color:black"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: true
            },
            plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                },
                shadow: {
                    offsetX: 1,
                    offsetY: -1,
                    width: 5,
                    opacity: 0.1
                },
                states: {
                    hover: {
                        brightness: 0.2
                    }
                }
            }
        },
            series: [<?php 
                        echo $valoresProm;                        
                    ?>]
        }); 
        
}); 
</script>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">
        
        <div class="row" style="margin: 2% 0 2% 0;">
            <div class="col-lg-10">
                <section>
                    <div class="widget-body">
                        <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                            <h3>MESA 2 - Promoción y Movilización</h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>        
        
        
            
    <div class="row ng-scope">
            <div class="col-md-12">
                <div class="clearfix col-lg-offset-3">
                    <table class="col-lg-5 col-md-5" style="margin: 5%;">
                        <tr>
                            <td><label for="municipio" class="control-label">Seleccione un municipio:</label></td>         
                            <td><?php echo Form::select('municipio',$municipios,$mun_id,['class'=>'form-control SelectAuto','placeholder'=>'Seleccione un municipio...','required','id'=>'municipio','onChange'=>'getMesa2()']); ?></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
        
        
          <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">
        
          
          <div class="col-lg-10 col-md-10 ">    
                    <section class="widget  col-lg-7 col-md-7" style="background: none;">
                        <header>
                            <h4>ESTRUCTURA ELECTORAL: 14,542</h4>
                            <hr class="col-md-10">
                        </header>
                        <div>
                            
                                <img class="col-lg-12 col-md-12 " src="<?php echo e(url(asset('img/estructura_promocion.png'))); ?>">
                            
                        </div>
                    </section>
                </div>  
    
                    
          
            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="promovidosProgramas" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
          
          <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="promovidosPartidos" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
          
          <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="promotoresProgramas" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
           

    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>
<?php echo $__env->make('modalficha', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>