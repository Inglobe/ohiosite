$(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      old_pass = $( "#old_pass" ),
      new_pass1 = $( "#new_pass1" ),
      new_pass2 = $( "#new_pass2" ),
      allFields = $( [] ).add( old_pass ).add( new_pass1 ).add( new_pass2 ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function changePass() {
      if(!document.getElementById('old_pass').value){
        document.getElementById('span_old_pass').innerHTML='Mandatory field';
      } else {
        document.getElementById('span_old_pass').innerHTML='';
        if(!document.getElementById('new_pass1').value){
          document.getElementById('span_new_pass1').innerHTML='Mandatory field';
        } else {
          document.getElementById('span_new_pass1').innerHTML='';
          if(!document.getElementById('new_pass2').value){
            document.getElementById('span_new_pass2').innerHTML='Mandatory field';
          } else {
            document.getElementById('span_new_pass2').innerHTML='';
            if (document.getElementById("new_pass1").value === document.getElementById("new_pass2").value){
              document.getElementById("change_pass_frm").submit();
            } else alert("The passwords don't match");
          }
        }
      }     
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 540,
      width: 400,
      modal: true,
      buttons: {
        "Change my password": changePass,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#change_pass" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  });