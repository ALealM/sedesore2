<?php 
use App\Models\Municipio;
use App\Models\partidos\Partidos;
use App\Models\partidos\PartidosTotales;
use App\Models\Programas;
use App\Models\BeneficiariosProgTot;
use App\Models\PromovidosTotales;
use App\Models\PromotoresTotales;
use App\Models\PosiblesAdscritos;
use App\Models\MunicipioPrograma;
use App\Models\ResultadoElectoral;
?>


<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<?php 
$grafTop = '';
$grafZM = '';
$top10 = Municipio::select('id','municipio','padron')->orderBy('padron','desc')->limit(10)->get();
$top10id = Municipio::orderBy('padron','desc')->limit(10)->pluck('id');
$topProg = Programas::where('descripcion','Programa')->get();
$i=0;
foreach ($topProg as $tP){
    $top[$i]['cant'] = MunicipioPrograma::whereIn('id_municipio',$top10id)->where('id_programa',$tP->id)->sum('total_beneficiarios');
    $top[$i]['nom'] = $tP->nombre;
    $i++;
}
$i=0;
foreach ($topProg as $tP){
    $zm[$i]['cant'] = MunicipioPrograma::whereIn('id_municipio',[28,35,55,9])->where('id_programa',$tP->id)->sum('total_beneficiarios');
    $zm[$i]['nom'] = $tP->nombre;
    $i++;
}
foreach ($top as $key => $row) {
    $auxTop[$key] = $row['cant'];
}
array_multisort($auxTop, SORT_ASC, $top);
foreach ($zm as $key => $row) {
    $auxZm[$key] = $row['cant'];
}
array_multisort($auxZm, SORT_ASC, $zm);
foreach ($top as $top_){
    if($top_['cant'] > 0)
    $grafTop .= "{name: '".$top_['nom']."',y: ".$top_['cant']."},";
}
foreach ($zm as $zm_){
    if($zm_['cant'] > 0)
    $grafZM .= "{name: '".$zm_['nom']."',y: ".$zm_['cant']."},";
}

?>
    <script>
    
    
 $(document).ready(function () {

// Build the chart
        Highcharts.chart('top10', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#03A678', '#555', '#C0392B', '#ABB7B7', '#68C3A3', '#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            legend: {
                align: 'left',
                verticalAlign: 'top',
                layout: 'vertical',
                x: 100,
                y: 100
            },
            title: {
                text: 'Total de beneficiarios por programa en los 10 principales municipios'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    name: 'Beneficiarios',
                    colorByPoint: true,
                    data: [<?php echo $grafTop; ?>]
                }]
        });
    });

 
$(document).ready(function () {

// Build the chart
        Highcharts.chart('zonaMet', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#03A678', '#555', '#C0392B', '#ABB7B7', '#68C3A3', '#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            legend: {
                align: 'left',
                verticalAlign: 'top',
                layout: 'vertical',
                x: 100,
                y: 100
            },
            title: {
                text: 'Total de beneficiarios por programa en Zona Metropolitana'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    name: 'Beneficiarios',
                    colorByPoint: true,
                    data: [<?php echo $grafZM; ?>]
                }]
        });
    });
    
    </script>





