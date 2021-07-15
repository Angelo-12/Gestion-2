$(document).ready(function() {


     $("#sesion_tallerista").click(function(){
         location.href='/Tallerista/index';
     });

     $("#buscar_tallerista").click(function(e){
          //e.preventDefault();
          var id_tallerista=$('input[name=id_tallerista]').val();

          if(id_tallerista==""){
          
          }

          $.get('/Tallerista/buscar/'+id_tallerista,function(data){
               $('#tabla_tallerista tbody').empty();
               $('#tabla_tallerista').append("<tr id='fila' name='" + data.id + "'>" +
                        "<th >" + data.id + "</th>" +
                        "<th >" + data.nombre_tallerista + "</th>" +
                        "<th >" + data.lugar + "</th>" +
                        "<th >" + "Aceptar<input type='checkbox' id='valor' name='valor_status'>"+"</th>" +
                        "<th >" +
                        "<button type='button' class='btn btn-sm btn-success lista'><i class='fa fa-plus'></i></button>"+
                         /*"<button type='submit' class='btn btn-success btn-sm' id='add'><i class='fa fa-plus-circle'></i></button>" +*/
                        "</th>" +
                    "</tr>");
                
          });
        
     }); 


     $(document).on('click','.lista',function(){

          var id_tallerista=document.getElementById('fila').cells[0].innerText;
          $('#tabla_tallerista tbody').empty();
          
          var isChecked = document.getElementById('valor').checked;
         
          $.get('/Tallerista/buscar/'+id_tallerista,function(data){
               
               $('#tabla_lista').append("<tr>" +
                        "<th >" + data.id + "</th>" +
                        "<th >" + data.nombre_tallerista + "</th>" +
                        "<th >" + data.lugar + "</th>" +
                        "<th >" +valor_status+ "</th>" +
                    "</tr>");
                
          });
     });

     

});

function toDashboard(){
     location.href='/dashboard';
}