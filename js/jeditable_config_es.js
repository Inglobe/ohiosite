$(document).ready(function() {
     $('.edit').editable('save.php',{
      indicator: 'Guardando...',
      tooltip: 'Click para editar. Enter para guardar edición.'
     });

     $('.edit_area').editable('save.php', {
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="../img/indicator.gif">',
         tooltip   : 'Click para editar...'
     });
 });