<script>
    
    
$(function () {    




Highcharts.chart('representantesDiferencia', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Diferencia de representantes de casilla (2015 - 2018)'
            },
            subtitle: {
                text: 'Total: 1,842 representantes'
            },
            tooltip: {
                style: {'color': '#333'}
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
                    name: 'Total',
                    data: [
                        ['Nuevos en 2018', 770],
                        ['Desde 2015', 1072]
                    ]
                }]
        });  
        
        
        
        Highcharts.chart('partidos_personas', {
            chart: {
                type: 'column',
                plotBackgroundColor: '#fff',
                options3d: {
                    enabled: false,
                    alpha: 20
                }
                
            },
            colors: ['#1f4187', '#e0ac00', '#49a03e', '#14959b', '#ce7a37','#682d7a','#c0392b'],
            title: {
                text: '<b>PARTIDOS</b>',
                style: {'color': '#333'}
            },
            subtitle: {
                text: '<b>Totales de personas pertenecientes a cada partido</b>'
            },
            xAxis: {
                categories: [
                    'Partidos políticos',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total de personas'
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
            series: [{
                    name: 'PAN',
                    data:
                        [<?php echo $partidos[0] ?>]
                },{
                    name: 'PRD',
                    data: 
                        [<?php echo $partidos[1] ?>]
                },{
                    name: 'PVEM',
                    data: 
                        [<?php echo $partidos[2] ?>]
                },{
                    name: 'PANAL',
                    data: 
                        [<?php echo $partidos[3] ?>]
                },{
                    name: 'MOV CIUD',
                    data: 
                        [<?php echo $partidos[4] ?>]
                },{
                    name: 'ENC SOC',
                    data: 
                        [<?php echo $partidos[5] ?>]
                },{
                    name: 'PRI',
                    data: 
                        [<?php echo $partidos[6] ?>]
                }]
        });
        
 <?php 
        $progr = Programas::where('descripcion','Programa')->pluck('id');
            $sumPartTot = 0;
            $programasPart = PartidosTotales::where('municipio',$mun_id)->whereIn('programa',$progr)->where('partido',7)->where('total','>',0)->get();
            $valores='';
            //$colores='';
            //$color= ['#1f4187', '#e0ac00', '#49a03e', '#14959b', '#ce7a37','#682d7a','#c0392b'];
            $i=0;
            foreach($programasPart as $programasP){ 
                $valores.= "{name:'".$programasP->programa()->nombre."',data:[".$programasP->total."]},";
                
                $sumPartTot += $programasP->total;
                $i++;
            } 
            $PartSinBen = $partidos[6] - $sumPartTot;
            $partidoNombre = Partidos::where('id',7)->first();
        ?>
                
               
        Highcharts.chart('totalesProgPart7', {
            chart: {
                plotBackgroundColor: '#fff',
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column'
            },
            colors: [<?php echo $partidoNombre->colores ?>],
            title: {
                text: '<b><?php echo strtoupper($partidoNombre->descripcion) ?></b>',
                style: {'color': '#333'}
            },
            subtitle: {
                text: '<b>Total <?php echo (number_format($partidos[6])) ?> personas</b>'
            },
            xAxis: {
                categories: [
                    'Programas Sociales'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total de personas'
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
            series: [
                        <?php 
                            echo $valores;                        
                        ?>
                        {
                    name: 'Sin beneficio',
                    data: 
                        [<?php echo $PartSinBen ?>]
                }
                 ]
                
        });  
        
        <?php
                $sumRepPartTot = 0;
        $repPart = PartidosTotales::where('municipio',$mun_id)->where('total','>',0)->where('programa',14)->get();
        $valoresRepPart='';
        $coloresRepPart='';
        foreach($repPart as $rPart){ 
            $valoresRepPart.= "{name:'".$rPart->partido()->partido."',data:[".$rPart->total."]},";
            $sumRepPartTot += $rPart->total;
            $coloresRepPart .= $rPart->partido()->color.",";
        }  
        ?>
        Highcharts.chart('representantesPartidos', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: false,
                    alpha: 20
                }
                
            },
            colors: [<?php echo $coloresRepPart ?>],
            title: {
                text: '<b style="color:black">REPRESENTANTES DE CASILLA AFILIADOS A PARTIDOS POLÍTICOS</b>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumRepPartTot)) ?> representantes afiliados'
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
                    text: 'Número de representantes'
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
                        echo $valoresRepPart;                        
                    ?>]
        });   
});    







