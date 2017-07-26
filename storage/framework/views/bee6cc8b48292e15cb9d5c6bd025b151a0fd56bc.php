

<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Escritorio <small><small>Sistema de Administración de Datos</small></small></h1>
        <div class="row">
           
            
            
            <div class="col-lg-8">
                <!-- minimal widget consist of .widget class. note bg-transparent - it can be any background like bg-gray,
                bg-primary, bg-white -->
                <section class="widget bg-transparent">
                    <!-- .widget-body is a mostly semantic class. may be a sibling to .widget>header or .widget>footer -->
                    <!--<div class="widget-body">-->
                        <div class="world">
                            <div class="rightPanel">
                                <h2>Seleccione un año</h2>

                                <div class="knobContainer">
                                    <input class="knob" data-width="80" data-height="80" data-min="2003" data-max="2013" data-cursor=true
                                           data-fgColor="#454545" data-thickness=.45 value="2009" data-bgColor="#c7e8ff"/>
                                </div>
                                <div class="areaLegend"></div>
                                <div class="plotLegend"></div>
                            </div>
                            <div class="map"></div>
                            <div style="clear: both;"></div>
                        </div>
                </section>
            </div>
            <!--<div class="col-lg-4">
                <section class="widget bg-transparent">
                    <header>
                        <h5>
                            Programas
                            <span class="fw-semi-bold">Beneficiarios</span>
                        </h5>
                        <div class="widget-controls widget-controls-hover">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#"><i class="fa fa-refresh"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <p>
                            <span class="circle bg-warning"><i class="fa fa-map-marker"></i></span>
                            58 Municipios
                        </p>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa1">   
                                </div>
                                <h6 class="name m-t-1">SEGURO POPULAR</h6>
                                <!--<p class="description deemphasize">Garantizar la tutela de derechos y el acceso a los servicios de salud, a través de la afiliación.</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-primary progress-sm js-progress-animate" value="100" max="100" style="width: 0%" data-width="60%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-1">75</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa2">   
                                </div>
                                <h6 class="name m-t-1">IMSS</h6>
                                <!--<p class="description deemphasize">P. to C. Conversion</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-danger js-progress-animate" value="100" max="100" style="width: 0%" data-width="39%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span  id="percent-2">84</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa3">   
                                </div>
                                <h6 class="name m-t-1">PROSPERA IMSS</h6>
                                <!--<p class="description deemphasize">Average Bitrate</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-success js-progress-animate" value="100" max="100" style="width: 0%" data-width="80%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-3">92</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa4">   
                                </div>
                                <h6 class="name m-t-1">Programa de Fomento a la Agricultura</h6>
                                <!--<p class="description deemphasize">Average Bitrate</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-success js-progress-animate" value="100" max="100" style="width: 0%" data-width="80%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-3">92</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa5">   
                                </div>
                                <h6 class="name m-t-1">PROSPERA</h6>
                                <!--<p class="description deemphasize">Average Bitrate</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-success js-progress-animate" value="100" max="100" style="width: 0%" data-width="80%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-3">92</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa6">   
                                </div>
                                <h6 class="name m-t-1">LICONSA</h6>
                                <!--<p class="description deemphasize">Average Bitrate</p>-->
                                <!--<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-success js-progress-animate" value="100" max="100" style="width: 0%" data-width="80%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-3">92</span>%</small>
                                </span>
                            </div>
                        </div>
                        <div class="row progress-stats">
                            <div class="col-md-9">
                                <div class="programa7">   
                                </div>
                                <h6 class="name m-t-1">ISSSTE</h6>
                                <!--<p class="description deemphasize">Average Bitrate</p>-->
                                <!--s<div class="bg-white progress-bar">
                                    <progress class="progress progress-sm progress-success js-progress-animate" value="100" max="100" style="width: 0%" data-width="80%"></progress>
                                </div>
                            </div>
                            <div class="col-md-3 text-xs-center">
                                <span class="status rounded rounded-lg bg-body-light">
                                    <small><span id="percent-3">92</span>%</small>
                                </span>
                            </div>
                        </div>
                        <h6 class="fw-semi-bold mt">Map Distributions</h6>
                        <p>Tracking: <strong>Active</strong></p>
                        <p>
                            <span class="circle bg-warning"><i class="fa fa-cog"></i></span>
                            391 elements installed, 84 sets
                        </p>
                        <div class="input-group mt">
                            <input type="text" class="form-control" placeholder="Search Map">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search text-gray"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </section>
            </div>-->
        </div>
        
        
        
        
         <div class="row" id="cargainfo" >
             <div class="col-lg-10">
                 <section class="widget">
            <header>
                <h4>Total <span class="fw-semi-bold">Beneficiarios</span></h4>
            </header>
                     
                     
                <!-------->
                
                <div class="row">
                
                <?php $i=1; ?>    
                <?php $__currentLoopData = $programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-lg-4 animated fadeInDownBig" style="cursor: pointer" onclick="benefPrograma(<?php echo e($programa->id); ?>,<?php echo e($id_mun); ?>)">
                    <section class="widget">
                        <!-- .widget>header is generally a place for widget title and widget controls. see .widget in _base.scss -->
                        <header>
                            <h6>
                                <img src=<?php echo e(asset("img/".$programa->logo)); ?> style="width:30px; height:auto;"/><b><?php echo $programa->nombre; ?></b>
                            </h6>
                        </header>
                        <div class="widget-body">
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6 class="name fs-sm">Total beneficiarios</h6>
                                    <p class="value"><?php echo $programa->total; ?></p>
                                </div>
                            </div>
                            <div class="bg-gray-lighter progress-bar">
                                <progress class="progress progress-xs progress-success" value="100" max="100" style="width: 60%"></progress>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </div>
            </section>    
                
                <!-------->
            <section class="widget">
                <div class="row">
                    <?php if($progr==0): ?>
                    <div class="pagAjax" id="pagAjax_form"data-url="<?php echo url('prueba2/'.$id_mun); ?>">
                    <?php else: ?>
                    <div class="pagAjax" id="pagAjax_form"data-url="<?php echo url('prueba2/'.$id_mun.'/'.$progr); ?>">
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