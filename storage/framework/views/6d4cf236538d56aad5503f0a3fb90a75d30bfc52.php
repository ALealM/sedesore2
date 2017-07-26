

<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<?php 
use App\Models\ResultadoElectoral;
?>
<script type="text/javascript">

$(document).ready(function(){

$(".slidingDiv").hide();
$(".show_hide").show();

$('.show_hide').click(function(){
$(".slidingDiv").slideToggle();
});
//$(".slidingDiv2").hide();
$(".show_hide2").show();

$('.show_hide2').click(function(){
$(".slidingDiv2").slideToggle();
});

});

</script>
<style>
    .show_hide {
display:none;
}

</style>

<?php 

$resE = ResultadoElectoral::where('id_municipio', $id_mun)->where('anio',2015);
$valida = $resE->sum('votacion_valida');
$part1[0]['nom'] = 'PRI'; $part1[0]['cant'] = $resE->sum('pri'); $part1[0]['porc'] = round(($resE->sum('pri')/$valida)*100,2);
$part1[1]['nom'] = 'PAN'; $part1[1]['cant'] = $resE->sum('PAN'); $part1[1]['porc'] = round(($resE->sum('PAN')/$valida)*100,2); 
$part1[2]['nom'] = 'PVEM'; $part1[2]['cant'] = $resE->sum('PVEM'); $part1[2]['porc'] = round(($resE->sum('PVEM')/$valida)*100,2);  
$part1[3]['nom'] = 'PRD'; $part1[3]['cant'] = $resE->sum('PRD'); $part1[3]['porc'] = round(($resE->sum('PRD')/$valida)*100,2); 
$part1[4]['nom'] = 'MORENA'; $part1[4]['cant'] = $resE->sum('MORENA'); $part1[4]['porc'] = round(($resE->sum('MORENA')/$valida)*100,2);    
$part1[5]['nom'] = 'PCP'; $part1[5]['cant'] = $resE->sum('PCP'); $part1[5]['porc'] = round(($resE->sum('PCP')/$valida)*100,2); 
$part1[6]['nom'] = 'PNA'; $part1[6]['cant'] = $resE->sum('PNA'); $part1[6]['porc'] = round(($resE->sum('PNA')/$valida)*100,2); 
$part1[7]['nom'] = 'PT'; $part1[7]['cant'] = $resE->sum('PT'); $part1[7]['porc'] = round(($resE->sum('PT')/$valida)*100,2);    
$part1[8]['nom'] = 'PMC'; $part1[8]['cant'] = $resE->sum('PMC'); $part1[8]['porc'] = round(($resE->sum('PMC')/$valida)*100,2); 
$part1[9]['nom'] = 'PH'; $part1[9]['cant'] = $resE->sum('PH'); $part1[9]['porc'] = round(($resE->sum('PH')/$valida)*100,2);    
$part1[10]['nom'] = 'PES'; $part1[10]['cant'] = $resE->sum('PES'); $part1[10]['porc'] = round(($resE->sum('PES')/$valida)*100,2);  
$part1[11]['nom'] = 'CI'; $part1[11]['cant'] = $resE->sum('CI'); $part1[11]['porc'] = round(($resE->sum('CI')/$valida)*100,2); 
$part1[12]['nom'] = 'FNR'; $part1[12]['cant'] = $resE->sum('FNR'); $part1[12]['porc'] = round(($resE->sum('FNR')/$valida)*100,2);  
$part1[13]['nom'] = 'PRI_PVEM'; $part1[13]['cant'] = $resE->sum('PRI_PVEM'); $part1[13]['porc'] = round(($resE->sum('PRI_PVEM')/$valida)*100,2);   
$part1[14]['nom'] = 'PMC_PNA'; $part1[14]['cant'] = $resE->sum('PMC_PNA'); $part1[14]['porc'] = round(($resE->sum('PMC_PNA')/$valida)*100,2);  
$part1[15]['nom'] = 'PCP_PNA'; $part1[15]['cant'] = $resE->sum('PCP_PNA'); $part1[15]['porc'] = round(($resE->sum('PCP_PNA')/$valida)*100,2);  
$part1[16]['nom'] = 'PVEM_PMC'; $part1[16]['cant'] = $resE->sum('PVEM_PMC'); $part1[16]['porc'] = round(($resE->sum('PVEM_PMC')/$valida)*100,2);   
$part1[17]['nom'] = 'PAN_PVEM_PNA'; $part1[17]['cant'] = $resE->sum('PAN_PVEM_PNA'); $part1[17]['porc'] = round(($resE->sum('PAN_PVEM_PNA')/$valida)*100,2);   
$part1[18]['nom'] = 'PRD_PT_PNA'; $part1[18]['cant'] = $resE->sum('PRD_PT_PNA'); $part1[18]['porc'] = round(($resE->sum('PRD_PT_PNA')/$valida)*100,2); 
$part1[19]['nom'] = 'PT_PMC'; $part1[19]['cant'] = $resE->sum('PT_PMC'); $part1[19]['porc'] = round(($resE->sum('PT_PMC')/$valida)*100,2); 
$part1[20]['nom'] = 'PVEM_PNA'; $part1[20]['cant'] = $resE->sum('PVEM_PNA'); $part1[20]['porc'] = round(($resE->sum('PVEM_PNA')/$valida)*100,2);   
$part1[21]['nom'] = 'PRI_PNA'; $part1[21]['cant'] = $resE->sum('PRI_PNA'); $part1[21]['porc'] = round(($resE->sum('PRI_PNA')/$valida)*100,2);  
$part1[22]['nom'] = 'PRI_PVEM_PNA'; $part1[22]['cant'] = $resE->sum('PRI_PVEM_PNA'); $part1[22]['porc'] = round(($resE->sum('PRI_PVEM_PNA')/$valida)*100,2);   
$part1[23]['nom'] = 'PAN_PMC'; $part1[23]['cant'] = $resE->sum('PAN_PMC'); $part1[23]['porc'] = round(($resE->sum('PAN_PMC')/$valida)*100,2);  
$part1[24]['nom'] = 'PRD_PCP'; $part1[24]['cant'] = $resE->sum('PRD_PCP'); $part1[24]['porc'] = round(($resE->sum('PRD_PCP')/$valida)*100,2);  
$part1[25]['nom'] = 'PAN_PT'; $part1[25]['cant'] = $resE->sum('PAN_PT'); $part1[25]['porc'] = round(($resE->sum('PAN_PT')/$valida)*100,2); 
$part1[26]['nom'] = 'PRD_PCP_PMC'; $part1[26]['cant'] = $resE->sum('PRD_PCP_PMC'); $part1[26]['porc'] = round(($resE->sum('PRD_PCP_PMC')/$valida)*100,2);  
$part1[27]['nom'] = 'PRD_PT'; $part1[27]['cant'] = $resE->sum('PRD_PT'); $part1[27]['porc'] = round(($resE->sum('PRD_PT')/$valida)*100,2); 
$part1[28]['nom'] = 'PAN_PT_PMC'; $part1[28]['cant'] = $resE->sum('PAN_PT_PMC'); $part1[28]['porc'] = round(($resE->sum('PAN_PT_PMC')/$valida)*100,2); 
$part1[29]['nom'] = 'PRD_PT_PMC'; $part1[29]['cant'] = $resE->sum('PRD_PT_PMC'); $part1[29]['porc'] = round(($resE->sum('PRD_PT_PMC')/$valida)*100,2); 
$part1[30]['nom'] = 'PAN_PCP'; $part1[30]['cant'] = $resE->sum('PAN_PCP'); $part1[30]['porc'] = round(($resE->sum('PAN_PCP')/$valida)*100,2);  
$part1[31]['nom'] = 'PRD_PMC'; $part1[31]['cant'] = $resE->sum('PRD_PMC'); $part1[31]['porc'] = round(($resE->sum('PRD_PMC')/$valida)*100,2);  
$part1[32]['nom'] = 'PAN_PRD_PT_PVEM_PMC_PNA'; $part1[32]['cant'] = $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA'); $part1[32]['porc'] = round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2);  
$part1[33]['nom'] = 'PRD_PVEM_PCP'; $part1[33]['cant'] = $resE->sum('PRD_PVEM_PCP'); $part1[33]['porc'] = round(($resE->sum('PRD_PVEM_PCP')/$valida)*100,2);   
$part1[34]['nom'] = 'PCP_PMC_PNA'; $part1[34]['cant'] = $resE->sum('PCP_PMC_PNA'); $part1[34]['porc'] = round(($resE->sum('PCP_PMC_PNA')/$valida)*100,2);  
$part1[35]['nom'] = 'PRD_PT_PCP'; $part1[35]['cant'] = $resE->sum('PRD_PT_PCP'); $part1[35]['porc'] = round(($resE->sum('PRD_PT_PCP')/$valida)*100,2); 
$part1[36]['nom'] = 'PRD_PT_PMC_PNA'; $part1[36]['cant'] = $resE->sum('PRD_PT_PMC_PNA'); $part1[36]['porc'] = round(($resE->sum('PRD_PT_PMC_PNA')/$valida)*100,2); 
$part1[37]['nom'] = 'PAN_PRD_PT_PMC'; $part1[37]['cant'] = $resE->sum('PAN_PRD_PT_PMC'); $part1[37]['porc'] = round(($resE->sum('PAN_PRD_PT_PMC')/$valida)*100,2); 
$part1[38]['nom'] = 'PAN_PRD_PT'; $part1[38]['cant'] = $resE->sum('PAN_PRD_PT'); $part1[38]['porc'] = round(($resE->sum('PAN_PRD_PT')/$valida)*100,2); 
$part1[39]['nom'] = 'PRD_PT_PCP_PMC'; $part1[39]['cant'] = $resE->sum('PRD_PT_PCP_PMC'); $part1[39]['porc'] = round(($resE->sum('PRD_PT_PCP_PMC')/$valida)*100,2);


