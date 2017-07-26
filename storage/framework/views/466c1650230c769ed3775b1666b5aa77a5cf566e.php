<?php 
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\PobEstatalGenero;
use App\Models\PobMunicipalGenero;
use App\Models\AfiliacionServiciosSalud;
use App\Models\CaracteristicasEducativas;
use App\Models\PeaPnea;
use App\Models\PoblacionOcupada;
use App\Models\PoblacionDesocupada;
use App\Models\PneaProfesiones;
use App\Models\TasaAlfabetizacion;

$p = 1;
while ($p <= 58) {
    $pobLoc[$p] = Localidad::where('id_municipio', $p)->sum('poblacion');
    $part = Municipio::where('id', $p)->first();
    $partido[$p] = $part->partido_politico;
    $p++;
}
?>
<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Sistema de Análisis')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Scripts -->

    
    <!-- De plantilla -->
    
    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/application.min.css'); ?>

    <?php echo Html::style('css/datatables.min.css'); ?>

    <?php echo Html::style('css/controlpagajax.css'); ?>

    <?php echo Html::style('css/select2.min.css'); ?>

     
    
    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
      <style type="text/css">

        h1 {
            font-size: 30px;
            color: #613b1e;
            margin: 20px auto 20px auto;
            display: block;
            text-align: center;
        }

        h2 {
            margin: 0;
            padding: 0;
            font-size: 22px;
            color: #343434;

        }

        .container {
            width: 90%;
            overflow: hidden;
            min-width: 700px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .knobContainer {
            text-align: center;
            margin: 10px;
        }

        .knobContainer canvas {
            cursor: pointer;
        }

        .rightPanel {
            float: right;
            width: 223px;
            border-radius: 5px;
            margin-left: 5px;
        }

        /* Specific mapael css class are below
         * 'mapael' class is added by plugin
        */
        
        .mapael .mapTooltip { /*mensaje info*/
            position: absolute;
            background-color: #fff;
            moz-opacity: 0.80;
            opacity: 0.80;
            filter: alpha(opacity=80);
            border-radius: 4px;
            padding: 10px; 
            z-index: 1000;
            max-width: 200px;
            display: none;
            color: #232323;
        }
        
        .mapael .map {
            /*margin-right: 228px;*/ /*margen que hace pequeño al mapa*/
            overflow: hidden;
            position: relative;
            border-radius: 5px;
        }

        /* For all zoom buttons */
        .mapael .zoomButton {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #000;
            width: 15px;
            height: 15px;
            line-height: 15px;
            text-align: center;
            border-radius: 3px;
            cursor: pointer;
            position: absolute;
            bottom: 0;
            font-weight: bold;
            left: 10px;

            -webkit-user-select: none;
            -khtml-user-select : none;
            -moz-user-select: none;
            -o-user-select : none;
            user-select: none;
        }

        /* Reset Zoom button first */
        .mapael .zoomReset {
            top: 10px;
        }

        /* Then Zoom In button */
        .mapael .zoomIn {
            top: 30px;
        }

        /* Then Zoom Out button */
        .mapael .zoomOut {
            top: 50px;
        }
        
    </style>
    
       <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script> 
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
<?php echo Html::script('js/jquery.min.js'); ?>

<?php echo Html::script('js/jquery.mousewheel.min.js'); ?>

<?php echo Html::script('js/raphael.min.js'); ?>

<?php echo Html::script('js/jquery.knob.min.js'); ?>

<?php echo Html::script('js/controlpagajax.js'); ?>

<?php echo Html::script('js/bootstrap.min.js'); ?>

<?php echo Html::script('js/highcharts.src.js'); ?>

<?php echo Html::script('js/highcharts.js'); ?>

<?php echo Html::script('js/highcharts-more.js'); ?>

<?php echo Html::script('js/highcharts-3d.js'); ?>

<?php echo Html::script('js/fusioncharts.js'); ?>

<?php echo Html::script('js/fusioncharts.widgets.js'); ?>

<?php echo Html::script('js/fusioncharts.theme.fint.js'); ?>

<?php echo Html::script('js/funnel.js'); ?>

<?php echo Html::script('js/solid-gauge.js'); ?>

<?php echo Html::script('js/exporting.js'); ?>

<?php echo Html::script('js/datatables.min.js'); ?>

<?php echo Html::script('js/select2.min.js'); ?>


<script src="/vendor/jQuery-Mapael/js/jquery.mapael.js" charset="utf-8"></script>
<script src="/vendor/jQuery-Mapael/js/maps/san_luis_potosi.js" charset="utf-8"></script>

<!--<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
-->


 
    
    <script type="text/javascript">
         $(function () {
            // Fake data for countries and cities from 2003 to 2013
            var data = {
                "2003": {
                    "areas": {
                        "Charcas": {
                            "value": 23811026,
                            "href": "/index/15",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/15.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Charcas</span><br />Población : <?php echo $pobLoc[15] ?><br />Partido : <?php echo $partido[15] ?>"
                            }
                        },
                        "Salinas": {
                            "value": 43635718,
                            "href": "/index/25",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/25.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Salinas</span><br />Población : <?php echo $pobLoc[25] ?><br />Partido : <?php echo $partido[25] ?>"
                            }
                        },
                        "Villa de Ramos": {
                            "value": 28472433,
                            "href": "/index/49",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/49.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de Ramos</span><br />Población : <?php echo $pobLoc[49] ?><br />Partido : <?php echo $partido[49] ?>"
                            }
                        },
                        "Venado": {
                            "value": 7013507,
                            "href": "/index/45",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/45.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Venado</span><br />Población : <?php echo $pobLoc[45] ?><br />Partido : <?php echo $partido[45] ?>"
                            }
                        },
                        "Moctezuma": {
                            "value": 36848343,
                            "href": "/index/22",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/22.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Moctezuma</span><br />Población : <?php echo $pobLoc[22] ?><br />Partido : <?php echo $partido[22] ?>"
                            }
                        },
                        "Ahualulco": {
                            "value": 30847009,
                            "href": "/index/1",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/1.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Ahualulco</span><br />Población : <?php echo $pobLoc[1] ?><br />Partido : <?php echo $partido[1] ?>"
                            }
                        },
                        "Mexquitic de Carmona": {
                            "value": 971957,
                            "href": "/index/21",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/21.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Mexquitic de Carmona</span><br />Población : <?php echo $pobLoc[21] ?><br />Partido : <?php echo $partido[21] ?>"
                            }
                        },
                        "San Luis Potosí": {
                            "value": <?php echo $pobLoc[28] ?>,
                            "href": "/index/28",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/28.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Luis Potosí</span><br />Población : <?php echo $pobLoc[28] ?><br />Partido : <?php echo $partido[28] ?></div>"
                            }
                        },
                        "Villa de Arriaga": {
                            "value": 35729605,
                            "href": "/index/46",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/46.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de Arriaga</span><br />Población : <?php echo $pobLoc[46] ?><br />Partido : <?php echo $partido[46] ?>"
                            }
                        },
                        "Villa de Reyes": {
                            "value": 32448340,
                            "href": "/index/50",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/50.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de Reyes</span><br />Población : <?php echo $pobLoc[50] ?><br />Partido : <?php echo $partido[50] ?>"
                            }
                        },
                        "Villa de Arista": {
                            "value": 44485739,
                            "href": "/index/56",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/56.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de Arista</span><br />Población : <?php echo $pobLoc[56] ?><br />Partido : <?php echo $partido[56] ?>"
                            }
                        },
                        "Soledad de Graciano Sánchez": {
                            "value": 22851324,
                            "href": "/index/35",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/35.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Soledad de Graciano Sánchez</span><br />Población : <?php echo $pobLoc[35] ?><br />Partido : <?php echo $partido[35] ?>"
                            }
                        },
                        "Cerro de San Pedro": {
                            "value": 3607937,
                            "href": "/index/9",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/9.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Cerro de San Pedro</span><br />Población : <?php echo $pobLoc[9] ?><br />Partido : <?php echo $partido[9] ?>"
                            }
                        },
                        "Tierra Nueva": {
                            "value": 9130334,
                            "href": "/index/43",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/43.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tierra Nueva</span><br />Población : <?php echo $pobLoc[43] ?><br />Partido : <?php echo $partido[43] ?>"
                            }
                        },
                        "Santa María del Río": {
                            "value": 7391903,
                            "href": "/index/32",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/32.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Santa María del Río</span><br />Población : <?php echo $pobLoc[32] ?><br />Partido : <?php echo $partido[32] ?>"
                            }
                        },
                        "Zaragoza": {
                            "value": 26617010,
                            "href": "/index/55",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/55.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Zaragoza</span><br />Población : <?php echo $pobLoc[55] ?><br />Partido : <?php echo $partido[55] ?>"
                            }
                        },
                        "Ciudad Fernández": {
                            "value": 13486465,
                            "href": "/index/11",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/11.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Ciudad Fernández</span><br />Población : <?php echo $pobLoc[11] ?><br />Partido : <?php echo $partido[11] ?>"
                            }
                        },
                        "Armadillo de los Infante": {
                            "value": 11433618,
                            "href": "/index/4",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/4.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Armadillo de los Infante</span><br />Población : <?php echo $pobLoc[4] ?><br />Partido : <?php echo $partido[4] ?>"
                            }
                        },
                        "Cerritos": {
                            "value": 7618576,
                            "href": "/index/8",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/8.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Cerritos</span><br />Población : <?php echo $pobLoc[8] ?><br />Partido : <?php echo $partido[8] ?>"
                            }
                        },
                        "San Nicolás Tolentino": {
                            "value": 25118048,
                            "href": "/index/30",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/30.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Nicolás Tolentino</span><br />Población : <?php echo $pobLoc[30] ?><br />Partido : <?php echo $partido[30] ?>"
                            }
                        },
                        "Villa Juárez": {
                            "value": 48518314,
                            "href": "/index/52",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/52.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa Juárez</span><br />Población : <?php echo $pobLoc[52] ?><br />Partido : <?php echo $partido[52] ?>"
                            }
                        },
                        "Rioverde": {
                            "value": 59948816,
                            "href": "/index/24",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/24.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Rioverde</span><br />Población : <?php echo $pobLoc[24] ?><br />Partido : <?php echo $partido[24] ?>"
                            }
                        },
                        "San Ciro de Acosta": {
                            "value": 13343881,
                            "href": "/index/27",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/27.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Ciro de Acosta</span><br />Población : <?php echo $pobLoc[27] ?><br />Partido : <?php echo $partido[27] ?>"
                            }
                        },
                        "Ciudad del Maíz": {
                            "value": 23970062,
                            "href": "/index/10",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/10.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Ciudad del Maíz</span><br />Población : <?php echo $pobLoc[10] ?><br />Partido : <?php echo $partido[10] ?>"
                            }
                        },
                        "Lagunillas": {
                            "value": 2006607,
                            "href": "/index/19",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/19.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Lagunillas</span><br />Población : <?php echo $pobLoc[19] ?><br />Partido : <?php echo $partido[19] ?>"
                            }
                        },
                        "Santa Catarina": {
                            "value": 25516553,
                            "href": "/index/31",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/19.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Santa Catarina</span><br />Población : <?php echo $pobLoc[31] ?><br />Partido : <?php echo $partido[31] ?>"
                            }
                        },
                        "Rayón": {
                            "value": 22695944,
                            "href": "/index/23",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/23.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Rayón</span><br />Población : <?php echo $pobLoc[23] ?><br />Partido : <?php echo $partido[23] ?>"
                            }
                        },
                        "Cárdenas": {
                            "value": 58738678,
                            "href": "/index/5",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/5.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Cárdenas</span><br />Población : <?php echo $pobLoc[5] ?><br />Partido : <?php echo $partido[5] ?>"
                            }
                        },
                        "Alaquines": {
                            "value": 36804471,
                            "href": "/index/2",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/2.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Alaquines</span><br />Población : <?php echo $pobLoc[2] ?><br />Partido : <?php echo $partido[2] ?>"
                            }
                        },
                        "Tamasopo": {
                            "value": 48527454,
                            "href": "/index/36",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/2.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tamasopo</span><br />Población : <?php echo $pobLoc[36] ?><br />Partido : <?php echo $partido[36] ?>"
                            }
                        },
                        "Ébano": {
                            "value": 3852890,
                            "href": "/index/16",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/16.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Ébano</span><br />Población : <?php echo $pobLoc[16] ?><br />Partido : <?php echo $partido[16] ?>"
                            }
                        },
                        "Tampacán": {
                            "value": 15239520,
                            "href": "/index/38",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/38.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tampacán</span><br />Población : <?php echo $pobLoc[38] ?><br />Partido : <?php echo $partido[38] ?>"
                            }
                        },
                        "Axtla de Terrazas": {
                            "value": 46215030,
                            "href": "/index/53",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/53.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Axtla de Terrazas</span><br />Población : <?php echo $pobLoc[53] ?><br />Partido : <?php echo $partido[53] ?>"
                            }
                        },
                        "Xilitla": {
                            "value": 59722144,
                            "href": "/index/54",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/54.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Xilitla</span><br />Población : <?php echo $pobLoc[54] ?><br />Partido : <?php echo $partido[54] ?>"
                            }
                        },
                        "Tamazunchale": {
                            "value": 14842843,
                            "href": "/index/37",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/37.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tamazunchale</span><br />Población : <?php echo $pobLoc[37] ?><br />Partido : <?php echo $partido[37] ?>"
                            }
                        },
                        "Matlapa": {
                            "value": 48838214,
                            "href": "/index/57",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/57.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Matlapa</span><br />Población : <?php echo $pobLoc[57] ?><br />Partido : <?php echo $partido[57] ?>"
                            }
                        },
                        "San Martín Chalchicuautla": {
                            "value": 13391409,
                            "href": "/index/29",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/29.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Martín Chalchicuautla</span><br />Población : <?php echo $pobLoc[29] ?><br />Partido : <?php echo $partido[29] ?>"
                            }
                        },
                        "Coxcatlán": {
                            "value": 19791247,
                            "href": "/index/14",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/14.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Coxcatlán</span><br />Población : <?php echo $pobLoc[14] ?><br />Partido : <?php echo $partido[14] ?>"
                            }
                        },
                        "Huehuetlán": {
                            "value": 23843930,
                            "href": "/index/18",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/18.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Huehuetlán</span><br />Población : <?php echo $pobLoc[18] ?><br />Partido : <?php echo $partido[18] ?>"
                            }
                        },
                        "Tampamolón Corona": {
                            "value": 45350385,
                            "href": "/index/39",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/39.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tampamolón Corona</span><br />Población : <?php echo $pobLoc[39] ?><br />Partido : <?php echo $partido[39] ?>"
                            }
                        },
                        "Tanquián de Escobedo": {
                            "value": 11336734,
                            "href": "/index/42",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/42.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tanquián de Escobedo</span><br />Población : <?php echo $pobLoc[42] ?><br />Partido : <?php echo $partido[42] ?>"
                            }
                        },
                        "San Antonio": {
                            "value": 39175391,
                            "href": "/index/26",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/26.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Antonio</span><br />Población : <?php echo $pobLoc[26] ?><br />Partido : <?php echo $partido[26] ?>"
                            }
                        },
                        "Tancanhuitz": {
                            "value": 28984274,
                            "href": "/index/12",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/12.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tancanhuitz</span><br />Población : <?php echo $pobLoc[12] ?><br />Partido : <?php echo $partido[12] ?>"
                            }
                        },
                        "Tanlajás": {
                            "value": 40341657,
                            "href": "/index/41",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/41.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tanlajás</span><br />Población : <?php echo $pobLoc[41] ?><br />Partido : <?php echo $partido[41] ?>"
                            }
                        },
                        "San Vicente Tancuayalab": {
                            "value": 23204129,
                            "href": "/index/34",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/34.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">San Vicente Tancuayalab</span><br />Población : <?php echo $pobLoc[34] ?><br />Partido : <?php echo $partido[34] ?>"
                            }
                        },
                        "Aquismón": {
                            "value": 18665198,
                            "href": "/index/3",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/3.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Aquismón</span><br />Población : <?php echo $pobLoc[3] ?><br />Partido : <?php echo $partido[3] ?>"
                            }
                        },
                        "Tamuín": {
                            "value": 58342002,
                            "href": "/index/40",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/40.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Tamuín</span><br />Población : <?php echo $pobLoc[40] ?><br />Partido : <?php echo $partido[40] ?>"
                            }
                        },
                        "Ciudad Valles": {
                            "value": 39427655,
                            "href": "/index/13",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/13.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Ciudad Valles</span><br />Población : <?php echo $pobLoc[13] ?><br />Partido : <?php echo $partido[13] ?>"
                            }
                        },
                        "El Naranjo": {
                            "value": 2196719,
                            "href": "/index/58",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/58.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">El Naranjo</span><br />Población : <?php echo $pobLoc[58] ?><br />Partido : <?php echo $partido[58] ?>"
                            }
                        },
                        "Villa Hidalgo": {
                            "value": 8801294,
                            "href": "/index/51",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/51.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa Hidalgo</span><br />Población : <?php echo $pobLoc[51] ?><br />Partido : <?php echo $partido[51] ?>"
                            }
                        },
                        "Guadalcázar": {
                            "value": 50145237,
                            "href": "/index/17",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/17.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Guadalcázar</span><br />Población : <?php echo $pobLoc[17] ?><br />Partido : <?php echo $partido[17] ?>"
                            }
                        },
                        "Villa de Guadalupe": {
                            "value": 18274005,
                            "href": "/index/47",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/47.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de Guadalupe</span><br />Población : <?php echo $pobLoc[47] ?><br />Partido : <?php echo $partido[47] ?>"
                            }
                        },
                        "Santo Domingo": {
                            "value": 51267630,
                            "href": "/index/33",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/33.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Santo Domingo</span><br />Población : <?php echo $pobLoc[33] ?><br />Partido : <?php echo $partido[33] ?>"
                            }
                        },
                        "Matehuala": {
                            "value": 30174304,
                            "href": "/index/20",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/20.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Matehuala</span><br />Población : <?php echo $pobLoc[20] ?><br />Partido : <?php echo $partido[20] ?>"
                            }
                        },
                        "Real de Catorce": {
                            "value": 32472104,
                            "href": "/index/6",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/6.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Real de Catorce</span><br />Población : <?php echo $pobLoc[6] ?><br />Partido : <?php echo $partido[6] ?>"
                            }
                        },
                        "Villa de la Paz": {
                            "value": 42396332,
                            "href": "/index/48",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/48.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Villa de la Paz</span><br />Población : <?php echo $pobLoc[48] ?><br />Partido : <?php echo $partido[48] ?>"
                            }
                        },
                        "Cedral": {
                            "value": 3819986,
                            "href": "/index/7",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/7.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Cedral</span><br />Población : <?php echo $pobLoc[7] ?><br />Partido : <?php echo $partido[7] ?>"
                            }
                        },
                        "Vanegas": {
                            "value": 13524853,
                            "href": "/index/44",
                            "tooltip": {
                                "content": "<div style='text-align:center;'><img src='/img/escudos/44.png' style='width:auto; max-height:120px;'/><br><span style=\"font-weight:bold;\">Vanegas</span><br />Población : <?php echo $pobLoc[44] ?><br />Partido : <?php echo $partido[44] ?>"
                            }
                        }
                    }
                    /*"plots": {
                        "paris": {
                            "value": 1448389,
                            "tooltip": {
                                "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: <?php echo $pobLoc[28] ?>"
                            }
                        },
                        "newyork": {
                            "value": 426800,
                            "tooltip": {
                                "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: <?php echo $pobLoc[28] ?>"
                            }
                        },
                        "sydney": {
                            "value": 1401819,
                            "tooltip": {
                                "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: <?php echo $pobLoc[28] ?>"
                            }
                        },
                        "brasilia": {
                            "value": 644440,
                            "tooltip": {
                                "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: <?php echo $pobLoc[28] ?>"
                            }
                        },
                        "tokyo": {
                            "value": 143237,
                            "tooltip": {
                                "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: <?php echo $pobLoc[28] ?>"
                            }
                        }
                    }*/
                }
            };

            // Default plots params
            var plots = {
                /*"paris": {
                    "latitude": 48.86,
                    "longitude": 2.3444,
                    "text": {
                        "position": "left",
                        "content": "Paris"
                    },
                    "href": "http://en.wikipedia.org/w/index.php?search=Paris"
                },
                "newyork": {
                    "latitude": 40.667,
                    "longitude": -73.833,
                    "text": {
                        "content": "New york"
                    },
                    "href": "http://en.wikipedia.org/w/index.php?search=New York"
                },
                "sydney": {
                    "latitude": -33.917,
                    "longitude": 151.167,
                    "text": {
                        "content": "Sydney"
                    },
                    "href": "http://en.wikipedia.org/w/index.php?search=Sidney"
                },
                "brasilia": {
                    "latitude": -15.781682,
                    "longitude": -47.924195,
                    "text": {
                        "content": "Brasilia"
                    },
                    "href": "http://en.wikipedia.org/w/index.php?search=Brasilia"
                },
                "tokyo": {
                    "latitude": 35.687418,
                    "longitude": 139.692306,
                    "text": {
                        "content": "Tokyo"
                    },
                    "href": "http://en.wikipedia.org/w/index.php?search=Tokyo"
                }*/
            };

            // Knob initialisation (for selecting a year)
            $(".knob").knob({
                release: function (value) {
                    $(".world").trigger('update', [{
                        mapOptions: data[value],
                        animDuration: 300
                    }]);
                }
            });

            // Mapael initialisation
            $world = $(".world");
            $world.mapael({
                map: {
                    name: "san_luis_potosi",
                    defaultArea: {
                        attrs: {
                            fill: "#fff",
                            stroke: "#5d5d5d",
                            "stroke-width": 1.2
                        }
                    },
                    defaultPlot: {
                        text: {
                            attrs: {
                                fill: "#b4b4b4"
                            },
                            attrsHover: {
                                fill: "#fff",
                                "font-weight": "bold"
                            }
                        }
                    }
                    , zoom: {
                        enabled: true
                        , step: 0.25
                        , maxLevel: 20
                    }
                },
                legend: {
                    area: {
                        display: false,
                        title: "Municipios",
                        marginBottom: 7,
                        slices: [
                            {
                                max: 5000000,
                                attrs: {
                                    fill: "#343434"
                                },
                                label: "Menos de ..."
                            },
                            {
                                min: 5000000,
                                max: 10000000,
                                attrs: {
                                    fill: "#343434"
                                },
                                label: "Entre ... y ..."
                            },
                            {
                                min: 10000000,
                                max: 50000000,
                                attrs: {
                                    fill: "#343434"
                                },
                                label: "Entre ... y ..."
                            },
                            {
                                min: 50000000,
                                attrs: {
                                    fill: "#343434"
                                },
                                label: "Más de ..."
                            }
                        ]
                    },
                    plot: {
                        display: false,
                        title: "",
                        marginBottom: 6,
                        /*slices: [
                            {
                                type: "circle",
                                max: 500000,
                                attrs: {
                                    fill: "#FD4851",
                                    "stroke-width": 1
                                },
                                attrsHover: {
                                    transform: "s1.5",
                                    "stroke-width": 1
                                },
                                label: "Less than 500 000",
                                size: 10
                            },
                            {
                                type: "circle",
                                min: 500000,
                                max: 1000000,
                                attrs: {
                                    fill: "#FD4851",
                                    "stroke-width": 1
                                },
                                attrsHover: {
                                    transform: "s1.5",
                                    "stroke-width": 1
                                },
                                label: "Between 500 000 and 1M",
                                size: 20
                            },
                            {
                                type: "circle",
                                min: 1000000,
                                attrs: {
                                    fill: "#FD4851",
                                    "stroke-width": 1
                                },
                                attrsHover: {
                                    transform: "s1.5",
                                    "stroke-width": 1
                                },
                                label: "More than 1M",
                                size: 30
                            }
                        ]*/
                    }
                },
                plots: $.extend(true, {}, data[2003]['plots'], plots),
                areas: data[2003]['areas']
            });
        });
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
</head>
<body>
    <div id="app">
        
        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
        </div>
        
        

        <?php echo $__env->yieldContent('content'); ?>
        
        
        <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
    </div>

    <!-- Scripts -->
       
