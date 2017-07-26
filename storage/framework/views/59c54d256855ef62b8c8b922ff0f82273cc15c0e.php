

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
                                Sistema de Información Estadística <span class="fw-semi-bold">SIE</span>   <span style="font-size:16px;">(Sitio en construcción)</span></h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>        
        
            <?php if($id_mun!=0): ?>
            <div class="col-lg-10" style="text-align:center">
                <h1 class="page-title" style="font-size: 25px;"><span class="widget-icon"><i class="fa fa-map-marker" style="color:#555;"></i></span> <?php echo e($munic->municipio); ?></h1>
            </div>
            <?php endif; ?>

<div class="row">
<div class="col-lg-8">
                <!-- minimal widget consist of .widget class. note bg-transparent - it can be any background like bg-gray,
                bg-primary, bg-white -->
                <section class="widget bg-transparent">
                    <!-- .widget-body is a mostly semantic class. may be a sibling to .widget>header or .widget>footer -->
                    <!--<div class="widget-body">-->
                        <div class="world">
                            <div class="rightPanel">
                                <!--<h2>Seleccione un año</h2>

                                <div class="knobContainer">
                                    <input class="knob" data-width="80" data-height="80" data-min="2003" data-max="2013" data-cursor=true
                                           data-fgColor="#454545" data-thickness=.45 value="2009" data-bgColor="#c7e8ff"/>
                                </div>-->
                                <div class="areaLegend"></div>
                                <div class="plotLegend"></div>
                            </div>
                            <div class="map" style="background-color: white; border: 1px dotted #555;"></div>
                            <div style="clear: both;"></div>
                            <div class="row" id="cargainfo" style="margin:5% 0 5% 0;">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <div class="ng-scope" style="cursor: pointer" onclick="fichamunicipal(<?php echo e($id_mun); ?>)">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <section class="widget text-white" style="height: 70px; background-color: #03A678 !important;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="widget-body clearfix">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <?php if($id_mun!=0): ?>
                                                                <h5 class="no-margin"><i class="fa fa-list-ul fa-2x"></i>
                                                                    <a href="<?php echo e(url('ficha_municipal/'.$id_mun)); ?>" style="color:white;">Información general del municipio</a></h5>
                                                                <?php else: ?>
                                                                <h5 class="no-margin"><i class="fa fa-list-ul fa-2x"></i>
                                                                    <a href="<?php echo e(url('ficha_estatal/'.$id_mun)); ?>" style="color:white;">Información general del estado</a></h5>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section> 
                                        </div>
                                    </div>

                                    <div class="ng-scope" style="cursor: pointer" onclick="graficamunicipal(<?php echo e($id_mun); ?>)">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <section class="widget text-white" style="height: 70px; background-color: #03A678 !important;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="widget-body clearfix">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <?php if($id_mun!=0): ?>
                                                                <h5 class="no-margin">
                                                                    <i class="fa fa-bar-chart fa-2x"></i>
                                                                    <a href="<?php echo e(url('grafica_municipal/'.$id_mun)); ?>" style="color:white;">Gráficas del municipio</a>
                                                                </h5>
                                                                <?php else: ?>
                                                                <h5 class="no-margin">
                                                                    <i class="fa fa-bar-chart fa-2x"></i>
                                                                    <a href="<?php echo e(url('grafica_municipal/'.$id_mun)); ?>" style="color:white;">Gráficas del estado</a>
                                                                </h5>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section> 
                                        </div>
                                    </div>
                                </div>  
                            </div>
              
                        </div>
                </section>
            </div>
            <div class="col-lg-4"> 
                <div class="col-md-8">
                    <section class="widget bg-transparent">
                        <header><h4>Programas <span class="fw-semi-bold">Beneficiarios</span></h4>
                        </header>
                        <div class="widget-body">
                            <p>
                                <span class="circle bg-warning"><i class="fa fa-map-marker"></i>
                                </span> 58 municipios
                            </p>
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $programasT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                            /*$color = ['#006633','#C0392B','#03A678','#555','#ABB7B7','#006633','#C0392B','#03A678','#555','#ABB7B7'];*/
                            $color = ['progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger'];?>
                            <?php 
                            if($progTotal==0){
                            $porProg =  0;
                            }else{
                            $porProg = ($programa->total/$progTotal)*100;
                            }
                            
                            ?>
                            <div class="row progress-stats">
                                <div class="col-sm-8">
                                    <div> 
                                    <img src=<?php echo e(asset("img/".$programa->programa()->logo)); ?> style="width:30px; height:auto;"/>
                                </div>
                                    <h5 class="name" style="font-weight:400;"><?php echo $programa->programa()->nombre; ?></h5>
                                    <div class="progress-xs bg-white progress ng-isolate-scope" data-progressbar="" data-sn-progress-animate="" data-value="39" ><!--data-type="danger"-->
                                        <div class="progress-bar  <?php echo $color[$i];?>"  ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="39%" style="min-width: 0px; opacity: 1; width: <?php echo e($porProg); ?>%;" ng-transclude=""></div>
                                    </div>                                        
                                </div>
                                <div class="col-sm-4 text-align-center">
                                    <span class="status rounded rounded-lg bg-body-light">
                                        <small>
                                            <span data-animate-number=""><b><?php echo number_format($programa->total); ?></b>
                                            </span>
                                        </small>                                            
                                    </span>
                                </div>
                            </div>  
                            
                            
                            <?php $i ++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                </div>
        </div>




        <div class="row" id="cargainfo" >
            <div class="col-lg-10">
                <section class="widget">
                    <header>
                        <?php if($id_mun==0): ?>
                        <h4>Programas del Estado de <span class="fw-semi-bold">San Luis Potosí</span> </h4>
                        <?php else: ?>
                        <h4>Programas del municipio de <span class="fw-semi-bold"><?php echo e($munic->municipio); ?></span> </h4>
                        <?php endif; ?>
                    </header>
                    
                    <!-------->
                    
                    <div class="row ng-scope">

                        <?php $i = 1; ?>    
                        <?php $j=1; ?>
                        <?php $__currentLoopData = $programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php 
                            /*$color = ['#006633','#C0392B','#03A678','#555','#ABB7B7','#006633','#C0392B','#03A678','#555','#ABB7B7'];*/
                            $color = ['progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger','progress-bar-info','progress-bar-success', 'progress-bar-danger'];?>
                            <?php 
                            if($progTotal==0){
                            $porProg =  0;
                            }else{
                            $porProg = ($programa->total/$progTotal)*100;
                            }
                            ?>
                        <?php if($j == 1 || $j%3==0): ?>
                        <div class="row" style="margin-left: 0px; margin-right: 0px; "> 
                        <?php endif; ?>
                        <div class="col-lg-4" style="cursor: pointer" onclick="benefPrograma(<?php echo e($programa->id_programa); ?>,<?php echo e($id_mun); ?>)">
                            <section class="widget bg-gray text-white">
                                <div class="widget-body clearfix">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <span class="widget-icon"><img src=<?php echo e(asset("img/".$programa->programa()->logo)); ?> style="width:60px; height:auto;"/></span>
                                        </div>
                                        <div class="col-xs-9">
                                            <h5 class="no-margin"><b><?php echo $programa->programa()->nombre; ?></b></h5>
                                            <?php if($id_mun==0): ?>
                                            <p class="h2 no-margin fw-normal"><p class="value"><?php echo number_format($programa->total); ?> / <?php echo number_format($programa->total_general); ?></p></p>
                                            <?php else: ?>
                                            <p class="h2 no-margin fw-normal"><p class="value"><?php echo number_format($programa->total); ?></p></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:10px;">
                                        <div class="progress-xs bg-white progress ng-isolate-scope" data-progressbar="" data-sn-progress-animate="" data-value="39" ><!--data-type="danger"-->
                                            <div class="progress-bar  <?php echo $color[$i];?>"  ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" ng-style="{width: (percent < 100 ? percent : 100) + '%'}" aria-valuetext="39%" style="min-width: 0px; opacity: 1; width: <?php echo e($porProg); ?>%;" ng-transclude=""></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <?php if($j%3==0): ?>
                        </div> 
                        <?php endif; ?>
                        <?php $j++; ?>
                        
                        <?php $i++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $j-=1; ?>
                    <?php if($i%3>0): ?>
                    </div> 
                    <?php endif; ?>
                    </div>
                </section>  
                
                
                
                
                <?php if($id_mun!=0): ?>
                <section class="widget">
                    <div class="row">
                        <div class="panel-group mb-lg" id="accordion" data-toggle="collapse">
                        <?php $__currentLoopData = $agrupadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrupador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading collapsed" style="cursor: pointer">
                                    <h5 class="panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?php echo $agrupador->id; ?>" aria-expanded="true"><b>Población de <?php echo e($agrupador->descripcion); ?></b><i class="fa fa-angle-down pull-right"></i></a>
                                  </h5>
                                </div>
                                <div id="collapse<?php echo $agrupador->id; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                    <?php $__currentLoopData = $agrupador->localidades($id_mun); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <a onclick="benefLoc(<?php echo e($id_mun); ?>,<?php echo e($localidad->id); ?>)" style="cursor:pointer; color: #006633"><?php echo $localidad->localidad; ?></a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
                <?php endif; ?>

                <!-------->
                <section class="widget">
                    <div class="row table-responsive">
                        <?php if($progr==0): ?>
                        <div class="pagAjax" id="pagAjax_form"data-url="<?php echo url('index/'.$id_mun); ?>">
                            <?php else: ?>
                            <div class="pagAjax" id="pagAjax_form"data-url="<?php echo url('index/'.$id_mun.'/'.$progr); ?>">
                                <?php endif; ?>

                                <?php echo $__env->make('principal.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                </section>
                  
                                    
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