foreach ($part1 as $key1 => $row1) {
    $aux1[$key1] = $row1['cant'];
}
$vals = '';
$tend = '';
$cats = '';
array_multisort($aux1, SORT_DESC, $part1);
foreach ($part1 as $p1) {
    if($p1['cant']>0){
        $vals.= "{name: '".$p1['nom']."',data: [".$p1['cant']."]},";
        $tend.= $p1['cant'].",";
        $cats.= "'".$p1['nom']."',";
    }
}

?>

<script>
    $(document).ready(function () {
        Highcharts.chart('partidos', {
        chart: {
        type: 'column',
        options3d: {
            enabled: false,
            alpha: 45
        }
    },
    colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: '<b>POR PARTIDOS</b>'
    },
    xAxis: {
        categories: ['Partidos']
    },
    yAxis:{
        min: 0,
        title: {
            text: 'Votos'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>'+
       '<td style="padding:0"><b>{point.y}</b></td></tr>',
       footerFormat: '</table>',
       shared: false,
       useHTML: true
    },
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
    series: [<?php echo $vals; ?>]
});
    });

</script>
<?php

$part[0]['nom'] = 'PRI'; $part[0]['cant'] = $resE->sum('pri'); $part[0]['porc'] = round(($resE->sum('pri')/$valida)*100,2);
$part[1]['nom'] = 'PAN'; $part[1]['cant'] = $resE->sum('PAN'); $part[1]['porc'] = round(($resE->sum('PAN')/$valida)*100,2); 
$part[2]['nom'] = 'PVEM'; $part[2]['cant'] = $resE->sum('PVEM'); $part[2]['porc'] = round(($resE->sum('PVEM')/$valida)*100,2);  
$part[3]['nom'] = 'PRD'; $part[3]['cant'] = $resE->sum('PRD'); $part[3]['porc'] = round(($resE->sum('PRD')/$valida)*100,2); 
$part[4]['nom'] = 'MORENA'; $part[4]['cant'] = $resE->sum('MORENA'); $part[4]['porc'] = round(($resE->sum('MORENA')/$valida)*100,2);    
$part[5]['nom'] = 'PCP'; $part[5]['cant'] = $resE->sum('PCP'); $part[5]['porc'] = round(($resE->sum('PCP')/$valida)*100,2); 
$part[6]['nom'] = 'PNA'; $part[6]['cant'] = $resE->sum('PNA'); $part[6]['porc'] = round(($resE->sum('PNA')/$valida)*100,2); 
$part[7]['nom'] = 'PT'; $part[7]['cant'] = $resE->sum('PT'); $part[7]['porc'] = round(($resE->sum('PT')/$valida)*100,2);    
$part[8]['nom'] = 'PMC'; $part[8]['cant'] = $resE->sum('PMC'); $part[8]['porc'] = round(($resE->sum('PMC')/$valida)*100,2); 
$part[9]['nom'] = 'PH'; $part[9]['cant'] = $resE->sum('PH'); $part[9]['porc'] = round(($resE->sum('PH')/$valida)*100,2);    
$part[10]['nom'] = 'PES'; $part[10]['cant'] = $resE->sum('PES'); $part[10]['porc'] = round(($resE->sum('PES')/$valida)*100,2);  
$part[11]['nom'] = 'CI'; $part[11]['cant'] = $resE->sum('CI'); $part[11]['porc'] = round(($resE->sum('CI')/$valida)*100,2); 
$part[12]['nom'] = 'FNR'; $part[12]['cant'] = $resE->sum('FNR'); $part[12]['porc'] = round(($resE->sum('FNR')/$valida)*100,2);