<script type="text/javascript">
$(function () {

    // Make monochrome colors and set them as default for all pies
//    Highcharts.getOptions().plotOptions.pie.colors = (function () {
//        var colors = [],
//            base = Highcharts.getOptions().colors[0],
//            i;
//
//        for (i = 0; i < 10; i += 1) {
//            // Start out with a darkened base color (negative brighten), and end
//            // up with a much brighter color
//            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
//        }
//        return colors;
//    }());



// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
<?php 
$hombres='';
$mujeres='';
$cats='';
if($id_mun==0){
    $total = PobEstatalGenero::where('id',1)->first();
    $general = PobEstatalGenero::where('id','>',1)->get();
    foreach ($general as $gen){
        $hombres.='-'.$gen->hombres.',';
        $mujeres.=$gen->mujeres.',';
        $cats.="'".$gen->grupos_quinquenales."',";
    }
}
else{
    $total = PobMunicipalGenero::where('id_rango',1)->where('id_municipio',$id_mun)->first();
    $general = PobMunicipalGenero::where('id_rango','>',1)->where('id_municipio',$id_mun)->get();
    foreach ($general as $gen){
        $hombres.='-'.$gen->hombres.',';
        $mujeres.=$gen->mujeres.',';
        $cats.="'".$gen->id_rango."',";
    }
}

?>

// Age categories
//var categories = [<?php //echo $cats ?>];


var categories = ['0-4', '5-9', '10-14', '15-19',
        '20-24', '25-29', '30-34', '35-39', '40-44',
        '45-49', '50-54', '55-59', '60-64', '65-69',
        '70-74', '75 y más', 'No especificado'];
$(document).ready(function () {
    Highcharts.chart('grafica2', {
        chart: {
            type: 'bar'
        },
        colors: ['#C0392B','#555','#ABB7B7','#03A678'],
        title: {
            text: 'Composición por edad y sexo'
        },
        subtitle: {
            text: 'Hombres: <?php echo $total->hombres ?> Mujeres: <?php echo $total->mujeres ?>'
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return Math.abs(this.value);
                }
            }
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + ', edad ' + this.point.category + '</b><br/>' +
                    'Población: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
            }
        },

        series: [{
            name: 'Hombre',
            data: [<?php echo $hombres ?>]
        }, {
            name: 'Mujer',
            data: [<?php echo $mujeres ?>]
        }]
    });




    // Build the chart
    Highcharts.chart('grafica', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        colors: ['#C8F7C5','#65C6BB','#68C3A3','#36D7B7'],
        title: {
            text: 'Marginación'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            name: 'Grado',
            data: [
                { name: 'Bajo', y: 20 },
                { name: 'Medio', y: 20 },
                { name: 'Alto', y: 20 },
                { name: 'Muy Alto', y: 40, sliced: true, selected: true }
            ]
        }]
    });
    
    
    
    
    
});





    
    
    
    
    
  <?php 
    $total_educativas = CaracteristicasEducativas::where('id_municipio',$id_mun)->first();

