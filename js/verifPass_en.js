function verifPass (){

      if(document.datos_usu_form.pass.value === document.datos_usu_form.pass2.value){

        document.getElementById("contraMal").innerHTML = "";
        document.getElementById("opener-5").disabled = false;
         
      } else {
       document.getElementById("contraMal").innerHTML = "The passwords don't match!";
       document.getElementById("opener-5").disabled = true;
     }
      
    };