if($resE->sum('PRI_PVEM')>0){
if($part[0]['cant'] > $part[2]['cant']) 
{$part[0]['cant'] += $resE->sum('PRI_PVEM') + $part[2]['cant']; 
$part[0]['porc'] += round(($resE->sum('PRI_PVEM')/$valida)*100,2) + $part[2]['porc'];
$part[2]['cant'] = 0; $part[2]['porc'] = 0; $part[0]['nom'] .= " (PRI_PVEM)";}
else 
{$part[2]['cant'] += $resE->sum('PRI_PVEM') + $part[0]['cant']; 
$part[2]['porc'] += round(($resE->sum('PRI_PVEM')/$valida)*100,2) + $part[0]['porc'];
$part[0]['cant'] = 0; $part[0]['porc'] = 0; $part[2]['nom'] .= " (PRI_PVEM)";}
}

if($resE->sum('PMC_PNA')>0){
if($part[8]['cant'] > $part[6]['cant']) 
{$part[8]['cant'] += $resE->sum('PMC_PNA') + $part[6]['cant']; 
$part[8]['porc'] += round(($resE->sum('PMC_PNA')/$valida)*100,2) + $part[6]['porc'];
$part[6]['cant'] = 0; $part[6]['porc'] = 0; $part[8]['nom'] .= " (PMC_PNA)";}
else 
{$part[6]['cant'] += $resE->sum('PMC_PNA') + $part[8]['cant']; 
$part[6]['porc'] += round(($resE->sum('PMC_PNA')/$valida)*100,2) + $part[8]['porc'];
$part[8]['cant'] = 0; $part[8]['porc'] = 0; $part[6]['nom'] .= " (PMC_PNA)";}
}

if($resE->sum('PCP_PNA')>0){
if($part[5]['cant'] > $part[6]['cant']) 
{$part[5]['cant'] += $resE->sum('PCP_PNA');  + $part[6]['cant'];
$part[5]['porc'] += round(($resE->sum('PCP_PNA')/$valida)*100,2) + $part[6]['porc'];
$part[6]['cant'] = 0; $part[6]['porc'] = 0; $part[5]['nom'] .= " (PCP_PNA)";}
else 
{$part[6]['cant'] += $resE->sum('PCP_PNA');  + $part[5]['cant'];
$part[6]['porc'] += round(($resE->sum('PCP_PNA')/$valida)*100,2) + $part[5]['porc'];
$part[5]['cant'] = 0; $part[5]['porc'] = 0; $part[6]['nom'] .= " (PCP_PNA)";}
}

if($resE->sum('PVEM_PMC')>0){
if($part[2]['cant'] > $part[8]['cant']) 
{$part[2]['cant'] += $resE->sum('PVEM_PMC') + $part[8]['cant']; 
$part[2]['porc'] += round(($resE->sum('PVEM_PMC')/$valida)*100,2) + $part[8]['porc'];
$part[8]['cant'] = 0; $part[8]['porc'] = 0; $part[2]['nom'] .= " (PVEM_PMC)";}
else 
{$part[8]['cant'] += $resE->sum('PVEM_PMC') + $part[2]['cant']; 
$part[8]['porc'] += round(($resE->sum('PVEM_PMC')/$valida)*100,2) + $part[2]['porc'];
$part[2]['cant'] = 0; $part[2]['porc'] = 0; $part[8]['nom'] .= " (PVEM_PMC)";}
}

if($resE->sum('PAN_PVEM_PNA')>0){
if($part[1]['cant'] > $part[2]['cant'] && $part[1]['cant'] > $part[6]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PVEM_PNA') + $part[2]['cant'] + $part[6]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PVEM_PNA')/$valida)*100,2) + $part[2]['porc'] + $part[6]['porc'];
$part[2]['cant'] =0; $part[6]['cant']=0; $part[2]['porc'] =0; $part[6]['porc'] =0; $part[1]['nom'] .= " (PAN_PVEM_PNA)";}
elseif($part[2]['cant'] > $part[1]['cant'] && $part[2]['cant'] > $part[6]['cant'])  
{$part[2]['cant'] += $resE->sum('PAN_PVEM_PNA') + $part[1]['cant'] + $part[6]['cant']; 
$part[2]['porc'] += round(($resE->sum('PAN_PVEM_PNA')/$valida)*100,2) + $part[1]['porc'] + $part[6]['porc'];
$part[1]['cant'] =0; $part[6]['cant']=0; $part[1]['porc'] =0; $part[6]['porc'] =0; $part[2]['nom'] .= " (PAN_PVEM_PNA)";}
else 
{$part[6]['cant'] += $resE->sum('PAN_PVEM_PNA') + $part[1]['cant'] + $part[2]['cant']; 
$part[6]['porc'] += round(($resE->sum('PAN_PVEM_PNA')/$valida)*100,2) + $part[1]['porc'] + $part[2]['porc'];
$part[1]['cant'] =0; $part[2]['cant']=0; $part[1]['porc'] =0; $part[2]['porc'] =0; $part[6]['nom'] .= " (PAN_PVEM_PNA)";}
}