$(function () {    
Highcharts.chart('partidos_poblacion', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#c13128','#00a4ac','#e0ac00','#49a03e','#c0392b','#1f4187'],
    legend: {
           align: 'left',
           verticalAlign: 'top',
           layout: 'vertical',
           x: 70,
           y: 110
       },
    title: {
        text: 'Total de población por partido'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45,
            showInLegend: true
        }
    },
    series: [{
        name: 'Población:',
        data: [
            ['Morena', 5394],
            ['PNA', 9795],
            ['PRD', 16840],
            ['PVEM', 21185],
            ['PRI', 155808],
            ['PAN', 260157]
        ]
    }]
});
Highcharts.chart('coalisiones_poblacion', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#78233c','#ed9b2a','#222968','#8b2233','#c84c23','#ba3021','##b92d20','#eebd36','#6c5737','#933d60','#614463','#d8772d'],
    legend: {
           align: 'left',
           verticalAlign: 'top',
           layout: 'vertical',
           x: 70,
           y: 60
       },
    title: {
        text: 'Total de población por coalisión'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45,
            showInLegend: true
        }
    },
    series: [{
        name: 'Población:',
        data: [
            ['PRD-PT-PMC-PNA', 8196],
            ['PRD-PCP', 13361],
            ['PAN-PT', 13361],
            ['PRD-PT-PNA', 14359],
            ['PRD-PT-PCP-PMC', 15174],
            ['PT-PMC', 17592],
            ['PAN-PT-PMC', 37658],
            ['PRD-PMC', 41148],
            ['PRI-PVEM', 59317],
            ['PRI-PNA', 117000],
            ['PRI-PVEM-PNA', 343860],
            ['PRD-PT', 790120],  
        ]
    }]
});





<?php
        $posibles = PosiblesAdscritos::where('id_municipio',$mun_id)->first();
?>

Highcharts.chart('posibles_adscritos', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
       colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: 'ADSCRITOS AL PADRON PARA EL 2018'
    },
    subtitle: {
        text: 'Total: <?php echo number_format($posibles->total); ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
            showInLegend: true
        }
    },
    
    series: [
        { name: 'Genero', 
          colorByPoint: true, 
          data: [
            { name: 'Hombres', y: <?php echo $posibles->hombres; ?> },
            { name: 'Mujeres', y: <?php echo $posibles->mujeres; ?> }
            ] 
        }
    ]

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
                            <h3>MESA 3 - ELECTORAL</h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>        
        
        
        
    
    
    <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">
        
          
          <div class="col-lg-10 col-md-10 ">    
                    <section class="widget col-lg-offset-2 col-lg-8 col-md-8" style="background: none;">
                        <header>
                            <h4>ESTRUCTURA ELECTORAL: 14,542</h4>
                            <hr class="col-md-10">
                        </header>
                        <div>
                            
                            <img class="col-lg-12 col-md-12 " src="<?php echo e(url(asset('img/estructura_electoral.png'))); ?>">
                            
                        </div>
                    </section>
                </div>





         
    

        <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  

        <div class="row ng-scope">
            <div class="col-md-12">
                <div class="clearfix col-lg-offset-3">
                    <table class="col-lg-5 col-md-5" style="margin: 5%;">
                        <tr>
                            <td><label for="municipio" class="control-label">Seleccione un municipio:</label></td>         
                            <td><?php echo Form::select('municipio',$mun_list,$mun_id,['class'=>'form-control SelectAuto','placeholder'=>'Seleccione un municipio...','required','id'=>'municipio','onChange'=>'getMesa3('.$dist.','.$mun_id.')']); ?></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
        
        <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  
     
     
        <div class="row ng-scope">
          <div class="col-lg-10 col-md-10">
              <section style="background-color: #eeeeee; color:black;">
                  <header>
                      <h4>REPRESENTANTES DE CASILLA:</h4>
                  </header>


                  <div class="row ng-scope" style="background-color: #eeeeee; color:black;">
                      <div  class="col-lg-12">
                          <!---->
                          <div>
                              <div class="float-e-margins">
                                  <div class="">
                                      <div>
                                          <div id="representantesDiferencia" height="400" style="background-color: #eeeeee; color:black;"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
    
     <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  
     
     
        <div class="row ng-scope">
          <div class="col-lg-10 col-md-10">
              <section style="background-color: #eeeeee; color:black;">
                  <header>
                      <h4>REPRESENTANTES DE CASILLA Y PARTIDOS POLÍTICOS</h4>
                  </header>


                  <div class="row ng-scope" style="background-color: #eeeeee; color:black;">
                      <div  class="col-lg-12">
                          <!---->
                          <div>
                              <div class="float-e-margins">
                                  <div class="">
                                      <div>
                                          <div id="representantesPartidos" height="400" style="background-color: #eeeeee; color:black;"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      
 
     
     
      <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">
        
        

      <div class="row ng-scope">
          <div class="mt col-lg-10 col-md-10">
              <section class="widget" style="background: none;">
                  <header>
                      <h4>TOTAL DE POBLACIÓN GOBERNADA POR ALGÚN PARTIDO:</h4>
                  </header>


                  <div class="row ng-scope">
                      <div  class="col-lg-6">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id="partidos_poblacion" height="400"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div  class="col-lg-6">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id="coalisiones_poblacion" height="400"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>  

      <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  

      <div class="row ng-scope">
          <div class="mt col-lg-10 col-md-10">
              <section class="widget" style="background: none;">
                  <header>
                      <h4>POSIBLES ADSCRITOS AL PADRÓN PARA EL 2018:</h4>
                  </header>


                  <div class="row ng-scope">
                      <div  class="col-lg-12">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id="posibles_adscritos" height="400"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>  

      
<hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  



      
      <div class="row ng-scope">
          <div class="mt col-lg-10 col-md-10">
              <section class="widget" style="background: none;">
                  <header>
                      <h4>TOTAL DE MILITANTES EN PARTIDOS POLITICOS:</h4>
                  </header>


                  <div class="row ng-scope">
                      <div  class="col-lg-12">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id="partidos_personas" height="400"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      
      <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;"> 
      
      <div  class="col-lg-10">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id="totalesProgPart7" height="400"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                

    <div class="row ng-scope">
        
        <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  
                    
            <div class="row ng-scope col-lg-10 col-md-10" style="background-color: #313131; color:white;">
                        <div>
                            <section class="widget" style="background-color: #313131; color:white; text-align: center; margin: auto;">
                                <header>
                                    <h4>Resultados electorales y Representantes de Casilla</h4>
                                </header>
                            </section>
                        </div>
            </div>
        
    </div>
        <br>
    <div class="row ng-scope">
        <div class="col-lg-10 col-md-10">
            
            <div class="clearfix">
                <div><h2>Distritos electorales</h2></div><hr>
                <ul id="tabs1" class="nav nav-tabs pull-left col-lg-12 col-md-12">
                    
                    <?php if($dist==1): ?><li class="active jumper"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/1/<?php echo e($id_mun); ?>"  aria-expanded="true" style="cursor:pointer">I</a>
                    </li>
                    <?php if($dist==2): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/2/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">II</a>
                    </li>
                    <?php if($dist==3): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/3/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">III</a>
                    </li>
                    <?php if($dist==4): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/4/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">IV</a>
                    </li>
                    <?php if($dist==5): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/5/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">V</a>
                    </li>
                    <?php if($dist==6): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/6/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">VI</a>
                    </li>
                    <?php if($dist==7): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/7/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">VII</a>
                    </li>
                    <?php if($dist==8): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/8/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">VIII</a>
                    </li>
                    <?php if($dist==9): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/9/<?php echo e($id_mun); ?>"  aria-expanded="false" style="cursor:pointer">IX</a>
                    </li>
                    <?php if($dist==10): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/10/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">X</a>
                    </li>
                    <?php if($dist==11): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/11/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">XI</a>
                    </li>
                    <?php if($dist==12): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/12/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">XII</a>
                    </li>
                    <?php if($dist==13): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/13/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">XIII</a>
                    </li>
                    <?php if($dist==14): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/14/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">XIV</a>
                    </li>
                    <?php if($dist==15): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/15/<?php echo e($id_mun); ?>" d aria-expanded="false" style="cursor:pointer">XV</a>
                    </li>
                </ul>
            </div>

            <div id="tabs1c" class="tab-content">
                <div class="tab-pane clearfix active col-lg-12 col-md-12" id="tab<?php echo e($dist); ?>">
                    <h2><b>Distrito <?php echo e($dist); ?></b></h2><hr>
                    <h4>Coordinador local: <?php echo e($coord->nombre_completo); ?></h4>
                    <div class="mt col-lg-12 col-md-12">
                        <table class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info" id="accordion1" data-toggle="collapse">
                            <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                                <tr>
                                    <th></th>
                                    <th colspan="4" style="text-align: center">Secciones</th>
                                    <th colspan="4" style="text-align: center">Casillas</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Totales</th>
                                    <th>Ganadas</th>
                                    <th>Perdidas</th>
                                    <th>Resultado mixto</th>
                                    <th>Totales</th>
                                    <th>Ganadas</th>
                                    <th>Perdidas</th>
                                    <th>Empatadas</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $__currentLoopData = $municipios[$dist]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $m=Municipio::find($municipio); ?>
                                    <tr data-toggle="collapse" data-parent="#accordion<?php echo e($m->id); ?>" data-target="#collapseOne<?php echo e($m->id); ?>" aria-expanded="false" class="collapsed" style="cursor: pointer">
                                        <td><?php echo e($m->municipio); ?></td>
                                        <td><?php echo e($m->totales($dist)->sec_t); ?></td>
                                        <td><?php echo e($m->totales($dist)->sec_g); ?></td>
                                        <td><?php echo e($m->totales($dist)->sec_p); ?></td>
                                        <td><?php echo e($m->totales($dist)->sec_e + $m->totales($dist)->sec_m); ?></td>
                                        <td><?php echo e($m->totales($dist)->cas_t); ?></td>
                                        <td><?php echo e($m->totales($dist)->cas_g); ?></td>
                                        <td><?php echo e($m->totales($dist)->cas_p); ?></td>
                                        <td><?php echo e($m->totales($dist)->cas_e); ?></td>
                                    </tr>
                                    
                                    <tr id="collapseOne<?php echo e($m->id); ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;"> 
                                        <?php $totalrep=$m->totalrepresentantes($dist); ?>
                                        <td colspan="8">
                                            Total de representantes de casillas: <?php echo e($totalrep); ?>

                                            <div>
                                                <table class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                                                    <thead style="background-color: #FF0000; color: #000000; font-size:0.7em;">
                                                        
                                                        <th>seccion_casilla</th>
                                                        <th>Propietario 1</th>
                                                        <th>Propietario 2</th>
                                                        <th>Suplente 1</th>
                                                        <th>Suplente 2</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $m->totalCasillas($dist); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($casilla->seccion_casilla); ?></td>
                                                            <?php if( $casilla->r_propietario1()!=NULL ): ?> <td><?php echo e($casilla->r_propietario1()->nombre.' '.$casilla->r_propietario1()->ap_pat.' '.$casilla->r_propietario1()->ap_mat); ?></td> <?php else: ?> <td> ---- </td> <?php endif; ?>
                                                            <?php if( $casilla->r_propietario2()!=NULL ): ?> <td><?php echo e($casilla->r_propietario2()->nombre.' '.$casilla->r_propietario2()->ap_pat.' '.$casilla->r_propietario2()->ap_mat); ?></td> <?php else: ?> <td> ---- </td> <?php endif; ?> 
                                                            <?php if( $casilla->r_suplente1()!=NULL ): ?> <td><?php echo e($casilla->r_suplente1()->nombre.' '.$casilla->r_suplente1()->ap_pat.' '.$casilla->r_suplente1()->ap_mat); ?></td> <?php else: ?> <td> ---- </td> <?php endif; ?>
                                                            <?php if( $casilla->r_suplente2()!=NULL ): ?> <td><?php echo e($casilla->r_suplente2()->nombre.' '.$casilla->r_suplente2()->ap_pat.' '.$casilla->r_suplente2()->ap_mat); ?></td> <?php else: ?> <td> ---- </td> <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                         </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            
            

    </div>
</main>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>