?>    
    
    
        var colors = ['#03A678','#555','#ABB7B7','#C0392B','#68C3A3'];
        var names = ['Sin escolaridad', 'Básica','Media Superior','Superior','No especificado'];
    
Highcharts.chart('grafica3', {


        chart: {
            type: 'bar',
        },
        legend: {
            enabled: true,
	    	layout: 'vertical',
    		align: 'right',
			verticalAlign: 'middle',
            labelFormatter: function() {
				return this.name + " - <span class='total'>"+this.y+"</span>"
            }
        },
        title: {
            text: 'Características educativas'
        },
        xAxis: {
            categories: ['Sin escolaridad', 'Básica', 'Media Superior', 'Superior', 'No especificado'],
            allowDecimals: true,
            title: {
                text: 'Características educativas'
            },
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Porcentaje'
            },
        },
        plotOptions: {
            series: {
                events: {
                    legendItemClick: function (x) {
                        var i = this.index  - 1;
                        var series = this.chart.series[0];
                        var point = series.points[i];   

                        if(point.oldY == undefined)
                           point.oldY = point.y;

                        point.update({y: point.y != null ? null : point.oldY});
                    }
                }
            }
        },
        legend: {
            labelFormatter: function(){
                return names[this.index-1];
            }
        },
        series: [
            {
                pointWidth:20,
                color: colors[0],
                showInLegend:false,
                data: [
                    {y: <?php echo $total_educativas->sin_escolaridad ?>, name: 'Sin escolaridad', color: colors[0]},
                    {y: <?php echo $total_educativas->total ?>, name: 'Básica', color: colors[1]},
                    {y: <?php echo $total_educativas->media_superior ?>, name: 'Media Superior', color: colors[2]},
                    {y: <?php echo $total_educativas->superior ?>, name: 'Superior', color: colors[3]},
                    {y: <?php echo $total_educativas->no_especificado ?>, name: 'No especificado', color: colors[4]}
                ]
            },
            {color: '#03A678'},
            {color: '#555'},
            {color: '#ABB7B7'},
            {color: '#C0392B'},
            {color: '#68C3A3'}
            
        ],


});


    
  <?php 

    $totalPeaPnea = PeaPnea::where('id_municipio',$id_mun)->first();