if($resE->sum('PRD_PT_PNA')>0){
if($part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[6]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT_PNA') + $part[7]['cant'] + $part[6]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT_PNA')/$valida)*100,2) + $part[7]['porc'] + $part[6]['porc'];
$part[7]['cant'] =0; $part[6]['cant']=0; $part[7]['porc'] =0; $part[6]['porc'] =0; $part[3]['nom'] .= " (PRD_PT_PNA)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[6]['cant'])  
{$part[7]['cant'] += $resE->sum('PRD_PT_PNA') + $part[3]['cant'] + $part[6]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[6]['porc'];
$part[3]['cant'] =0; $part[6]['cant']=0; $part[3]['porc'] =0; $part[6]['porc'] =0; $part[7]['nom'] .= " (PRD_PT_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PRD_PT_PNA') + $part[3]['cant'] + $part[7]['cant']; 
$part[6]['porc'] += round(($resE->sum('PRD_PT_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'];
$part[3]['cant'] =0; $part[7]['cant']=0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[6]['nom'] .= " (PRD_PT_PNA)";}
}

if($resE->sum('PT_PMC')>0){
if($part[7]['cant'] > $part[8]['cant']) 
{$part[7]['cant'] += $resE->sum('PT_PMC')+ $part[8]['cant']; 
$part[7]['porc'] += round(($resE->sum('PT_PMC')/$valida)*100,2) + $part[8]['porc'];
$part[8]['cant'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PT_PMC)";}
else 
{$part[8]['cant'] += $resE->sum('PT_PMC')+ $part[7]['cant']; 
$part[8]['porc'] += round(($resE->sum('PT_PMC')/$valida)*100,2) + $part[7]['porc'];
$part[7]['cant'] =0; $part[7]['porc'] =0; $part[8]['nom'] .= " (PT_PMC)";}
}

if($resE->sum('PVEM_PNA')>0){
if($part[2]['cant'] > $part[6]['cant']) 
{$part[2]['cant'] += $resE->sum('PVEM_PNA')+ $part[6]['cant']; 
$part[2]['porc'] += round(($resE->sum('PVEM_PNA')/$valida)*100,2)+ $part[6]['porc'];
$part[6]['cant'] =0; $part[6]['porc'] =0; $part[2]['nom'] .= " (PVEM_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PVEM_PNA')+ $part[2]['cant']; 
$part[6]['porc'] += round(($resE->sum('PVEM_PNA')/$valida)*100,2)+ $part[2]['porc'];
$part[2]['cant'] =0; $part[2]['porc'] =0; $part[6]['nom'] .= " (PVEM_PNA)";}
}

if($resE->sum('PRI_PNA')>0){
if($part[0]['cant'] > $part[6]['cant']) 
{$part[0]['cant'] += $resE->sum('PRI_PNA')+ $part[6]['cant']; 
$part[0]['porc'] += round(($resE->sum('PRI_PNA')/$valida)*100,2)+ $part[6]['porc'];
$part[6]['cant'] =0; $part[6]['porc'] =0; $part[0]['nom'] .= " (PRI_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PRI_PNA')+ $part[0]['cant']; 
$part[6]['porc'] += round(($resE->sum('PRI_PNA')/$valida)*100,2)+ $part[0]['porc'];
$part[0]['cant'] =0; $part[0]['porc'] =0; $part[6]['nom'] .= " (PRI_PNA)";}
}
        
if($resE->sum('PRI_PVEM_PNA')>0){
if($part[0]['cant'] > $part[2]['cant'] && $part[0]['cant'] > $part[6]['cant']) 
{$part[0]['cant'] += $resE->sum('PRI_PVEM_PNA')+ $part[2]['cant'] + $part[6]['cant']; 
$part[0]['porc'] += round(($resE->sum('PRI_PVEM_PNA')/$valida)*100,2)+ $part[2]['porc'] + $part[6]['porc'];
$part[2]['cant'] =0; $part[6]['cant']=0; $part[2]['porc'] =0; $part[6]['porc'] =0; $part[0]['nom'] .= " (PRI_PVEM_PNA)";}
elseif($part[2]['cant'] > $part[0]['cant'] && $part[2]['cant'] > $part[6]['cant'])  
{$part[2]['cant'] += $resE->sum('PRI_PVEM_PNA')+ $part[0]['cant'] + $part[6]['cant']; 
$part[2]['porc'] += round(($resE->sum('PRI_PVEM_PNA')/$valida)*100,2)+ $part[0]['porc'] + $part[6]['porc'];
$part[0]['cant'] =0; $part[6]['cant']=0; $part[0]['porc'] =0; $part[6]['porc'] =0; $part[2]['nom'] .= " (PRI_PVEM_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PRI_PVEM_PNA')+ $part[0]['cant'] + $part[2]['cant']; 
$part[6]['porc'] += round(($resE->sum('PRI_PVEM_PNA')/$valida)*100,2)+ $part[0]['porc'] + $part[2]['porc'];
$part[0]['cant'] =0; $part[2]['cant']=0; $part[0]['porc'] =0; $part[2]['porc'] =0; $part[6]['nom'] .= " (PRI_PVEM_PNA)";}
}

if($resE->sum('PAN_PMC')>0){
if($part[1]['cant'] > $part[8]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PMC') + $part[8]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PMC')/$valida)*100,2) + $part[8]['porc'];
$part[8]['cant'] =0; $part[8]['porc'] =0; $part[1]['nom'] .= " (PAN_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PAN_PMC') + $part[1]['cant']; 
$part[8]['porc'] += round(($resE->sum('PAN_PMC')/$valida)*100,2) + $part[1]['porc'];
$part[1]['cant'] =0; $part[1]['porc'] =0; $part[8]['nom'] .= " (PAN_PMC)";}
}

if($resE->sum('PRD_PCP')>0){
if($part[3]['cant'] > $part[5]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PCP') + $part[5]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PCP')/$valida)*100,2) + $part[5]['porc'];
$part[5]['cant'] =0; $part[5]['porc'] =0; $part[3]['nom'] .= " (PRD_PCP)";}
else
{$part[5]['cant'] += $resE->sum('PRD_PCP') + $part[3]['cant']; 
$part[5]['porc'] += round(($resE->sum('PRD_PCP')/$valida)*100,2) + $part[3]['porc'];
$part[3]['cant'] =0; $part[3]['porc'] =0; $part[5]['nom'] .= " (PRD_PCP)";}
}

if($resE->sum('PAN_PT')>0){
if($part[1]['cant'] > $part[7]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PT') + $part[7]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PT')/$valida)*100,2) + $part[7]['porc'];
$part[7]['cant'] =0; $part[7]['porc'] =0; $part[1]['nom'] .= " (PAN_PT)";}
else
{$part[7]['cant'] += $resE->sum('PAN_PT') + $part[1]['cant']; 
$part[7]['porc'] += round(($resE->sum('PAN_PT')/$valida)*100,2) + $part[1]['porc'];
$part[1]['cant'] =0; $part[1]['porc'] =0; $part[7]['nom'] .= " (PAN_PT)";}
}

