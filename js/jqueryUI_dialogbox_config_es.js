$(function(){
            $( "#dialog-6" ).dialog({
           autoOpen: false, 
           buttons: {
                  "Acepto los Términos y Condiciones": function() {
                     $( this ).dialog( "close" );
                     if(!document.getElementById("inputUsuReg").value){
                        //alert("Dato faltante. Recuerde que todos los campos son obligatorios. Por favor revise el formulario.");
                        document.getElementById("usn_null").innerHTML = "Campo obligatorio";
                     } else {
                        document.getElementById("usn_null").innerHTML = "";
                        if(!document.getElementById("inputPasswordReg").value){
                           //alert("Dato faltante. Recuerde que todos los campos son obligatorios. Por favor revise el formulario.");
                        document.getElementById("pass_null").innerHTML = "Campo obligatorio";
                     } else {
                        document.getElementById("pass_null").innerHTML = "";
                        if(!document.getElementById("inputNombre").value){
                           //alert("Dato faltante. Recuerde que todos los campos son obligatorios. Por favor revise el formulario.");
                        document.getElementById("name_null").innerHTML = "Campo obligatorio";
                     } else {
                        document.getElementById("name_null").innerHTML = "";
                        if(!document.getElementById("inputApellido").value){
                          // alert("Dato faltante. Recuerde que todos los campos son obligatorios. Por favor revise el formulario.");
                        document.getElementById("sur_null").innerHTML = "Campo obligatorio";
                     } else {
                        document.getElementById("sur_null").innerHTML = "";
                        if(!document.getElementById("inputMail").value){
                          // alert("Dato faltante. Recuerde que todos los campos son obligatorios. Por favor revise el formulario.");
                        document.getElementById("mail_null").innerHTML = "Campo obligatorio";
                     } else document.getElementById("form_datos").submit();
                 }}}}
                     

                          
                  },
                  "No Acepto": function(){
                    $( this ).dialog( "close" );
                  }
               },
            beforeClose: function( event, ui ) {
                  /*if ( !$( "#terms" ).prop( "checked" ) ) {
                     event.preventDefault();
                     $( "[for=terms]" ).addClass( "invalid" );
                  }*/ 
               },
               width: 600,
               title: "Términos y Condiciones",
               hide: "fade",
               show: "fade"
            });
            $( "#opener-5" ).click(function() {
               $( "#dialog-6" ).dialog( "open" );
            });
         });