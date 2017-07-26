<?php ?>
<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Sistema de Análisis')); ?></title>

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

        <!-- Scripts -->


        <!-- De plantilla -->
        <?php echo Html::style('css/tether.min.css'); ?>

        <?php echo Html::style('css/bootstrap.min.css'); ?>

        <?php echo Html::style('css/application.min.css'); ?>

        <?php echo Html::style('css/datatables.min.css'); ?>

        <?php echo Html::style('css/general.css'); ?>

        <?php echo Html::style('css/bootstrap-datepicker.min.css'); ?>

        <?php echo Html::style('css/select2.min.css'); ?>

        <?php echo Html::style('css/clockpicker/bootstrap-clockpicker.min.css'); ?>

        <?php echo Html::style('css/sweet-alert.css'); ?>

        <?php echo Html::style('css/controlpagajax.css'); ?>

        
        <style type="text/css">html,body{height:100%;margin:0;padding:0;}h1{margin:0;padding-top:20px;}fieldset{padding:none;border:none;}#container{height:100%;width:600px;margin:0 auto;padding:0 50px;background:#eee;}</style>

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

        </style>
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>

            ;
        </script>
        <?php echo Html::script('js/tether.min.js'); ?>

        <?php echo Html::script('js/controlpagajax.js'); ?>

        <?php echo Html::script('js/bootstrap.min.js'); ?>

        <?php echo Html::script('js/datatables.min.js'); ?>

        <?php echo Html::script('js/select2.min.js'); ?>

        <?php echo Html::script('js/bday-picker.min.js'); ?>

        <?php echo Html::script('js/sweet-alert.min.js'); ?>

        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/widgster/widgster.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/pace.js/pace.js')); ?>" data-pace-options='{ "target": ".content-wrap", "ghostTime": 1000 }'></script>
        <script src="<?php echo e(asset('vendor/jquery-touchswipe/jquery.touchSwipe.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery-touchswipe/jquery.touchSwipe.js')); ?>"></script>

        <!-- common app js -->
        <script src="<?php echo e(asset('js/settings.js')); ?>"></script>
        

        <!-- page specific libs -->
        <script id="test" src="<?php echo e(asset('vendor/underscore/underscore.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery.sparkline/index.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery.sparkline/index.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/d3/d3.min.js')); ?>"></script>
        <!--<script src="vendor/rickshaw/rickshaw.min.js"></script>-->
        <!--<script src="vendor/raphael/raphael-min.js"></script>-->
<!--        <script src="../vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
        <script src="../vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
        <script src="../vendor/jQuery-Mapael/js/maps/world_countries.js"></script>-->
        <script src="<?php echo e(asset('vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery-animateNumber/jquery.animateNumber.min.js')); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
              $("#picker1").birthdaypicker({});
              $("#picker2").birthdaypicker({
                futureDates: true,
                maxYear: 2020,
                maxAge: 75,
                defaultDate: "10-17-1980"
              });
              $("#picker3").birthdaypicker({
                dateFormat: "bigEndian",
                monthFormat: "long",
                placeholder: false,
                hiddenDate: false
              });
            });
          </script>

    </head>
    <body>
        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Page wrapper -->
        <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="content-wrap">
            <main class="content" role="main">
            <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin-fast"></i>
        </div>

        <!-- Scripts -->

        <script>
            $(document).ready(function () {
                $(".SelectAuto").select2();
                $(".SelectAutoOne").select2({
                    tags: true,
                    maximumSelectionLength: 1
                });

                $(window).resize(function () {
                    $(".SelectAuto").select2();
                    $(".SelectAutoOne").select2({
                        tags: true,
                        maximumSelectionLength: 1
                    });
                });
            });

        </script>
        <script>
            $(function () {
                $("#example1").DataTable({
                    "order": []
                });
            });
            $(function () {
                $(".example").DataTable({
                    "order": []
                });
            });
        </script>
        
        
        <?php echo Html::script('js/app.js'); ?>

        <?php echo Html::script('js/general.js'); ?>


    </body>
    <?php echo $__env->make('common.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>