if($resE->sum('PRD_PCP_PMC')>0){
if($part[3]['cant'] > $part[5]['cant'] && $part[3]['cant'] > $part[8]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PCP_PMC')+ $part[5]['cant'] + $part[8]['cant'];
$part[3]['porc'] += round(($resE->sum('PRD_PCP_PMC')/$valida)*100,2) + $part[5]['porc'] + $part[8]['porc'];
$part[5]['cant'] =0; $part[8]['cant']=0; $part[5]['porc'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PRD_PCP_PMC)";}
elseif($part[5]['cant'] > $part[3]['cant'] && $part[5]['cant'] > $part[8]['cant'])  
{$part[5]['cant'] += $resE->sum('PRD_PCP_PMC')+ $part[5]['cant'] + $part[8]['cant'];
$part[5]['porc'] += round(($resE->sum('PRD_PCP_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[8]['porc'];
$part[3]['cant'] =0; $part[8]['cant']=0; $part[3]['porc'] =0; $part[8]['porc'] =0; $part[5]['nom'] .= " (PRD_PCP_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PRD_PCP_PMC')+ $part[3]['cant'] + $part[5]['cant'];
$part[8]['porc'] += round(($resE->sum('PRD_PCP_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[5]['porc'];
$part[3]['cant'] =0; $part[5]['cant']=0; $part[3]['porc'] =0; $part[5]['porc'] =0; $part[8]['nom'] .= " (PRD_PCP_PMC)";}
}

if($resE->sum('PRD_PT')>0){
if($part[3]['cant'] > $part[7]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT') + $part[7]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT')/$valida)*100,2) + $part[7]['porc'];
$part[7]['cant'] =0; $part[7]['porc'] =0; $part[3]['nom'] .= " (PRD_PT)";}
else
{$part[7]['cant'] += $resE->sum('PRD_PT') + $part[3]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT')/$valida)*100,2) + $part[3]['porc'];
$part[3]['cant'] =0; $part[3]['porc'] =0; $part[7]['nom'] .= " (PRD_PT)";}
}

if($resE->sum('PAN_PT_PMC')>0){
if($part[1]['cant'] > $part[7]['cant'] && $part[1]['cant'] > $part[8]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PT_PMC') + $part[7]['cant'] + $part[8]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PT_PMC')/$valida)*100,2) + $part[7]['porc'] + $part[8]['porc'];
$part[7]['cant'] =0; $part[8]['cant']=0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[1]['nom'] .= " (PAN_PT_PMC)";}
elseif($part[7]['cant'] > $part[1]['cant'] && $part[7]['cant'] > $part[8]['cant'])  
{$part[7]['cant'] += $resE->sum('PAN_PT_PMC') + $part[1]['cant'] + $part[8]['cant']; 
$part[7]['porc'] += round(($resE->sum('PAN_PT_PMC')/$valida)*100,2) + $part[1]['porc'] + $part[8]['porc'];
$part[1]['cant'] =0; $part[8]['cant']=0; $part[1]['porc'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PAN_PT_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PAN_PT_PMC') + $part[1]['cant'] + $part[7]['cant']; 
$part[8]['porc'] += round(($resE->sum('PAN_PT_PMC')/$valida)*100,2) + $part[1]['porc'] + $part[7]['porc'];
$part[1]['cant'] =0; $part[7]['cant']=0; $part[1]['porc'] =0; $part[7]['porc'] =0; $part[8]['nom'] .= " (PAN_PT_PMC)";}
}

if($resE->sum('PRD_PT_PMC')>0){
if($part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[8]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT_PMC') + $part[7]['cant'] + $part[8]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT_PMC')/$valida)*100,2) + $part[7]['porc'] + $part[8]['porc'];
$part[7]['cant'] =0; $part[8]['cant']=0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PRD_PT_PMC)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[8]['cant'])  
{$part[7]['cant'] += $resE->sum('PRD_PT_PMC') + $part[3]['cant'] + $part[8]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[8]['porc'];
$part[3]['cant'] =0; $part[8]['cant']=0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PRD_PT_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PRD_PT_PMC') + $part[3]['cant'] + $part[7]['cant']; 
$part[8]['porc'] += round(($resE->sum('PRD_PT_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'];
$part[3]['cant'] =0; $part[7]['cant']=0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[8]['nom'] .= " (PRD_PT_PMC)";}
}

if($resE->sum('PAN_PCP')>0){
if($part[1]['cant'] > $part[5]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PCP') + $part[5]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PCP')/$valida)*100,2) + $part[5]['porc'];
$part[5]['cant'] =0; $part[5]['porc'] =0; $part[1]['nom'] .= " (PAN_PCP)";}
else
{$part[5]['cant'] += $resE->sum('PAN_PCP') + $part[1]['cant']; 
$part[5]['porc'] += round(($resE->sum('PAN_PCP')/$valida)*100,2) + $part[1]['porc'];
$part[1]['cant'] =0; $part[1]['porc'] =0; $part[5]['nom'] .= " (PAN_PCP)";}
}

