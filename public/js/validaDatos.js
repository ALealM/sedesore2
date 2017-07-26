$(document).ready(function(){
 $('#form').validate(
 {
  rules: {
    nombre: {
      required: true
    },   
    apellido_paterno: {
      required: true
    },   
    apellido_materno: {
      required: true
    },   
    email: {
      required: true
    },   
    curp: {
      required: true
    },   
    cve_elector: {
      required: true
    },   
  },
  highlight: function(element) {
       var id_attr = "#" + $( element ).attr("id") + "1";
       $(element).closest('.val').removeClass('has-success').addClass('has-error');
       $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
   },
 unhighlight: function(element) {
       var id_attr = "#" + $( element ).attr("id") + "1";
       $(element).closest('.val').removeClass('has-error').addClass('has-success');
       $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
   },
 errorElement: 'span',
       errorClass: 'help-block',
       errorPlacement: function(error, element) {
           if(element.length) {
               error.insertAfter(element);
           } else {
           error.insertAfter(element);
           }
       } 
 });
}); 