?>   
 Highcharts.chart('grafica4', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03A678','#555','#ABB7B7','#C0392B'],
    title: {
        text: 'PEA y PNEA'
    },
    subtitle: {
        text: 'Población Económicamente Activa (PEA)<br>Población No Económicamente Activa (PNEA)'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Porcentaje',
        data: [
            ['PEA', <?php echo $totalPeaPnea->pea ?>,'%'],
            ['PNEA', <?php echo $totalPeaPnea->pnea ?>,'%']
        ]
    }]
});
    
    
    
   
<?php 

    $totalPO = PoblacionOcupada::where('id_municipio',$id_mun)->first();

?>   
        
 Highcharts.chart('grafica5', {
        chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: 'Población Ocupada'
    },
    xAxis: {
        categories: ['Población Ocupada']
    },
    yAxis:{
        min: 0,
        title: {
            text: 'Porcentaje'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>'+
       '<td style="padding:0"><b>{point.y:.2f}%</b></td></tr>',
       footerFormat: '</table>',
       shared: false,
       useHTML: true
    },
//    subtitle: {
//        text: 'Porcentaje de la población de 12 años y más con condición de actividad no específicada 0.1'
//    },
    plotOptions: {
        colum: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
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
        name: 'Total',
        data: [<?php echo $totalPO->pob_ocupada_total ?>]
    },{
        name: 'Hombres',
        data: [<?php echo $totalPO->pob_ocupada_hombres ?>]
    },{
        name: 'Mujeres',
        data: [<?php echo $totalPO->pob_ocupada_mujeres ?>]
    },]
}); 

 
 
