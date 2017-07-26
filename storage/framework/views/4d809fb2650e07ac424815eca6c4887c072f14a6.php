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

?>



<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">
 
        <div class="row" style="margin: 2% 0 2% 0;">
            <div class="col-lg-10">
                <section>
                    <div class="widget-body">
                        <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                            <h3>10 MUNICIPIOS PRINCIPALES</h3>
                        </div>
                    </div>
                </section>
            </div>
        </div> 


 <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">  

      <div class="row ng-scope">

        <div class="col-lg-2 col-md-2">
                    <section class="widget">
                        <div class="row table-responsive">
                            <table class="table dataTable no-footer table-striped" role="grid" aria-describedby="example1_info">
                                <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">
                                    <tr>
                                        <th>Municipios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $top10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr><td><?php echo e($t10->municipio); ?></td></tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div> 

          <div class="mt col-lg-8 col-md-8">
              <section class="widget" style="background: none;">
                 
                  <div class="row ng-scope">
                      <div  class="col-lg-12">
                          <!---->
                          <div>
                              <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                      <div>
                                          <div id='top10'></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>  




</main>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>