if($resE->sum('PRD_PMC')>0){
if($part[3]['cant'] > $part[8]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PMC') + $part[8]['cant']; 
$part[8]['porc'] += round(($resE->sum('PRD_PMC')/$valida)*100,2) + $part[8]['porc'];
$part[8]['cant'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PRD_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PRD_PMC') + $part[3]['cant']; 
$part[8]['porc'] += round(($resE->sum('PRD_PMC')/$valida)*100,2) + $part[3]['porc'];
$part[3]['cant'] =0; $part[3]['porc'] =0; $part[8]['nom'] .= " (PRD_PMC)";}
}

if($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')>0){
if($part[1]['cant'] > $part[3]['cant'] && $part[1]['cant'] > $part[7]['cant'] && $part[1]['cant'] > $part[2]['cant']&& $part[1]['cant'] > $part[8]['cant']&& $part[1]['cant'] > $part[6]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[3]['cant'] + $part[7]['cant'] + $part[2]['cant'] + $part[8]['cant'] + $part[6]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[2]['porc'] + $part[8]['porc'] + $part[6]['porc']; 
$part[3]['cant']=0;$part[7]['cant']=0;$part[2]['cant']=0;$part[8]['cant']=0;$part[6]['cant']=0;$part[3]['porc']=0;$part[7]['porc']=0;$part[2]['porc']=0;$part[8]['porc']=0;$part[6]['porc']=0; $part[1]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
elseif($part[3]['cant'] > $part[1]['cant'] && $part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[2]['cant']&& $part[3]['cant'] > $part[8]['cant']&& $part[3]['cant'] > $part[6]['cant']) 
{$part[3]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[1]['cant'] + $part[7]['cant'] + $part[2]['cant'] + $part[8]['cant'] + $part[6]['cant']; 
$part[3]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[1]['porc'] + $part[7]['porc'] + $part[2]['porc'] + $part[8]['porc'] + $part[6]['porc']; 
$part[1]['cant']=0;$part[7]['cant']=0;$part[2]['cant']=0;$part[8]['cant']=0;$part[6]['cant']=0;$part[1]['porc']=0;$part[7]['porc']=0;$part[2]['porc']=0;$part[8]['porc']=0;$part[6]['porc']=0; $part[3]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[1]['cant'] && $part[7]['cant'] > $part[2]['cant']&& $part[7]['cant'] > $part[8]['cant']&& $part[7]['cant'] > $part[6]['cant']) 
{$part[7]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[3]['cant'] + $part[1]['cant'] + $part[2]['cant'] + $part[8]['cant'] + $part[6]['cant']; 
$part[7]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[1]['porc'] + $part[2]['porc'] + $part[8]['porc'] + $part[6]['porc']; 
$part[3]['cant']=0;$part[1]['cant']=0;$part[2]['cant']=0;$part[8]['cant']=0;$part[6]['cant']=0;$part[3]['porc']=0;$part[1]['porc']=0;$part[2]['porc']=0;$part[8]['porc']=0;$part[6]['porc']=0; $part[7]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
elseif($part[2]['cant'] > $part[3]['cant'] && $part[2]['cant'] > $part[7]['cant'] && $part[2]['cant'] > $part[1]['cant']&& $part[2]['cant'] > $part[8]['cant']&& $part[2]['cant'] > $part[6]['cant']) 
{$part[2]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[3]['cant'] + $part[7]['cant'] + $part[1]['cant'] + $part[8]['cant'] + $part[6]['cant']; 
$part[2]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[2]['porc'] + $part[8]['porc'] + $part[6]['porc']; 
$part[3]['cant']=0;$part[7]['cant']=0;$part[1]['cant']=0;$part[8]['cant']=0;$part[6]['cant']=0;$part[3]['porc']=0;$part[7]['porc']=0;$part[1]['porc']=0;$part[8]['porc']=0;$part[6]['porc']=0; $part[2]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
elseif($part[8]['cant'] > $part[3]['cant'] && $part[8]['cant'] > $part[7]['cant'] && $part[8]['cant'] > $part[1]['cant']&& $part[8]['cant'] > $part[1]['cant']&& $part[8]['cant'] > $part[6]['cant']) 
{$part[8]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[3]['cant'] + $part[7]['cant'] + $part[2]['cant'] + $part[1]['cant'] + $part[6]['cant']; 
$part[8]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[2]['porc'] + $part[1]['porc'] + $part[6]['porc']; 
$part[3]['cant']=0;$part[7]['cant']=0;$part[2]['cant']=0;$part[1]['cant']=0;$part[6]['cant']=0;$part[3]['porc']=0;$part[7]['porc']=0;$part[2]['porc']=0;$part[1]['porc']=0;$part[6]['porc']=0; $part[8]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PAN_PRD_PT_PVEM_PMC_PNA') + $part[3]['cant'] + $part[7]['cant'] + $part[2]['cant'] + $part[8]['cant'] + $part[1]['cant']; 
$part[6]['porc'] += round(($resE->sum('PAN_PRD_PT_PVEM_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[2]['porc'] + $part[8]['porc'] + $part[1]['porc']; 
$part[3]['cant']=0;$part[7]['cant']=0;$part[2]['cant']=0;$part[8]['cant']=0;$part[1]['cant']=0;$part[3]['porc']=0;$part[7]['porc']=0;$part[2]['porc']=0;$part[8]['porc']=0;$part[1]['porc']=0; $part[6]['nom'] .= " (PAN_PRD_PT_PVEM_PMC_PNA)";}
}

if($resE->sum('PRD_PVEM_PCP')>0){
if($part[3]['cant'] > $part[2]['cant'] && $part[3]['cant'] > $part[5]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PVEM_PCP') + $part[2]['cant'] + $part[5]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PVEM_PCP')/$valida)*100,2) + $part[2]['porc'] + $part[5]['porc'];
$part[2]['cant'] =0; $part[5]['cant']=0; $part[2]['porc'] =0; $part[5]['porc'] =0; $part[3]['nom'] .= " (PRD_PVEM_PCP)";}
elseif($part[2]['cant'] > $part[3]['cant'] && $part[2]['cant'] > $part[5]['cant'])  
{$part[2]['cant'] += $resE->sum('PRD_PVEM_PCP') + $part[3]['cant'] + $part[5]['cant']; 
$part[2]['porc'] += round(($resE->sum('PRD_PVEM_PCP')/$valida)*100,2) + $part[3]['porc'] + $part[5]['porc'];
$part[3]['cant'] =0; $part[5]['cant']=0; $part[3]['porc'] =0; $part[5]['porc'] =0; $part[2]['nom'] .= " (PRD_PVEM_PCP)";}
else
{$part[5]['cant'] += $resE->sum('PRD_PVEM_PCP') + $part[2]['cant'] + $part[3]['cant']; 
$part[5]['porc'] += round(($resE->sum('PRD_PVEM_PCP')/$valida)*100,2) + $part[2]['porc'] + $part[3]['porc'];
$part[2]['cant'] =0; $part[3]['cant']=0; $part[2]['porc'] =0; $part[3]['porc'] =0; $part[5]['nom'] .= " (PRD_PVEM_PCP)";}
}

if($resE->sum('PCP_PMC_PNA')>0){
if($part[5]['cant'] > $part[8]['cant'] && $part[5]['cant'] > $part[6]['cant']) 
{$part[5]['cant'] += $resE->sum('PCP_PMC_PNA') + $part[8]['cant'] + $part[6]['cant']; 
$part[5]['porc'] += round(($resE->sum('PCP_PMC_PNA')/$valida)*100,2) + $part[8]['porc'] + $part[6]['porc'];
$part[8]['cant'] =0; $part[6]['cant']=0; $part[8]['porc'] =0; $part[6]['porc'] =0; $part[5]['nom'] .= " (PCP_PMC_PNA)";}
elseif($part[8]['cant'] > $part[5]['cant'] && $part[8]['cant'] > $part[6]['cant'])  
{$part[8]['cant'] += $resE->sum('PCP_PMC_PNA') + $part[5]['cant'] + $part[6]['cant']; 
$part[8]['porc'] += round(($resE->sum('PCP_PMC_PNA')/$valida)*100,2) + $part[5]['porc'] + $part[6]['porc'];
$part[5]['cant'] =0; $part[6]['cant']=0; $part[5]['porc'] =0; $part[6]['porc'] =0; $part[8]['nom'] .= " (PCP_PMC_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PCP_PMC_PNA') + $part[8]['cant'] + $part[5]['cant']; 
$part[6]['porc'] += round(($resE->sum('PCP_PMC_PNA')/$valida)*100,2) + $part[8]['porc'] + $part[5]['porc'];
$part[8]['cant'] =0; $part[5]['cant']=0; $part[8]['porc'] =0; $part[5]['porc'] =0; $part[6]['nom'] .= " (PCP_PMC_PNA)";}
}

if($resE->sum('PRD_PT_PCP')>0){
if($part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[5]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT_PCP') + $part[7]['cant'] + $part[5]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT_PCP')/$valida)*100,2) + $part[7]['porc'] + $part[5]['porc'];
$part[7]['cant'] =0; $part[5]['cant']=0; $part[7]['porc'] =0; $part[5]['porc'] =0; $part[3]['nom'] .= " (PRD_PT_PCP)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[5]['cant'])  
{$part[7]['cant'] += $resE->sum('PRD_PT_PCP') + $part[3]['cant'] + $part[5]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT_PCP')/$valida)*100,2) + $part[3]['porc'] + $part[5]['porc'];
$part[3]['cant'] =0; $part[5]['cant']=0; $part[3]['porc'] =0; $part[5]['porc'] =0; $part[7]['nom'] .= " (PRD_PT_PCP)";}
else
{$part[5]['cant'] += $resE->sum('PRD_PT_PCP') + $part[7]['cant'] + $part[3]['cant']; 
$part[5]['porc'] += round(($resE->sum('PRD_PT_PCP')/$valida)*100,2) + $part[7]['porc'] + $part[3]['porc'];
$part[7]['cant'] =0; $part[3]['cant']=0; $part[7]['porc'] =0; $part[3]['porc'] =0; $part[5]['nom'] .= " (PRD_PT_PCP)";}
}

if($resE->sum('PRD_PT_PMC_PNA')>0){
if($part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[8]['cant'] && $part[3]['cant'] > $part[6]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT_PMC_PNA') + $part[7]['cant'] + $part[8]['cant'] + $part[6]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT_PMC_PNA')/$valida)*100,2) + $part[7]['porc'] + $part[8]['porc'] + $part[6]['porc']; 
$part[6]['cant'] =0; $part[7]['cant'] =0; $part[8]['cant']=0; $part[6]['porc'] =0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PRD_PT_PMC_PNA)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[8]['cant'] && $part[7]['cant'] > $part[6]['cant']) 
{$part[7]['cant'] += $resE->sum('PRD_PT_PMC_PNA') + $part[3]['cant']  + $part[6]['cant'] + $part[8]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[6]['porc'] + $part[8]['porc'];
$part[3]['cant']=0; $part[6]['cant'] =0; $part[8]['cant'] =0; $part[3]['porc']=0; $part[6]['porc'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PRD_PT_PMC_PNA)";}
elseif($part[8]['cant'] > $part[7]['cant'] && $part[8]['cant'] > $part[3]['cant'] && $part[8]['cant'] > $part[6]['cant']) 
{$part[8]['cant'] += $resE->sum('PRD_PT_PMC_PNA') + $part[3]['cant']  + $part[6]['cant'] + $part[7]['cant'];  
$part[8]['porc'] += round(($resE->sum('PRD_PT_PMC_PNA')/$valida)*100,2) + $part[3]['porc'] + $part[6]['porc'] + $part[7]['porc'];
$part[3]['cant'] =0; $part[6]['cant']=0;  $part[7]['cant']=0; $part[3]['porc'] =0; $part[6]['porc'] =0;  $part[7]['porc']=0; $part[8]['nom'] .= " (PRD_PT_PMC_PNA)";}
else
{$part[6]['cant'] += $resE->sum('PRD_PT_PMC_PNA') + $part[3]['cant'] + $part[7]['cant']  + $part[8]['cant']; 
$part[6]['porc'] += round(($resE->sum('PRD_PT_PMC_PNA')/$valida)*100,2)+ $part[3]['porc'] + $part[7]['porc'] + $part[8]['porc'];
$part[3]['cant'] =0; $part[7]['cant']=0; $part[8]['cant']=0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[6]['nom'] .= " (PRD_PT_PMC_PNA)";}
}

