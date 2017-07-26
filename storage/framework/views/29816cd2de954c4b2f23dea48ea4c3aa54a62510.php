<?php 
use App\Models\partidos\Partidos;
use App\Models\partidos\PartidosTotales;
use App\Models\Programas;
use App\Models\BeneficiariosProgTot;
use App\Models\PromovidosTotales;
use App\Models\PromotoresTotales;
?>


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
                            <h3>RENTABILIDAD - VOTACIÓN AYUNTAMIENTO</h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>        
        
        <div class="row ng-scope">
          <hr class="col-lg-10 col-md-10" style="border-top: 1px dashed #8c8b8b;">
        
          <div class="col-lg-10 col-md-10">
          <table class="table table-striped table-hover col-lg-10 col-md-10 dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
              <thead style="background-color: #03A678; color: #fff; font-size:0.7em;">
              <th colspan="2" style="border-bottom: 1px solid #fff;"></th>  
              <th colspan="6" style="border-left: 1px solid #fff;border-right: 1px solid #fff;border-bottom: 1px solid #fff; text-align: center;">2015</th>
              <th  colspan="4" style="border-bottom: 1px solid #fff;text-align: center;">2012</th>
              </thead>
              <thead style="background-color: #03A678; color: #fff; font-size:0.7em;">
                <th  style="border-right: 1px solid #fff;text-align: center;">MUNICIPIO</th>
                <th  style="border-right: 1px solid #fff;text-align: center;">SECCION</th>
                <th>L.NOM</th>
                <th>PARTICIPACION</th>
                <th>PARTICIPACION EF</th>
                <th>PRI</th>
                <th>RENTABILIDAD</th>
                <th style="border-right: 1px solid #fff;text-align: center;">RENT EFE</th>
                <th>LN</th>
                <th>Var.12.15</th>
                <th>V PRI</th>
                <th>Var.12.15</th>
              </thead>
              <tbody>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1179</td>
                  <td>177</td>
                  <td>73%</td>
                  <td>130</td>
                  <td>24</td>
                  <td>14%</td>
                  <td>18.5%</td>
                  <td>171</td>
                  <td>3%</td>
                  <td>58</td>
                  <td>-142%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1180</td>
                  <td>1021</td>
                  <td>69%</td>
                  <td>704</td>
                  <td>136</td>
                  <td>13%</td>
                  <td>19.3%</td>
                  <td>993</td>
                  <td>3%</td>
                  <td>257</td>
                  <td>-89%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1181</td>
                  <td>912</td>
                  <td>68%</td>
                  <td>620</td>
                  <td>343</td>
                  <td>38%</td>
                  <td>55.3%</td>
                  <td>879</td>
                  <td>4%</td>
                  <td>288</td>
                  <td>16%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1182</td>
                  <td>131</td>
                  <td>59%</td>
                  <td>77</td>
                  <td>16</td>
                  <td>12%</td>
                  <td>20.8%</td>
                  <td>133</td>
                  <td>-2%</td>
                  <td>62</td>
                  <td>-288%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1183</td>
                  <td>1046</td>
                  <td>74%</td>
                  <td>769</td>
                  <td>307</td>
                  <td>29%</td>
                  <td>39.9%</td>
                  <td>953</td>
                  <td>9%</td>
                  <td>346</td>
                  <td>-13%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1184</td>
                  <td>720</td>
                  <td>72%</td>
                  <td>519</td>
                  <td>248</td>
                  <td>34%</td>
                  <td>47.8%</td>
                  <td>648</td>
                  <td>10%</td>
                  <td>339</td>
                  <td>-37%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1185</td>
                  <td>646</td>
                  <td>60%</td>
                  <td>386</td>
                  <td>111</td>
                  <td>17%</td>
                  <td>28.8%</td>
                  <td>620</td>
                  <td>4%</td>
                  <td>217</td>
                  <td>-95%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1186</td>
                  <td>1267</td>
                  <td>67%</td>
                  <td>847</td>
                  <td>220</td>
                  <td>17%</td>
                  <td>26.0%</td>
                  <td>1,048</td>
                  <td>17%</td>
                  <td>290</td>
                  <td>-32%</td>
              </tr>
              <tr>
                  <td>Santa Catarina</td>
                  <td>1187</td>
                  <td>1875</td>
                  <td>69%</td>
                  <td>1289</td>
                  <td>339</td>
                  <td>18%</td>
                  <td>26.3%</td>
                  <td>1,628</td>
                  <td>13%</td>
                  <td>414</td>
                  <td>-22%</td>
              </tr>
              <tr>
                  <td colspan="2"></td>
                  <td>7795</td>
                  <td>68%</td>
                  <td>5341</td>
                  <td>1744</td>
                  <td>21%</td>
                  <td>31.4%</td>
                  <td>7,073</td>
                  <td>9.26%</td>
                  <td>2271</td>
                  <td colspan="2"></td>
              </tr>
            </tbody>
        </table>
        </div>  
        
          <div class="col-lg-3 col-md-3">
          <table class="table table-striped table-hover col-lg-10 col-md-10 dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                <tr>
                    <td>PARTICIPACIÓN EFECTIVA %</td>
                    <td>68.5%</td>
                </tr>
                <tr>
                    <td>VOTOS TOTALES PRI</td>
                    <td>1744</td>
                </tr>
                <tr>
                    <td>TOTAL DE LA VOTACIÓN %</td>
                    <td>32.7%</td>
                </tr>
                <tr>
                    <td>% DE ABSTENCIONISMO</td>
                    <td>31.5%</td>
                </tr>
                <tr>
                    <td>Votos 2015 vs 2012</td>
                    <td>-527</td>
                </tr>
                <tr>
                    <td>% sobre la L.NOM</td>
                    <td>6.76%</td>
                </tr>
          </table>
         </div>    
          
          <div class="col-lg-3 col-md-3">
          <table class="table table-striped table-hover col-lg-10 col-md-10 dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
                <tr>
                    <td colspan="4">2012</td>
                </tr>
                <tr>
                    <td>LN</td>
                    <td>7073</td>
                    <td><b>Votos totales PRI</b></td>
                    <td>2271</td>
                </tr>
                <tr>
                    <td  colspan="2">Participación EF</td>
                    <td  colspan="2">4801</td>
                </tr>
                <tr>
                    <td  colspan="2">% Abstencion</td>
                    <td  colspan="2">32%</td>
                </tr>
          </table>
         </div>    
          
          <div class="col-lg-3 col-md-3">
              <table class="table table-striped table-hover col-lg-10 col-md-10 dataTable no-footer"  role="grid" aria-describedby="datatable-table_info" style="border: 1px solid #555;">
                <tr>
                    <td><b>Meta 2018</b></td>
                    <td><b>2,189</b></td>
                </tr>
          </table>
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