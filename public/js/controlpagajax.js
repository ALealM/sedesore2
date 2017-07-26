/*
 *  Creado por:Raymundo A. González Grimaldo
 *  Fecha de creacion:   5/11/2015 08:43:00 PM        
 *  Ultima modificacion: 5/11/2015 08:43:00 PM        
 *  Modificado por: Raymundo A. González Grimaldo
 */
    
    $(document).ready(function(){
        
        $( ".pagAjax" ).each(function() {
            var table=$(this).html();
            var form ='<form id="pagAjax_form" class ="form-inline" onsubmit="pagAjaxCargaDatos($(this));return false;"><div style="float: left;"><input type="hidden" id="pagAjax_order" name="order" /><input type="hidden" id="pagAjax_ot" name="ot" value="0" />Mostrar <select name="tampag" class="form-control" onchange="$(this).closest(\'#pagAjax_form\').submit()"> <option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>registros por página</div><div style="float: right;">Búsqueda: <input type="text" name="filtro" class="form-control"  onkeyup="$(this).closest(\'#pagAjax_form\').submit()"/> </div></form>'; 
            var code = '<div id="pagAjax_controles">'+form+'</div><div id="pagAjax_data">'+table+'</div>';
            $(this).html(code);
            thOrder($(this)); 
           
        });

        $(document).on('click', '.pagAjax #pagAjax_data .pagination a', function (event) {
            event.preventDefault();           
            if ( $(this).attr('href') != '#' ) {
                var dataGet;                
                
                dataGet="&"+$('.pagAjax').data().get;
                $("html, body").animate({ scrollTop: 0 }, "fast");
                $('.pagAjax #pagAjax_data').html('<div class="load"><i class="fa fa-5x fa-spinner fa-pulse"></i></div>');
                $('.pagAjax #pagAjax_data').load($(this).attr('href')+"&"+$('.pagAjax #pagAjax_form').serialize()+dataGet,function() {                    
                    thOrder($(this).parents().find(".pagAjax"));
                });
                
            }else{
                
            }
        });
    });
  
function pagAjaxCargaDatos(obj){
    var dataGet;
    
    obj.closest('.pagAjax').find('#pagAjax_data').html('<div class="load"><i class="fa fa-5x fa-spinner fa-pulse"></i></div>');
    dataGet="&"+obj.closest('.pagAjax').data().get;
    obj.closest('.pagAjax').find('#pagAjax_data').load(obj.closest('.pagAjax').data().url+'?'+obj.serialize()+dataGet,function(){thOrder(obj.parents().find('table'))});
}
    

 function thOrder(obj){  
            
    order_actual = obj.parents().find(".pagAjax").find("#pagAjax_order").val();
    order_ot = obj.parents().find(".pagAjax").find("#pagAjax_ot").val();

    obj.find('th').each(function() {
       $(this).attr('style', 'vertical-align: top !important;');
       if($(this).data().order){
           order = $(this).data().order;
           if(order_actual == order){
               if(order_ot == 0)
                    icono = '<i class="fa fa-sort-amount-asc faa-tada animated-hover"></i>';
                else
                    icono = '<i class="fa fa-sort-amount-desc faa-tada animated-hover"></i>';
           }else{
               icono = '<i class="fa fa-sort faa-tada animated-hover"></i>';
           }

           $(this).html('<div style="position:relative;top:0;right:0;  text-align:right;" class="pull-right"><a onclick="thChangeOrder($(this),\''+order+'\');$(this).parents().find(\'#pagAjax_form\').submit();">'+icono+'</a></div>'+$(this).html());

       }                
   });
}

function thChangeOrder(obj,newOrder){
    
    if(obj.parents().find('#pagAjax_order').val() == newOrder){
        if(obj.parents().find('#pagAjax_ot').val() == 0)
            obj.parents().find('#pagAjax_ot').val(1);
        else
            obj.parents().find('#pagAjax_ot').val(0);
    }else{
        obj.parents().find('#pagAjax_ot').val(0);
    }
    obj.parents().find('#pagAjax_order').val(newOrder);
    
}
        
        