<?php 

$totalPneaProfesiones = PneaProfesiones::where('id_municipio',$id_mun)->first();

?>   
 
 
Highcharts.chart('grafica6', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03A678','#555','#ABB7B7','#C0392B','#87D37C'],
    title: {
        text: 'No económicamente activa (PNEA)'
    },
    subtitle: {
        text: 'Número de la población de 12 años y más con condición de actividad no específicada 0.1'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Población',
        data: [
            ['Funcionarios,<br> profesionistas,<br> técnicos y<br> administrativos', <?php echo $totalPneaProfesiones->funcionarios ?>],
            ['Trabajadores <br>agropecuarios', <?php echo $totalPneaProfesiones->agropecuarios ?>],
            ['Trabajadores<br> en la industria', <?php echo $totalPneaProfesiones->industria ?>],
            ['Comerciantes y<br> trabajadores en<br> servicios diversos', <?php echo $totalPneaProfesiones->comerciantes ?>],
            ['No especificado', <?php echo $totalPneaProfesiones->no_especificado ?>],
        ]
    }]
});
     
<?php 

$totalAf = AfiliacionServiciosSalud::where('id_municipio',$id_mun)->first();

?>
 
Highcharts.chart('grafica7', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: 'Afiliación a servicios de salud'
    },
    xAxis: {
        categories: ['Servicios de salud']
    },
    yAxis:{
        min: 0,
        title: {
            text: 'Porcentaje'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>'+
       '<td style="padding:0"><b>{point.y:.2f}%</b></td></tr>',
       footerFormat: '</table>',
       shared: false,
       useHTML: true
    },
//    subtitle: {
//        text: 'Porcentaje de la población de 12 años y más con condición de actividad no específicada 0.1'
//    },
    plotOptions: {
        colum: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
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
        name: 'Seguro popular',
        data: [<?php echo $totalAf->seguro_popular ?>]
    },{
        name: 'IMSS',
        data: [<?php echo $totalAf->imss ?>]
    },{
        name: 'ISSSTE',
        data: [<?php echo $totalAf->issste ?>]
    },{
        name: 'Pemex, Defensa o Marina',
        data: [<?php echo $totalAf->pemex_defensa_marina ?>]
    },{
        name: 'Institución',
        data: [<?php echo $totalAf->institucion ?>]
    },{
        name: 'Otra institución',
        data: [<?php echo $totalAf->otra_institucion ?>]
    },]
});     

 <?php 
 
    $totalPD = PoblacionDesocupada::where('id_municipio',$id_mun)->first();

