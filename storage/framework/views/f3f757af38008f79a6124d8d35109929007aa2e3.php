<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">
        <div class="row" style="margin: 2% 0 2% 0;">
            <div class="col-lg-10">
                <section>
                    <div class="widget-body">
                        <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                            <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                                Sistema de Información Estadística <span class="fw-semi-bold">SIE</span></h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>        
        
        
        
            <?php if($id_mun!=0): ?>
            <div class="col-lg-10" style="text-align:center">
                <h1 class="page-title" style="font-size: 25px;"><span class="widget-icon"><i class="fa fa-map-marker" style="color:#555;"></i></span> San Luis Potosí</h1>
            </div>
            <?php endif; ?>
       

        <div class="row" id="cargainfo" >
            <div class="col-lg-10">
                
                <div class="row ng-scope"> 
                <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 450px; background-color: #c0392b;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">San Luis Potosí</h5>
                                            <img src="<?php echo e(asset('img/escudos/28.png')); ?>" class="img-circle circle-border m-b-md" alt="profile" width="80%" height="auto">
                                            <h3 class="font-bold no-margins">
                                                <br>Escudo de <br>San Luis Potosí
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>
                
                <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 450px; background-color: #555;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin" class="font-bold no-margins" style="color:white;">
                                                <span class="widget-icon"><img src="<?php echo e(asset('iconos/presidente.png')); ?>" width="15%" height="auto"></span> <b>Gobernador</b>
                                            </h5>
                                            <img src="<?php echo e(asset('img/manuel-carreras.jpg')); ?>" class="img-circle circle-border m-b-md" alt="profile" width="80%" height="auto">
                                            <h4 class="font-bold no-margins">
                                               <br>Dr. Juan Manuel Carreras
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>
                    
                    
                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 450px; background-color: #ABB7B7;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin" class="font-bold no-margins" style="color:white;">
                                                <span class="widget-icon"></span> <b>Partido político</b>
                                            </h5>
                                            <h3 class="font-bold no-margins">
                                                PRI
                                            </h3>
                                            <img src="<?php echo e(url('img/logo_pri.png')); ?>" style="width: 100%; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>
                    
                    
                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 450px; background-color: #03a678;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin" class="font-bold no-margins" style="color:white;">
                                                <span class="widget-icon"></span> <b>Diputados</b>
                                            </h5>
                                            <h3 class="font-bold no-margins">
                                                
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>
                    
                    
                    
                </div>  
                
                
                
                <div class="row ng-scope">
                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 430px; background-color: #03A678 !important;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 100px">
                                            <span class="widget-icon"><i class="glyphicon glyphicon-globe fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Población Total</h5>
                                            <p class="h2 no-margin fw-normal">2,585,780</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Mayores a 18 años*</h5>
                                            <p class="value4">3,873,629</p>
                                            <p class="value4" style="font-size: 10px">*Elaboración propia</p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Lista nominal 2015</h5>
                                            <p class="value4">3,749,270</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 430px; background-color: #555;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 100px">
                                            <span class="widget-icon"><i class="glyphicon glyphicon-home fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Viviendas particulares habitadas</h5>
                                            <p class="h2 no-margin fw-normal">1,420,466</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 430px; background-color: #ABB7B7;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row" style="height:100%;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 100px">
                                            <span class="widget-icon"><i class="glyphicon glyphicon-map-marker fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Distrito electoral federal</h5>
                                            <p class="h2 no-margin fw-normal">2015: <?php echo $distritos->distrito_electoral_federal_15 ?></p>
                                            <p class="h2 no-margin fw-normal">2018: <?php echo $distritos->distrito_electoral_federal_18 ?></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Distrito electoral local</h5>
                                            <p class="h2 no-margin fw-normal">2015: <?php echo $distritos->distrito_electoral_local_15 ?></p>
                                            <p class="h2 no-margin fw-normal">2018: <?php echo $distritos->distrito_electoral_local_18 ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>

                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 430px; background-color: #c0392b;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 100px">
                                            <span class="widget-icon"><i class="glyphicon glyphicon-screenshot fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin">Secciones</h5>
                                            <p class="h2 no-margin fw-normal">2015: <?php echo $distritos->secciones_15 ?></p>
                                            <p class="h2 no-margin fw-normal">2018: <?php echo $distritos->secciones_18 ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div>   

                </div>
                
                
                <div class="row ng-scope">
                    
                    <div class="col-md-3 col-sm-6 ">
                        <section class="widget text-white" style="min-height: 430px; background-color: #ABB7B7;">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="min-height: 100px">
                                            <span class="widget-icon"><i class="fa fa-user-plus fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h5 class="no-margin h3">Promovidos</h5>
                                            <p class="no-margin fw-normal">Número total: <span class="h2">50,892</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                    </div> 
                    
                    
                    
                </div>
            
                
                
<!--                <div class="row ng-scope">    
                
                    
                
                
                <div class="row"> 
                    <div class="col-md-3 col-sm-6">
                        <div class="widget navy-bg p-xl" style="background-color: #868484; color: white;">
                            <h2 style="color:white;">
                                <b>Secretario Gral. del Ayto</b>
                            </h2>
                            <h3></h3>
                        </div>
                    </div>
                        
                        <div class="col-md-3 col-sm-6 ">
                            <div class="widget red-bg p-xl" style="background-color: #abb7b7; color: white;">
                                <h2 style="color:white;">
                                    <b>Tesorero</b>
                                </h2>
                                <h3></h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                            <div class="widget yellow-bg p-lg" style="background-color: #03a678; color: white;">
                                <h2 style="color:white;">
                                    <b>Coordinador de desarrollo social</b>
                                </h2>
                                <h3></h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 ">
                            <div class="widget navy-bg p-xl" style="background-color: #abb7b7; color: white;">
                                <h2 style="color:white;">
                                    <b>Contralor interno</b>
                                </h2>
                                <h3></h3>
                            </div>
                        </div>
                </div>
        
                    
                 </div>-->
                
            
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