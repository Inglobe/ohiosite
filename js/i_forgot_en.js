$(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      mail_fg = $( "#mail_fg" ),
      user_fg = $( "#user_fg" ),
      allFields = $( [] ).add( mail_fg ).add( user_fg ),
      tips = $( ".validateTips" );
 
    function emailPass() {
      if(!document.getElementById('user_fg').value){
        document.getElementById('name_spn').innerHTML='Mandatory field';
      } else {
        document.getElementById('name_spn').innerHTML='';
        if(!document.getElementById('mail_fg').value){
          document.getElementById('mail_spn').innerHTML='Mandatory field';
        } else {
          document.getElementById('mail_spn').innerHTML='';
          document.getElementById('i_forgot_frm').submit();
        }     
    }
  }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 400,
      modal: true,
      buttons: {
        "Send Email": emailPass,
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
 
    $( "#i_forgot" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  });