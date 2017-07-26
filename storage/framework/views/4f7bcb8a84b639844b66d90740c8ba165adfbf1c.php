<?php 
use App\Models\partidos\Partidos;
use App\Models\partidos\PartidosTotales;
use App\Models\Programas;
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
                text: '<?php echo $prog->programa()->nombre ?>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($prog->programa()->total*1)) ?> personas'
            },
            tooltip: {
                style: {'color': '#333'}
            },
            plotOptions: {
                pie: {
                    innerSize: 30,
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
                        ['No beneficiarios', <?php echo ($prog->programa()->total*1) - ($prog->total_beneficiarios*1) ?>]
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
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: '<b style="color:black">PARTIDOS</b>'
            },
            subtitle: {
                text: 'Totales de personas pertenecientes a cada partido'
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
            foreach($programasPart as $programasP){ 
                $valores.= "['".$programasP->programa()->nombre."',".$programasP->total."],";
                $sumPartTot += $programasP->total;
            } 
            $PartSinBen = $partidos[$prgPrti] - $sumPartTot;
            $partidoNombre = Partidos::where('id',$prgPrt)->first();
        ?>
        Highcharts.chart('totalesProgPart<?php echo $prgPrt ?>', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#03A678', '#555', '#ABB7B7', '#C0392B', '#68C3A3'],
            title: {
                text: '<?php echo strtoupper($partidoNombre->partido) ?>'
            },
            subtitle: {
                text: 'Total <?php echo (number_format($partidos[$prgPrti])) ?> personas'
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
                            echo $valores;                        
                        ?>
                        ['Sin beneficio', <?php echo $PartSinBen ?>]
                    ]
                }]
        });
        <?php 
        $prgPrt++;
        $prgPrti++;
       
        } ?>

    });
</script>
<script>

</script>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">

        <div class="row ng-scope">
            <div class="col-md-12">
                <div class="clearfix">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <h6>TOTAL DE BENEFICIARIOS:<br>1,903,204</h6>
                        <hr>
                        <div style="width: 100%; height: 40px; margin: 5px;">
                            <img src="img/pob_mujer.png" style="width: auto; height: 100%;">
                            <img src="img/pob_mujer_sn.png" style="width: auto; height: 100%;">
                        </div>    
                        <div style="width: 100%; height: 40px; margin: 5px;">
                            <img src="img/pob_hombre.png" style="width: auto; height: 100%;">
                            <img src="img/pob_hombre_sn.png" style="width: auto; height: 100%;">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <h6>TOTAL SIN PROGRAMA DE BENEFICIO:<br>63,204</h6>
                        <hr>
                        <div style="width: 100%; height: 40px; margin: 5px;">
                            <img src="img/pob_mujer.png" style="width: auto; height: 100%;">
                            <img src="img/pob_mujer_sn.png" style="width: auto; height: 100%;">
                        </div>    
                        <div style="width: 100%; height: 40px; margin: 5px;">
                            <img src="img/pob_hombre.png" style="width: auto; height: 100%;">
                            <img src="img/pob_hombre_sn.png" style="width: auto; height: 100%;">
                        </div>
                    </div>

                    <div class="row ng-scope">
                        <div class="col-md-12">
                            <section class="widget" style="background: none;">
                                <header>
                                    <h4>TOTAL BENEFICIARIOS EN EL PADRON POR PROGRAMA:</h4>
                                </header>
                                <div class="widget-body" style="width:100%; display: inline-block;">
                                    <div style="width: 170px; float: left;">
                                        <div id="totales1" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales2" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales3" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales4" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales5" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales6" style="height: 300px;"></div> 
                                    </div>
                                </div>
                                <br>
                                <div class="widget-body"  style="width:100%; display: inline-block;">
                                    <div style="width: 170px; float: left;">
                                        <div id="totales7" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales8" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales9" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales10" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales11" style="height: 300px;"></div> 
                                    </div>
                                    <div style="width: 170px; float: left;">
                                        <div id="totales15" style="height: 300px;"></div> 
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


                </div>
            </div>
        </div>    




        <div class="row ng-scope">
            <div class="col-md-10" style="text-align: center">
                <div class="clearfix">
                    <div>
                        <h2>Programas</h2>
                    </div>
                    <hr>
                    <div class="row ng-scope" style="background-color: #313131; color:white;">
                        <div class="col-md-3"></div>
                        <div class="col-md-5">
                            <section class="widget" style="background-color: #313131; color:white;">
                                <header>
                                    <h6>Total de Inversión por Programas</h6>
                                </header>
                                <div class="widget-body">
                                    <div><i class="fa fa-usd" aria-hidden="true" style="font-size:larger;"></i></div>
                                    <div id="graficainversion" style="width: 500px; height: 500px; margin: 0 auto"></div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <!---->
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="grafica4" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="grafica6" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="grafica5" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <div id="grafica3" height="400"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!---->
                </div>
            </div>

            <div class="row ng-scope">
                <div class="mt col-lg-10 col-md-10">
                    <!---->
                    <div class="col-lg-12">
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
                </div>
            </div>




        </div>
    </main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>