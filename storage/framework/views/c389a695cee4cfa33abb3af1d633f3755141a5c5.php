<?php 
use App\Models\partidos\Partidos;
use App\Models\partidos\PartidosTotales;
use App\Models\Programas;
use App\Models\BeneficiariosProgTot;
use App\Models\PromovidosTotales;
use App\Models\PromotoresTotales;
use App\Models\CuartosRosas;
use App\Models\PersonalTipoEmpleado;
?>


<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(function () {


        if (!Highcharts.theme) {
            Highcharts.setOptions({
                chart: {
                    backgroundColor: 'none'
                },
                //colors:['#d0ece7','#a2d9ce','#73c6b6','#45b39d','#16a085','#138d75','#117a65','#0e6655','#0b5345','#e8f6f3'],
                colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3', '#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
                title: {
                    style: {
                        color: 'silver'
                    }
                },
                tooltip: {
                    style: {
                        color: 'silver'
                    }
                }
            });
        }
        Highcharts.chart('graficainversion', {

            chart: {
                type: 'solidgauge',
                marginTop: 50,
                backgroundColor: '#313131',
            },

            title: {
                text: 'Inversión',
                style: {
                    fontSize: '24px'
                }
            },

            tooltip: {
                borderWidth: 0,
                backgroundColor: 'none',
                shadow: false,
                style: {
                    fontSize: '16px',
                    color: '#fff'
                },
                pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
                positioner: function (labelWidth, labelHeight) {
                    return {
                        x: 450 - labelWidth / 2,
                        y: 25
                    };
                }
            },

            pane: {
                startAngle: 50,
                endAngle: 410,
                background: [
                    {// Track for Move
                        outerRadius: '109.5%',
                        innerRadius: '102.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '102%',
                        innerRadius: '95%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Stand
                        outerRadius: '94.5%',
                        innerRadius: '87.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '87%',
                        innerRadius: '80%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[3]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '79.5%',
                        innerRadius: '72.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[4]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '72%',
                        innerRadius: '65%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[5]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// ************************************************************************
                        outerRadius: '64.5%',
                        innerRadius: '57.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[6]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '57%',
                        innerRadius: '50%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[7]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Stand
                        outerRadius: '49.5%',
                        innerRadius: '42.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[8]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '42%',
                        innerRadius: '35%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[9]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '34.5%',
                        innerRadius: '27.5%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0.3).get(),
                        borderWidth: 0
                    }, {// Track for Exercise
                        outerRadius: '27%',
                        innerRadius: '20%',
                        backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1]).setOpacity(0.3).get(),
                        borderWidth: 0
                    },
                ]
            },

            yAxis: {
                min: 0,
                max: 100,
                lineWidth: 0,
                tickPositions: []
            },

            plotOptions: {
                solidgauge: {

                    dataLabels: {
                        enabled: false
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },

            series: [{
                    name: 'Servicios para<br>el empleo',
                    borderColor: Highcharts.getOptions().colors[0],
                    data: [{
                            color: Highcharts.getOptions().colors[0],
                            radius: '109.5%',
                            innerRadius: '109%',
                            y: 80
                        }]
                }, {
                    name: 'Servicios para<br>el empleo',
                    borderColor: Highcharts.getOptions().colors[1],
                    data: [{
                            color: Highcharts.getOptions().colors[1],
                            radius: '102%',
                            innerRadius: '95%',
                            y: 65
                        }]
                }, {
                    name: 'Servicios para<br>el empleo',
                    borderColor: Highcharts.getOptions().colors[2],
                    data: [{
                            color: Highcharts.getOptions().colors[2],
                            radius: '94.5%',
                            innerRadius: '87.5%',
                            y: 50
                        }]
                }, {
                    name: 'Servicios para<br>el empleo',
                    borderColor: Highcharts.getOptions().colors[3],
                    data: [{
                            color: Highcharts.getOptions().colors[3],
                            radius: '87%',
                            innerRadius: '80%',
                            y: 30
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[4],
                    data: [{
                            color: Highcharts.getOptions().colors[4],
                            radius: '79.5%',
                            innerRadius: '79%',
                            y: 23
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[5],
                    data: [{
                            color: Highcharts.getOptions().colors[5],
                            radius: '72%',
                            innerRadius: '65%',
                            y: 45
                        }]
                }, {//************************************************
                    name: 'Move',
                    borderColor: Highcharts.getOptions().colors[6],
                    data: [{
                            color: Highcharts.getOptions().colors[6],
                            radius: '64.5%',
                            innerRadius: '57.5%',
                            y: 94
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[7],
                    data: [{
                            color: Highcharts.getOptions().colors[7],
                            radius: '57%',
                            innerRadius: '50%',
                            y: 35
                        }]
                }, {
                    name: 'Stand',
                    borderColor: Highcharts.getOptions().colors[8],
                    data: [{
                            color: Highcharts.getOptions().colors[8],
                            radius: '49.5%',
                            innerRadius: '42.5%',
                            y: 67
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[9],
                    data: [{
                            color: Highcharts.getOptions().colors[9],
                            radius: '42%',
                            innerRadius: '35%',
                            y: 45
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[0],
                    data: [{
                            color: Highcharts.getOptions().colors[0],
                            radius: '34.5%',
                            innerRadius: '27.5%',
                            y: 34
                        }]
                }, {
                    name: 'Exercise',
                    borderColor: Highcharts.getOptions().colors[1],
                    data: [{
                            color: Highcharts.getOptions().colors[1],
                            radius: '27%',
                            innerRadius: '20%',
                            y: 65
                        }]
                }]
        },
                /**
                 * In the chart load callback, add icons on top of the circular shapes
                 */
                        function callback() {

                        });
            });
    /***__TERMINA GRAFICA DE INVERSION POR PROGRAMAS___***/



    /***__COMIENZA GRAFICA DE TOTAL BENEFICIARIOS POR PROGRAMA__***/
    $(function () {
    <?php foreach($programas as $prog){ ?>
        Highcharts.chart('totales<?php echo $prog->id_programa ?>', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: '<?php echo $prog->programa()->nombre ?>',
                style: {'color': '#333'}
            },
            subtitle: {
                text: 'Total <?php echo (number_format($prog->total_general*1)) ?> personas'
            },
            tooltip: {
                style: {'color': '#333'}
            },
            plotOptions: {
                pie: {
                    innerSize: 40,
                    depth: 45,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                    name: 'Total',
                    data: [
                        ['Beneficiarios', <?php echo $prog->total_beneficiarios*1 ?>],
                        ['No beneficiarios', <?php echo ($prog->total_general*1) - ($prog->total_beneficiarios*1) ?>]
                    ]
                }]
        });
        <?php } ?>
        
        Highcharts.chart('partidos', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
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
                }]
        });
        
        <?php 
        $prgPrti=0;
        $prgPrt=1;
        $progr = Programas::where('descripcion','Programa')->pluck('id');
        while($prgPrt<=6){
            $sumPartTot = 0;
            $programasPart = PartidosTotales::where('municipio',$mun_id)->whereIn('programa',$progr)->where('partido',$prgPrt)->where('total','>',0)->get();
            $valores='';
            //$colores='';
            //$color= ['#1f4187', '#e0ac00', '#49a03e', '#14959b', '#ce7a37','#682d7a','#c0392b'];
            $i=0;
            foreach($programasPart as $programasP){ 
                $valores.= "{name:'".$programasP->programa()->nombre."',data:[".$programasP->total."]},";
                
                $sumPartTot += $programasP->total;
                $i++;
            } 
            $PartSinBen = $partidos[$prgPrti] - $sumPartTot;
            $partidoNombre = Partidos::where('id',$prgPrt)->first();
            //$colores=$color[$prgPrti];
        ?>
             console.log(<?php echo $partidoNombre->colores ?>);   
        Highcharts.chart('totalesProgPart<?php echo $prgPrt ?>', {
            chart: {
                plotBackgroundColor: null,
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
                text: '<b>Total <?php echo (number_format($partidos[$prgPrti])) ?> personas</b>'
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
        $prgPrt++;
        $prgPrti++;
       
        } ?>

    });
    

$(function () {
    
    <?php
        $sumEmpTot = 0;
        $empleosPart = PartidosTotales::where('municipio',$mun_id)->whereIn('programa',[13,18,19])
                ->groupby('partido')->selectRaw('partido, sum(total) as totales')->get();
        $valoresE='';
        foreach($empleosPart as $empleosP){ 
            $valoresE.= "['".$empleosP->partido()->partido."',".$empleosP->totales."],";
            $sumEmpTot += $empleosP->totales;
        } 
        ?>
        Highcharts.chart('empleosPart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: 'Empleados por partido político'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumEmpTot)) ?> personas'
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
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                    name: 'Total',
                    data: [
                        <?php 
                            echo $valoresE;                        
                        ?>
                    ]
                }]
        });       
        <?php 
        $sumBenTot = 0;
        $numBen = BeneficiariosProgTot::where('municipio',$mun_id)->get();
        $valoresFr='';
        foreach($numBen as $numB){ 
            $valoresFr.= "{name:'".$numB->cantidad." programas',data:[".$numB->total."]},";
            $sumBenTot += $numB->total;
        } 
        ?>
        Highcharts.chart('frecuenciaProg', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: false,
                    alpha: 20
                }
                
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: 'Cantidad de programas por beneficiario'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($sumBenTot)) ?> personas'
            },
            xAxis: {
                categories: [
                    'Número de programas',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de personas'
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
                        echo $valoresFr;                        
                    ?>]
        }); 
        
        
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
                text: '<b style="color:black">PROMOVIDOS AFILIADOS A PARTIDOS DE OPOSICIÓN</b>'
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
<script>
$(function () {
Highcharts.chart('empleados_estatales', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors:['#ABB7B7','#C0392B','#68C3A3'],
    title: {
        text: 'NÓMINA',
        style: {'color':'#333'}
    },
    subtitle: {
        text: '<b>NOMINA ANUAL: $2,301,252,042.48</b>'
    },
    tooltip: {
            style: {'color':'#333'}
        },
    plotOptions: {
        pie: {
            innerSize: 40,
            depth: 45,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total',
        data: [
            ['Mayor a $20,000', 2185],
            ['Menor a $20,000', 8935]
        ]
    }]
});



});



FusionCharts.ready(function () {
    var wealthChart = new FusionCharts({
        type: 'pyramid',
        renderAt: 'chart-container',
        id: 'wealth-pyramid-chart',
        width: '500',
        height: '400',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "theme": "fint",
                "caption": "ESTRUCTURA ELECTORAL",
                "captionOnTop" : "0",
                "captionPadding": "25",
                "alignCaptionWithCanvas" : "1",
                "subcaption": "",
                "subCaptionFontSize" : "12",
                "is2D": "0",
                "bgColor": "e0e0e0",
                "showValues": "1",
                "plotTooltext": "",
                "showPercentValues": "0",
                "chartLeftMargin": "40",
                "exportEnabled" :"1",
                 "pyramidyscale": "40",
                 "issliced": "1",
                 "numberPrefix": "",
                "numberSuffix": "",
            },
            "data": [
                {
                    "label": "COORDINADOR DE SECCION {BR}",
                    "value": "25",
                    "color": "03A678",
                    "cleanValue": 1348
                },
                {
                    "label": "SUBCOORDINADOR DE SECCION",
                    "value": "25",
                    "value2": "3,478",
                    "color": "68C3A3",
                    "cleanValue": 2178
                },
                {
                    "label": "PROMOTORES",
                    "value": "25",
                    "value2": "42,642",
                    "color": "ABB7B7",
                    "cleanValue": 31514
                },
                {
                    "label": "PROMOVIDOS",
                    "value": "25",
                    "value2": "47,934",
                    "color": "C0392B",
                    "cleanValue": 8701
                }
            ]
        }  
    })
    
    .render();
});

<?php 
        $sinBen = BeneficiariosProgTot::where('municipio',$mun_id)->where('cantidad','<',1)->first();
        $conBen = BeneficiariosProgTot::where('municipio',$mun_id)->where('cantidad','>',0)->sum('total');
        
        ?>
$(function () {
Highcharts.chart('beneficiarios', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors:['#ABB7B7','#C0392B','#68C3A3'],
    title: {
        text: '',
        style: {'color':'#333'}
    },
    subtitle: {
        text: ''
    },
    tooltip: {
            style: {'color':'#333'}
        },
    plotOptions: {
        pie: {
            innerSize: 50,
            depth: 45,
            allowPointSelect: true,
            cursor: 'pointer',
            color: '#ffffff',
            dataLabels: {
                enabled: true,
                color: '#ffffff',
                format: '<b>{point.name}</b> {point.percentage:.1f} %'
            },
            showInLegend: false
        }
    },
    series: [{
        name: 'Total',
        data: [
            ['BENEFICIARIOS<br>', <?php echo $conBen ?>],
            ['SIN <br>BENEFICIO<br>', <?php echo $sinBen->total ?>]
        ]
    }]
});

});

