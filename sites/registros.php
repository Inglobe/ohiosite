<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<title>Visualizaci&oacute;n de registros</title>
	<link rel="stylesheet" href="plugins/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="plugins/jqwidgets/jqwidgets/styles/jqx.ui-sunny.css" type="text/css" />
    <!--<link href="table.css" rel="stylesheet" type="text/css">-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.sort.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.edit.js"></script> 
    <script type="text/javascript">
    	$document.ready(function(){
    		var datos = {
    			datatype: "json",
    			datafields: [{name: 'Rodeo', type: 'string'},
    			 {name: 'NroVaca', type: 'long'},
    			  {name: 'FechaComParto', type: 'date'},
    			  {name: 'Lactancia', type:'int'},
    			  {name: 'RazaVaca', type: 'string'},
    			  {name: 'CCVaca', type: 'int'},
    			  {name: 'TecnicoComParto', type:'string'},
    			  {name: 'ComienzoParto', type: 'time'},
    			  {name: 'FinParto', type: 'time'},
    			  {name: 'HigienePerineo', type:'int'},
    			  {name: 'FechaParto', type: 'date'},
    			  {name: 'NroBecerro', type: 'long'},
    			  {name: 'Sexo', type: 'string'},
    			  {name: 'EstadoNacimiento', type: 'string'},
    			  {name: 'BecerroMuerto', type: 'string'},
    			  {name: 'FechaBecerroMuerto', type:'date'},
    			  {name: 'HoraBecerroMuerto', type:'time'},
    			  {name: 'DificultadParto', type:'int'},
    			  {name: 'RazaBecerro', type:'string'},
    			  {name: 'BecerroNacimientoTecnico', type:'string'},
    			  {name: 'FechaCalostro', type:'date'},
    			  {name: 'HoraCalostro', type:'time'},
    			  {name: 'CalidadCalostro', type:'int'},
    			  {name: 'CantidadCalostro', type:'int'},
    			  {name: 'BecerroVigor', type:'int'},
    			  {name: 'PesoAlNacer', type:'float'},
    			  {name: 'CalostroTecnico', type:'string'}],
    			url: "datos.php"
    		}

    		var dataAdapter = new $.jqx.dataAdapter(datos);

    		$("#jqxgrid").jqxGrid({
                width: 1000,
                source: dataAdapter,                
                pageable: true,
                autoheight: true,
                sortable: true,
                altrows: true,
                editable: false,
                enabletooltips: true,
                theme: 'ui-sunny',
                selectionmode: 'singlerow',                
                columns: [{ text: 'Rodeo', datafield: 'Rodeo'},
                { text: 'Nro Vaca', datafield: 'NroVaca'},
                { text: 'Fecha comienzo parto', datafield: 'FechaComParto'},
                { text: 'Lactancia', datafield: 'Lactancia'},
                { text: 'Raza Vaca', datafield: 'RazaVaca'},
                { text: 'CC Vaca', datafield: 'CCVaca'},
                { text: 'Tecnico comienzo parto', datafield: 'TecnicoComParto'},
                { text: 'Comienzo parto', datafield: 'ComienzoParto'},
                { text: 'Fin parto', datafield: 'FinParto'},
                { text: 'Higiene Perineo', datafield: 'HigienePerineo'},
                { text: 'Fecha de parto', datafield: 'FechaParto'},
                { text: 'Nro Becerro', datafield: 'NroBecerro'},
                { text: 'Sexo', datafield: 'Sexo'},
                { text: 'Estado en Nacimiento', datafield: 'EstadoNacimiento'},
                { text: 'Becerro Muerto', datafield: 'BecerroMuerto'},
                { text: 'Fecha Becerro Muerto', datafield: 'FechaBecerroMuerto'},
                { text: 'Hora Becerro Muerto', datafield: 'HoraBecerroMuerto'},
                { text: 'Dificultad parto', datafield: 'DificultadParto'},
                { text: 'Raza Becerro', datafield: 'RazaBecerro'},
                { text: 'Tecnico en nacimiento de becerro', datafield: 'BecerroNacimientoTecnico'},
                { text: 'Fecha Calostro', datafield: 'FechaCalostro'},
                { text: 'Hora Calostro', datafield: 'HoraCalostro'},
                { text: 'Calidad Calostro', datafield: 'CalidadCalostro'},
                { text: 'Cantidad Calostro', datafield: 'CantidadCalostro'},
                { text: 'Becerro Vigor', datafield: 'BecerroVigor'},
                { text: 'Peso al nacer', datafield: 'PesoAlNacer'},
                { text: 'Tecnico calostro', datafield: 'CalostroTecnico'}
                ]
           });
    	});
    </script>
</head>
<body>

</body>
</html>