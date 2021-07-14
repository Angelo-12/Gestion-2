$(document).ready(function() {

    $("#sesion_tallerista").click(function(){
         location.href='/index';
    });

    $("#sesion_administrador").click(function(){
        location.href='/dashboard';
   });


});

function toDashboard(){
     location.href='/dashboard';
}

/*function SesionTallerista(){
         location.href='/Tallerista/index';
}*/