$(function () {

Highcharts.chart('sindicatosTotal', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 20
                }
                
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: 'SINDICATOS',
                style: {'color':'#333'}
            },
            subtitle: {
                text: 'Metas por sindicato'
            },
            xAxis: {
                categories: [
                    'Sindicatos',
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
            series: [{
                    name: 'CTM',
                    data: 
                        [15000]
                },{
                    name: 'CROC',
                    data: 
                        [5000]
                },{
                    name: 'CROM',
                    data: 
                        [5000]
                },{
                    name: 'SECC. 52',
                    data: 
                        [3000]
                },{
                    name: 'IMSS',
                    data: 
                        [1000]
                },{
                    name: 'FSTSE',
                    data: 
                        [4000]
                },{
                    name: 'SUTSGE',
                    data: 
                        [2000]
                }]
        });
        
        
        });
        
        
        

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
    Highcharts.chart('graficacontratacion', {
        chart: {
            plotBackgroundColor: '#eeeeee',
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Distribución por tipo de Contratación',
                style: {'color':'#333'}
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>',
                style: {'color':'#333'}
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

$personalTOrd = PersonalTipoEmpleado::all()->sortByDesc('empleados');
$personalTSum = PersonalTipoEmpleado::sum('empleados');

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

     <div class="row" style="margin: 2% 0 2% 0;">
            <div class="col-lg-10">
                <section>
                    <div class="widget-body">
                        <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                            <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                                Sistema de Información Estadística <span class="fw-semi-bold">SIE</span>   <span style="font-size:16px;">(Sitio en construcción)</span></h3>
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
                            <td><?php echo Form::select('municipio',$municipios,$mun_id,['class'=>'form-control SelectAuto','placeholder'=>'Seleccione un municipio...','required','id'=>'municipio','onChange'=>'getGraficas()']); ?></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
        
        
        
        <div class="row ng-scope">
            <div class="col-md-12">
                <div class="clearfix">
         
                    <?php if($mun_id==0): ?>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6><b>TOTAL PADRON:<br><i>1,939,719</i></b></h6>
                            <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 40px;">
                            <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 40px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 style="margin: 5px;">Mujeres:1,000,309 <br>Porcentaje:51.56%</h6>
                            <div style="height: 40px; width: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_mujer_sn.png'))); ?>" style="width: auto; height: 100%;">
                            </div>
                        </div>    
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 style="margin: 5px;">Hombres:939,410 <br>Porcentaje:48.43%</h6>
                            <div style="height: 40px; width: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                                <img src="<?php echo e(url(asset('img/pob_hombre_sn.png'))); ?>" style="width: auto; height: 100%;">
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6><b>TOTAL PADRON:<br><i><?php echo e(number_format($totalpadron)); ?></i></b></h6>
                            <img src="<?php echo e(url(asset('img/pob_mujer.png'))); ?>" style="width: auto; height: 40px;">
                            <img src="<?php echo e(url(asset('img/pob_hombre.png'))); ?>" style="width: auto; height: 40px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 style="margin: 5px;"><b>Mujeres:<?php echo e(number_format($totalmujeres)); ?></b></h6>
                        </div>    
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 style="margin: 5px;"><b>Hombres:<?php echo e(number_format($totalhombres)); ?></b></h6>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    
                    <hr class="col-lg-10 col-md-10 col-sm-10">
                    
                    <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3"></div>
                    


                             
           
           
           
            <div class="col-md-10">
                <div class="clearfix">
                    <div>
                        <h2>INVERSIÓN</h2>
                    </div>
                    <hr>
                    <div class="row ng-scope col-lg-12 col-md-12" style="background-color: #313131; color:white;">
                        <div class="col-lg-6">
                            <section class="widget" style="background-color: #313131; color:white; text-align: center; margin: auto;">
                                <header>
                                    <h4>TOTAL DE INVERSIÓN POR PROGRAMAS</h4>
                                </header>
                                <hr style="color: #fff;">
                                <div class="col-lg-5 col-md-5">
                                    <!--<div id="graficainversion" style="width: 400px; height: 400px; margin: 0 auto"></div>-->
                                    <img src="<?php echo e(url(asset('img/inversion.png'))); ?>" style="width: auto; height: 500px;">
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-6 ">
                            <section class="widget" style="background-color: #313131; color:white; text-align: center; margin: auto;">
                                <header>
                                    <h4>BENEFICIARIOS:</h4>
                                </header>
                                <hr style="color: #fff;">
                                <div >
                                    <div id="beneficiarios"></div>
                                </div>
                            </section>
                        </div>
                        </div>
                </div>
            </div>
                    
            
            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <div>
                    <section class="widget" style="background: none;">
                        <header>
                            <h4>FRECUENCIA PROGRAMAS SOCIALES:</h4>
                            <hr class="col-md-10">
                        </header>
                        <div style="width:100%; display: inline-block;">
                            <div>
                                <div id="frecuenciaProg" ></div>
                            </div>
                        </div>
                    </section>
                </div>     
                </div>
            </div>  
            
            
                    
             
            <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  
                    
           
                    
                    <div class="row ng-scope">
                        <div class="col-md-11">
                            <section class="widget" style="background: none;">
                                <header>
                                    <h4>TOTAL BENEFICIARIOS EN EL PADRON POR PROGRAMA:</h4>
                                </header>
                                <div class="col-md-12">
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales1" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales2" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales3" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales4" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales5" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales6" style="height: 300px;"></div> 
                                    </div>
                                </div>
                                <br>
                                <div class="widget-body"  style="width:100%; display: inline-block;">
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales7" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales8" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales9" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales10" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales11" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales15" style="height: 300px;"></div> 
                                    </div>
                                </div>
                                <div class="widget-body"  style="width:100%; display: inline-block;">
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales22" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales23" style="height: 300px;"></div> 
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-sm-12">
                                        <div id="totales24" style="height: 300px;"></div> 
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


        <hr style="border-top: 1px dashed #8c8b8b;">

        <div class="row ng-scope">
            
            <div class="row ng-scope" style="background-color: #eeeeee; color:black;">
                <div class="col-lg-5 col-md-5 ">
                    <section class="widget" style="background: none;">
                        <header>
                            <h4>EMPLEADOS:</h4>
                            <hr class="col-md-10">
                        </header>
                        <div style="width:100%; display: inline-block;">
                            <div>
                                <div id="empleados_estatales" style="height: 300px;"></div>
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class="col-lg-5 col-md-5 ">
                    <section class="widget" style="background: none;">
                        <header onclick="resultados('')">
                            <h4><a href="<?php echo e(url('/resultados/partPolOp/'.$mun_id)); ?>">RELACIÓN PARTIDOS POLÍTICOS DE OPOSICIÓN Y EMPLEADOS </a></h4>
                            <hr class="col-md-10">
                        </header>
                        <div style="width:100%; display: inline-block;">
                            <div>
                                <div id="empleosPart" ></div>
                            </div>
                        </div>
                    </section>
                </div>          
            </div>
        </div> 
        
        
        <hr style="border-top: 1px dashed #8c8b8b;">

        <div class="row ng-scope">

            <div class="row ng-scope" style="background-color: #eeeeee; color:black;">
                <div class="col-lg-11 col-md-11 ">
                    <section class="widget" style="background-color: #eeeeee; color:black;">
                        <header onclick="resultados('')">
                            <h4><a href="<?php echo e(url('/resumen_plantillas')); ?>">RESUMEN DE PERSONAL POR PODER</a></h4>
                            <hr class="col-md-5">
                        </header>
                        <div class="widget-body" style="background-color: #eeeeee; color:black;">
                            <div class="stats-row">
                                <div id="graficacontratacion">

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        
            
    <hr style="border-top: 1px dashed #8c8b8b;">
         
        <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <!---->

                    <div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="sindicatosTotal" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
            
    
    
    
     <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">
        
        
                    
            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
            <section class="widget" style="background: none;">
                        <header>
                            <h4>TOTAL DE MILITANTES EN PARTIDOS POLITICOS DE OPOSICION:</h4>
                        </header>
                        
                        
            <div class="row ng-scope">
                <div>
                    <!---->
                    <div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="partidos" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            </div>
                
                
            <hr class="col-lg-offset-1 col-lg-8 col-md-8" style="border-top: 1px dotted #8c8b8b;">
            
            <section class="widget" style="background: none;">
            <div class="row ng-scope col-lg-10">
                <header>
                    <h4>RELACIÓN PARTIDOS POLITICOS Y PROGRAMAS SOCIALES:</h4>
                </header>
            </div>
            
            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <!---->
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart1" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart2" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="col-lg-offset-1 col-lg-10 col-md-10" style="border-top: 1px dotted #8c8b8b; margin: 5%;">
                    
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart3" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart4" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="col-lg-offset-1 col-lg-10 col-md-10" style="border-top: 1px dotted #8c8b8b; margin: 5%;">
                    
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart5" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart6" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--<hr class="col-lg-offset-1 col-lg-10 col-md-10" style="border-top: 1px dotted #8c8b8b; margin: 5%;">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="totalesProgPart7" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    
                </div>
            </div>

            </section>
        </div> 
    
    
    
            
            
                </div>
            </div>
        </div>    

        
        
        <!--<div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="representantesDiferencia" ></div>
                                </div>
                            </div>
                        </div>
                    </div>-->
        
        
        
        
        
        
        
        
        
        
        
        

        
        
       
    </main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>