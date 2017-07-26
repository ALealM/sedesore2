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
                <h1 class="page-title" style="font-size: 25px;"><span class="widget-icon"><i class="fa fa-map-marker" style="color:#555;"></i></span> <?php echo e($municipio->municipio); ?></h1>
            </div>
            <?php endif; ?>
       

        <div class="row" id="cargainfo" >
            <div class="col-lg-10">
       
            <!---->
                <section class="widget">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover dataTable no-footer table-success" role="grid">
                                <thead style="background-color: #03A678; color: #ffffff">
                                    <tr>
                                        <th colspan="2">Composición por edad y sexo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Población total*</td>
                                        <td><p><b><?php echo e(number_format($composicion->poblacion_total)); ?> <span style="font-size: 10px">(Representa el <?php echo e(round(($composicion->poblacion_total/$demogEst->poblacion_total)*100,2)); ?>% de la población estatal)</span></b></p></td>
                                    </tr>
                                    <tr>
                                        <td>Población hombres-mujeres</td>
                                        <td><p><b><?php echo e($composicion->relacion_hombres_mujeres); ?> <span style="font-size: 10px">(Existen <?php echo e(number_format($composicion->relacion_hombres_mujeres)); ?> hombres por cada 100 mujeres)</span></b></p></td>
                                    </tr>
                                    <tr>
                                        <td>Edad mediana</td>
                                        <td><p><b><?php echo e($composicion->edad_media); ?> <span style="font-size: 10px">(La mitad de la población tiene <?php echo e(number_format($composicion->edad_media)); ?> años o menos)</span></b></p></td>
                                    </tr>
                                    <tr>
                                        <td>Razón de dependencia por edad</td>
                                        <td><p><b><?php echo e($composicion->razon_dependencia_edad); ?> <span style="font-size: 10px">(Existen <?php echo e(number_format($composicion->razon_dependencia_edad)); ?> personas en edad de dependencia por cada 100 en edad productiva)</span></b></p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 10px"><b>*En viviendas particulares habitadas</b></td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div>
                                            <div id="grafica9" height="400"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="mt col-lg-12 col-md-12">
                            <!---->
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div>
                                            <div id="grafica2" height="400"></div>
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
                                            <div id="grafica5" height="400"></div>
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
                                            <div id="grafica7" height="400"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>    


                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div>
                                            <div id="grafica8" height="400"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!---->
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>