?>   
        
 Highcharts.chart('grafica8', {
        chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: 'Población Desocupada'
    },
    xAxis: {
        categories: ['Población Desocupada']
    },
    yAxis:{
        min: 0,
        title: {
            text: 'Porcentaje'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>'+
       '<td style="padding:0"><b>{point.y:.2f}%</b></td></tr>',
       footerFormat: '</table>',
       shared: false,
       useHTML: true
    },
//    subtitle: {
//        text: 'Porcentaje de la población de 12 años y más con condición de actividad no específicada 0.1'
//    },
    plotOptions: {
        colum: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
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
        name: 'Total',
        data: [<?php echo $totalPD->pob_desocupada_total ?>]
    },{
        name: 'Hombres',
        data: [<?php echo $totalPD->pob_desocupada_hombres ?>]
    },{
        name: 'Mujeres',
        data: [<?php echo $totalPD->pob_desocupada_mujeres ?>]
    },]
}); 
 
 <?php 
$totalTasa = TasaAlfabetizacion::where('id_municipio',$id_mun)->first();


?>   
 Highcharts.chart('grafica9', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    colors: ['#03A678','#555','#ABB7B7','#C0392B'],
    title: {
        text: 'Tasa de alfabetización por grupos de edad'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Porcentaje',
        data: [
            ['15 a 24 años', <?php echo $totalTasa->quince_a_veinticuatro ?>],
            ['25 y más años', <?php echo $totalTasa->veinticinco_y_mas ?>]
        ]
    }]
});
 
});






</script>

<script>
        $(function () {            
            $("#example1").DataTable();
        });
</script>
    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/general.js')); ?>"></script>

</body>
</html>