if($resE->sum('PAN_PRD_PT_PMC')>0){
if($part[1]['cant'] > $part[3]['cant'] && $part[1]['cant'] > $part[7]['cant'] && $part[1]['cant'] > $part[8]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PRD_PT_PMC') + $part[3]['cant'] + $part[7]['cant'] + $part[8]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PRD_PT_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[8]['porc']; 
$part[3]['cant'] =0; $part[7]['cant'] =0; $part[8]['cant']=0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[1]['nom'] .= " (PAN_PRD_PT_PMC)";}
elseif($part[3]['cant'] > $part[1]['cant'] && $part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[8]['cant']) 
{$part[3]['cant'] += $resE->sum('PAN_PRD_PT_PMC') + $part[1]['cant']  + $part[7]['cant'] + $part[8]['cant'];  
$part[3]['porc'] += round(($resE->sum('PAN_PRD_PT_PMC')/$valida)*100,2) + $part[1]['porc'] + $part[7]['porc'] + $part[8]['porc']; 
$part[1]['cant'] =0; $part[7]['cant'] =0; $part[8]['cant']=0; $part[1]['porc'] =0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PAN_PRD_PT_PMC)";}
elseif($part[7]['cant'] > $part[1]['cant'] && $part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[8]['cant']) 
{$part[7]['cant'] += $resE->sum('PAN_PRD_PT_PMC') + $part[1]['cant']  + $part[3]['cant'] + $part[8]['cant'];  
$part[7]['porc'] += round(($resE->sum('PAN_PRD_PT_PMC')/$valida)*100,2) + $part[1]['porc'] + $part[3]['porc'] + $part[8]['porc']; 
$part[1]['cant'] =0; $part[3]['cant'] =0; $part[8]['cant']=0; $part[1]['porc'] =0; $part[3]['porc'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PAN_PRD_PT_PMC)";}
else 
{$part[8]['cant'] += $resE->sum('PAN_PRD_PT_PMC') + $part[1]['cant'] + $part[3]['cant']  + $part[7]['cant'];
$part[8]['porc'] += round(($resE->sum('PAN_PRD_PT_PMC')/$valida)*100,2) + $part[1]['porc'] + $part[3]['porc'] + $part[7]['porc'];
$part[1]['cant'] =0; $part[3]['cant']=0; $part[7]['cant']=0; $part[1]['porc'] =0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[8]['nom'] .= " (PAN_PRD_PT_PMC)";}
}

if($resE->sum('PAN_PRD_PT')>0){
if($part[1]['cant'] > $part[3]['cant'] && $part[1]['cant'] > $part[7]['cant']) 
{$part[1]['cant'] += $resE->sum('PAN_PRD_PT') + $part[3]['cant'] + $part[7]['cant']; 
$part[1]['porc'] += round(($resE->sum('PAN_PRD_PT')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'];
$part[3]['cant'] =0; $part[7]['cant']=0;$part[3]['porc'] =0; $part[7]['porc'] =0; $part[1]['nom'] .= " (PAN_PRD_PT)";}
elseif($part[3]['cant'] > $part[1]['cant'] && $part[3]['cant'] > $part[7]['cant']) 
{$part[3]['cant'] += $resE->sum('PAN_PRD_PT') + $part[1]['cant'] + $part[7]['cant']; 
$part[3]['porc'] += round(($resE->sum('PAN_PRD_PT')/$valida)*100,2) + $part[1]['porc'] + $part[7]['porc'];
$part[1]['cant'] =0; $part[7]['cant']=0;$part[1]['porc'] =0; $part[7]['porc'] =0; $part[3]['nom'] .= " (PAN_PRD_PT)";}
else
{$part[7]['cant'] += $resE->sum('PAN_PRD_PT') + $part[1]['cant'] + $part[3]['cant']; 
$part[7]['porc'] += round(($resE->sum('PAN_PRD_PT')/$valida)*100,2) + $part[1]['porc'] + $part[3]['porc'];
$part[1]['cant'] =0; $part[3]['cant']=0;$part[1]['porc'] =0; $part[3]['porc'] =0; $part[7]['nom'] .= " (PAN_PRD_PT)";}
}

if($resE->sum('PRD_PT_PCP_PMC')>0){
if($part[3]['cant'] > $part[7]['cant'] && $part[3]['cant'] > $part[5]['cant'] && $part[3]['cant'] > $part[8]['cant']) 
{$part[3]['cant'] += $resE->sum('PRD_PT_PCP_PMC') + $part[7]['cant'] + $part[5]['cant'] + $part[8]['cant']; 
$part[3]['porc'] += round(($resE->sum('PRD_PT_PCP_PMC')/$valida)*100,2) + $part[7]['porc'] + $part[5]['porc'] + $part[8]['porc']; 
$part[7]['cant'] =0; $part[5]['cant']=0; $part[8]['cant']=0; $part[7]['porc'] =0; $part[5]['porc'] =0; $part[8]['porc'] =0; $part[3]['nom'] .= " (PRD_PT_PCP_PMC)";}
elseif($part[7]['cant'] > $part[3]['cant'] && $part[7]['cant'] > $part[5]['cant'] && $part[7]['cant'] > $part[8]['cant']) 
{$part[7]['cant'] += $resE->sum('PRD_PT_PCP_PMC') + $part[3]['cant'] + $part[5]['cant'] + $part[8]['cant']; 
$part[7]['porc'] += round(($resE->sum('PRD_PT_PCP_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[5]['porc'] + $part[8]['porc']; 
$part[3]['cant'] =0; $part[5]['cant']=0; $part[8]['cant']=0; $part[3]['porc'] =0; $part[5]['porc'] =0; $part[8]['porc'] =0; $part[7]['nom'] .= " (PRD_PT_PCP_PMC)";}
elseif($part[5]['cant'] > $part[3]['cant'] && $part[5]['cant'] > $part[7]['cant'] && $part[5]['cant'] > $part[8]['cant']) 
{$part[5]['cant'] += $resE->sum('PRD_PT_PCP_PMC') + $part[3]['cant'] + $part[7]['cant'] + $part[8]['cant']; 
$part[5]['porc'] += round(($resE->sum('PRD_PT_PCP_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[7]['porc'] + $part[8]['porc']; 
$part[3]['cant'] =0; $part[7]['cant']=0; $part[8]['cant']=0; $part[3]['porc'] =0; $part[7]['porc'] =0; $part[8]['porc'] =0; $part[5]['nom'] .= " (PRD_PT_PCP_PMC)";}
else
{$part[8]['cant'] += $resE->sum('PRD_PT_PCP_PMC') + $part[3]['cant'] + $part[5]['cant'] + $part[7]['cant']; 
$part[8]['porc'] += round(($resE->sum('PRD_PT_PCP_PMC')/$valida)*100,2) + $part[3]['porc'] + $part[5]['porc'] + $part[7]['porc']; 
$part[3]['cant'] =0; $part[5]['cant']=0; $part[7]['cant']=0; $part[3]['porc'] =0; $part[5]['porc'] =0; $part[7]['porc'] =0; $part[8]['nom'] .= " (PRD_PT_PCP_PMC)";}
}

foreach ($part as $key => $row) {
    $aux[$key] = $row['cant'];
}
$vals = '';
$tend = '';
$cats = '';
array_multisort($aux, SORT_DESC, $part);
foreach ($part as $p) {
    if($p['cant']>0){
        $vals.= "{name: '".$p['nom']."',data: [".$p['cant']."]},";
        $tend.= $p['cant'].",";
        $cats.= "'".$p['nom']."',";
    }
}

?>
<script>
    $(document).ready(function () {
        Highcharts.chart('coalision', {
        chart: {
        type: 'column',
        options3d: {
            enabled: false,
            alpha: 45
        }
    },
    colors: ['#03a678','#cf000f','#555','#ABB7B7','#1e824c','#f22613'],
    title: {
        text: '<b>EN COALISIÓN</b>'
    },
    xAxis: {
        categories: ['Partidos']
    },
    yAxis:{
        min: 0,
        title: {
            text: 'Votos'
        }
    },
    tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>'+
       '<td style="padding:0"><b>{point.y}</b></td></tr>',
       footerFormat: '</table>',
       shared: false,
       useHTML: true
    },
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
    series: [<?php echo $vals; ?>]
});
    });

</script>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">

        <div class="row" style="margin: 2% 0 2% 0;">
            <div class="col-lg-10">
                <section>
                    <div class="widget-body">
                        <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                            <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                                RESULTADOS ELECTORALES: <?php echo e($municipio->municipio); ?>

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <section class="widget">
                    <!--<div class="col-lg-6">-->
                    <span style="opacity: .7; font-size: 20px;">Municipio: &nbsp;</span><?php echo Form::select('municipio',$municipios,$id_mun,['class'=>'form-control SelectAuto','style'=>'width:50%','onchange'=>'cargaRes()','id'=>'municipio']); ?>

                    <!--</div>-->     
                </section>
            </div>      
        </div>      
        <div class="row">
            <div class="col-lg-10">
                <section class="widget">
                    <span style="opacity: .7; font-size: 20px; cursor: pointer" class="show_hide"><b>Vocales del municipio</b></span>
                    <div class="slidingDiv">
                    <table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">                    
                            <tr>
                                <th>Nombre</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vocal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($vocal->nombre); ?> <?php echo e($vocal->ap_paterno); ?> <?php echo e($vocal->ap_materno); ?></td>
                                <td><?php echo e($vocal->cargo); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                </section>
            </div>      
        </div>   
        <div class="row">
            <div class="col-lg-10">
                <section class="widget">
                    <span style="opacity: .7; font-size: 20px; cursor: pointer" class="show_hide2"><b>Resultados electorales votación 2015</b></span>
                  
        <div class="row slidingDiv2">
            
            <div class="col-lg-6 col-md-6">
                <section class="widget" style="padding-bottom: 0px;">
                            <div>
                                <div class="float-e-margins">
                                    <div class="">
                                        <div>
                                            <div id='partidos'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
            </div>

            <div class="col-lg-6 col-md-6">
                <section class="widget" style="padding-bottom: 0px;">
                            <div>
                                <div class="float-e-margins">
                                    <div class="">
                                        <div>
                                            <div id='coalision'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
            </div>
        </div>
                    </section>
            </div>      
        </div> 
        <div class="row">
        <div class="col-lg-10">
            <div>
                
                <!-------->
                <section class="widget" style="padding-bottom: 0px;">
                    <div class="row table-responsive">
                        <?php echo $__env->make('resultados.tableResultados', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </section>


            </div>
        </div>
        </div>
        <div class="col-lg-10">
            <div>
                <!-------->
                <section class="widget">
                    <div class="row table-responsive">
                        <div class="ocultar" id='resultados'></div>
                    </div>
                </section>


            </div>
        </div>
        <?php if($id_mun==31): ?>
        <div class="col-lg-5">
            <div>
                <!-------->
                <section class="widget">
                    <div class="row table-responsive">
                        <div id='graficaSecciones2012'></div>
                    </div>
                </section>


            </div>
        </div>
        <div class="col-lg-5">
            <div>
                <!-------->
                <section class="widget">
                    <div class="row table-responsive">
                        <div id='graficaSecciones2015'></div>
                    </div>
                </section>


            </div>
        </div>
        <?php endif; ?>



    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>