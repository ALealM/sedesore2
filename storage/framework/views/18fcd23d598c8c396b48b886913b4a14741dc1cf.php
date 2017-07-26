<?php 
use App\Models\Municipio;

?>


<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">

    <h1 class="page-title ng-scope"><span class="fw-semi-bold">Resultados electorales y Representantes de Casilla</span></h1>
    <div class="row ng-scope">
        <div class="col-md-11">
            <div class="clearfix">
                <div><h2>Distritos electorales</h2></div><hr>
                <ul id="tabs1" class="nav nav-tabs pull-left">
                    
                    <?php if($dist==1): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/1"  aria-expanded="true" style="cursor: pointer">I</a>
                    </li>
                    <?php if($dist==2): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/2"  aria-expanded="false" style="cursor: pointer">II</a>
                    </li>
                    <?php if($dist==3): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/3"  aria-expanded="false" style="cursor: pointer">III</a>
                    </li>
                    <?php if($dist==4): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/4"  aria-expanded="false" style="cursor: pointer">IV</a>
                    </li>
                    <?php if($dist==5): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/5"  aria-expanded="false" style="cursor: pointer">V</a>
                    </li>
                    <?php if($dist==6): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/6"  aria-expanded="false" style="cursor: pointer">VI</a>
                    </li>
                    <?php if($dist==7): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/7"  aria-expanded="false" style="cursor: pointer">VII</a>
                    </li>
                    <?php if($dist==8): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/8"  aria-expanded="false" style="cursor: pointer">VIII</a>
                    </li>
                    <?php if($dist==9): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/9"  aria-expanded="false" style="cursor: pointer">IX</a>
                    </li>
                    <?php if($dist==10): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/10" d aria-expanded="false" style="cursor: pointer">X</a>
                    </li>
                    <?php if($dist==11): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/11" d aria-expanded="false" style="cursor: pointer">XI</a>
                    </li>
                    <?php if($dist==12): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/12" d aria-expanded="false" style="cursor: pointer">XII</a>
                    </li>
                    <?php if($dist==13): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/13" d aria-expanded="false" style="cursor: pointer">XIII</a>
                    </li>
                    <?php if($dist==14): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/14" d aria-expanded="false" style="cursor: pointer">XIV</a>
                    </li>
                    <?php if($dist==15): ?><li class="active"> <?php else: ?> <li> <?php endif; ?>
                        <a href="/casillas/15" d aria-expanded="false" style="cursor: pointer">XV</a>
                    </li>
                </ul>
            </div>

            <div id="tabs1c" class="tab-content">
                <div class="tab-pane clearfix active" id="tab<?php echo e($dist); ?>">
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