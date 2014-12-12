<?php 
	$_SESSION["lang"] = "en";
	
 ?>
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
    <link rel="stylesheet" href="plugins/jqwidgets/jqwidgets/styles/jqx.ui-start.css" type="text/css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
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
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.filter.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxcalendar.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.edit.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="plugins/jqwidgets/jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript">
    	var language = "<?php echo $_SESSION['lang'] ?>";
    	var header_es = ["Rodeo&nbsp&nbsp&nbsp&nbsp", "Nro Vaca", "Fecha comienzo parto", "Lactancia", "Raza Vaca", "CC Vaca", "Tecnico comienzo parto", "Comienzo parto", "Fin parto&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp", "Higiene perineo", "Fecha de parto", "Nro Becerro", "Sexo", "Estado en Nacimiento", "Becerro Muerto", "Fecha Becerro Muerto", "Hora Becerro Muerto", "Dificultad parto", "Becerro presentacion" ,"Raza Becerro", "Tecnico en nacimiento de becerro", "Fecha Calostro", "Hora Calostro", "Calidad Calostro", "Cantidad Calostro", "Becerro Vigor", "Peso al nacer", "Tecnico calostro"];
    	var header_en = ["Farm&nbsp&nbsp&nbsp&nbsp&nbsp", "Cow ID", "Start calving date", "Lactation", "Cow Breed", "Cow BCS", "Start Calving Personnel", "Start Calving&nbsp&nbsp", "End Calving", "Perineum Hygiene", "Calving Date", "Calf ID", "Sex", "Calf Status at Birth", "Calf Dead", "Calf Dead Date", "Calf Dead Time", "Calving Difficulty", "Calf Presentation", "Calf Breed", "Calf Birth Personnel", "Colostrum Date", "Colostrum time", "Colostrum Quality", "Colostrum Quantity", "Calf Vigor", "Calf Birth Weight", "Colostrum Personnel"];
    	var header_def = ["Rodeo", "NroVaca", "FechaComParto", "Lactancia", "RazaVaca", "CCVaca", "TecnicoComParto", "ComienzoParto", "FinParto", "HigienePerineo", "FechaParto", "NroBecerro", "Sexo", "EstadoNacimiento", "BecerroMuerto", "FechaBecerroMuerto", "HoraBecerroMuerto", "DificultadParto", "BecerroPresentacion", "RazaBecerro", "BecerroNacimientoTecnico", "FechaCalostro", "HoraCalostro", "CalidadCalostro", "CantidadCalostro", "BecerroVigor", "PesoAlNacer", "CalostroTecnico"];

    	$(document).ready(function(){
    		cargarGrilla();
    		
            $('#clearfilteringbutton').jqxButton({ height: 25, theme: 'ui-start'});
            $('#clearfilteringbutton').click(function () {
                $("#jqxgrid").jqxGrid('clearfilters');
                $("#jqxgrid").jqxGrid('autoresizecolumns', 'all');
            });
            $('#exportbutton').jqxButton({ height: 25, theme: 'ui-start'});
            $('#exportbutton').click(function () {
            	if(language == "en") {
            		$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', 'Farm');
            		$("#jqxgrid").jqxGrid('setcolumnproperty', 'ComienzoParto', 'text', 'Start Calving');
                	$("#jqxgrid").jqxGrid('exportdata', 'xls', 'reports');  
                	$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', 'Farm&nbsp&nbsp&nbsp&nbsp&nbsp');
                	$("#jqxgrid").jqxGrid('setcolumnproperty', 'ComienzoParto', 'text', 'Start Calving&nbsp&nbsp');
                	$("#jqxgrid").jqxGrid('autoresizecolumns', 'all');
            	}
            	if(language == "es") {
            		$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', 'Rodeo');
            		$("#jqxgrid").jqxGrid('setcolumnproperty', 'FinParto', 'text', 'Fin parto');
                	$("#jqxgrid").jqxGrid('exportdata', 'xls', 'reports');  
                	$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', 'Rodeo&nbsp&nbsp&nbsp&nbsp');
                	$("#jqxgrid").jqxGrid('setcolumnproperty', 'FinParto', 'text', 'Fin parto&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp');
                	$("#jqxgrid").jqxGrid('autoresizecolumns', 'all');
            	}
            	
            });
    	});


		$(window).resize(function() {
    		if(this.resizeTO) clearTimeout(this.resizeTO);
    		this.resizeTO = setTimeout(function() {
        		$(this).trigger('resizeEnd');
    			}, 200);
		});
		$(window).bind('resizeEnd', function() {
    		$("#jqxgrid").jqxGrid('autoresizecolumns', 'all');
		});

		function cargarGrilla() {
			var header = [];
			if(language == "es") {
				header = header_es;
			}
			if(language == "en") {
				header = header_en;
			}

			var datos = {
    			datatype: "json",
    			datafields: [{name: header_def[0], type: 'string'},
    			 {name: header_def[1], type: 'int'},
    			  {name: header_def[2], type: 'date'},
    			  {name: header_def[3], type:'int'},
    			  {name: header_def[4], type: 'string'},
    			  {name: header_def[5], type: 'int'},
    			  {name: header_def[6], type:'string'},
    			  {name: header_def[7], type: 'date'},
    			  {name: header_def[8], type: 'date'},
    			  {name: header_def[9], type:'int'},
    			  {name: header_def[10], type: 'date'},
    			  {name: header_def[11], type: 'int'},
    			  {name: header_def[12], type: 'string'},
    			  {name: header_def[13], type: 'string'},
    			  {name: header_def[14], type: 'string'},
    			  {name: header_def[15], type:'date'},
    			  {name: header_def[16], type:'date'},
    			  {name: header_def[17], type:'int'},
    			  {name: header_def[18], type:'int'},
    			  {name: header_def[19], type:'string'},
    			  {name: header_def[20], type:'string'},
    			  {name: header_def[21], type:'date'},
    			  {name: header_def[22], type:'date'},
    			  {name: header_def[23], type:'int'},
    			  {name: header_def[24], type:'int'},
    			  {name: header_def[25], type:'int'},
    			  {name: header_def[26], type:'float'},
    			  {name: header_def[27], type:'string'}],
    			url: "datos.php"
    		}

    		var dataAdapter = new $.jqx.dataAdapter(datos);

    		$("#jqxgrid").jqxGrid({
                width: '95%',
                source: dataAdapter,                
                pageable: true,
                autoheight: true,
                sortable: true,
                altrows: true,
                editable: false,
                filterable: true,
                enabletooltips: true,
                selectionmode: 'multiplecellsextended',
                theme: 'ui-start',
                selectionmode: 'singlerow',                
                columns: [{ text: header[0], datafield: header_def[0], filtertype: 'input', columntype: 'textbox'},
                { text: header[1], datafield: header_def[1], filtertype: 'number', cellsformat: 'n'},
                { text: header[2], datafield: header_def[2], filtertype: 'date', cellsformat: 'd'},
                { text: header[3], datafield: header_def[3], filtertype: 'number', cellsformat: 'n'},
                { text: header[4], datafield: header_def[4], filtertype: 'input'},
                { text: header[5], datafield: header_def[5], filtertype: 'number', cellsformat: 'n'},
                { text: header[6], datafield: header_def[6], filtertype: 'input'},
                { text: header[7], datafield: header_def[7], filtertype: 'range', cellsformat: 'T' },
                { text: header[8], datafield: header_def[8], filtertype: 'range', cellsformat: 'T'},
                { text: header[9], datafield: header_def[9], filtertype: 'number', cellsformat: 'n'},
                { text: header[10], datafield: header_def[10], filtertype: 'date', cellsformat: 'd'},
                { text: header[11], datafield: header_def[11], filtertype: 'number', cellsformat: 'n'},
                { text: header[12], datafield: header_def[12], filtertype: 'input'},
                { text: header[13], datafield: header_def[13], filtertype: 'input'},
                { text: header[14], datafield: header_def[14], filtertype: 'input'},
                { text: header[15], datafield: header_def[15], filtertype: 'date', cellsformat: 'd'},
                { text: header[16], datafield: header_def[16], filtertype: 'range', cellsformat: 'T'},
                { text: header[17], datafield: header_def[17], filtertype: 'number', cellsformat: 'n'},
                { text: header[18], datafield: header_def[18], filtertype: 'number', cellsformat: 'n'},
                { text: header[19], datafield: header_def[19], filtertype: 'input'},
                { text: header[20], datafield: header_def[20], filtertype: 'input'},
                { text: header[21], datafield: header_def[21], filtertype: 'date', cellsformat: 'd'},
                { text: header[22], datafield: header_def[22], filtertype: 'range', cellsformat: 'T'},
                { text: header[23], datafield: header_def[23], filtertype: 'number', cellsformat: 'n'},
                { text: header[24], datafield: header_def[24], filtertype: 'number', cellsformat: 'n'},
                { text: header[25], datafield: header_def[25], filtertype: 'number', cellsformat: 'n'},
                { text: header[26], datafield: header_def[26], filtertype: 'float', cellsformat: 'd'},
                { text: header[27], datafield: header_def[27], filtertype: 'input'}
                ]
           });
	
			$("#jqxgrid").on('bindingcomplete', function () {
                languageGrid();
            });
            $("#jqxgrid").on('filter', function () {
                $("#jqxgrid").jqxGrid('autoresizecolumns', 'all');
            });			
		};    
		
    	function changeLanguage(lang) {
    		language = lang;
    		languageHeaders();
    		languageGrid();
    	};
    	function languageHeaders() {
    		var header = [];
			if(language == "es") {
				header = header_es;
			}
			if(language == "en") {
				header = header_en;
			}
			for(var i=0; i<header_def.length; i++) {
				$("#jqxgrid").jqxGrid('setcolumnproperty', header_def[i], 'text', header[i]);
			}
			/*$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[0]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'NroVaca', 'text', header[1]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'FechaComParto', 'text', header[2]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[3]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[4]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[5]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[6]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[7]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[8]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[9]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[10]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[11]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[12]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[13]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[14]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[15]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[16]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[17]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[18]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[19]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[20]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[21]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[22]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[23]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[24]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[25]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[26]);
			$("#jqxgrid").jqxGrid('setcolumnproperty', 'Rodeo', 'text', header[27]);*/
    	};	
    	function languageGrid() {
    		var localizationobj = {};
                if(language == "es") {
                	localizationobj.decimalseparator = ",";
					localizationobj.thousandsseparator = ".";
					localizationobj.pagershowrowsstring = "Mostrar filas:";
					localizationobj.pagergotopagestring = "Ir a ";
					localizationobj.pagerrangestring = " de ";
					localizationobj.pagerpreviosbuttonstring = "anterior";
					localizationobj.pagernextbuttonstring = "siguiente";
					localizationobj.pagerfirstbuttonstring = "primero";
					localizationobj.pagerlastbuttonstring = "último";
					localizationobj.sortascendingstring = "Ordenar ascendentemente";
					localizationobj.sortdescendingstring = "Ordenar descendentemente";
					localizationobj.sortremovestring = "Eliminar ordenar";
					localizationobj.filterstring="Filtro";
					localizationobj.filtershowrowstring="Mostrar filas donde:";
					localizationobj.filtershowrowdatestring="Mostrar filas donde la fecha:";
					localizationobj.filterorconditionstring="O";
					localizationobj.filterandconditionstring="Y";
					localizationobj.filterselectallstring="(Seleccionar Todos)";
					localizationobj.filterstringcomparisonoperators = ["vacio","no vacio","contiene","contiene (incluir mayusculas)","no contiene", "no contiene (incluir mayusculas)", "empieza con", "empieza con (incluir mayusculas)", "termina con", "termina con (incluir mayusculas)","igual a", "igual a (incluir mayusculas)", "nulo", "no nulo"];
					localizationobj.filternumericcomparisonoperators = ["igual","no igual","menor que","menor o igual que","mayor que ","mayor o igual que","nulo","no nulo"];
					localizationobj.filterdatecomparisonoperators = ["igual","no igual","menor que","menor o igual que","mayor que ","mayor o igual que","nulo","no nulo"];
					localizationobj.filterselectstring="Seleccione filtro";
					localizationobj.loadtext="Cargando...";
					localizationobj.emptydatastring= "No hay datos que mostrar";
					localizationobj.filterclearstring="Limpiar";
					localizationobj.patterns={
					        d: "d/M/yyyy",
					        D: "dddd, MMMM dd, yyyy",
					        t: "h:mm tt",
					        T: "h:mm:ss tt",
					        f: "dddd, MMMM dd, yyyy h:mm tt",
					        F: "dddd, MMMM dd, yyyy h:mm:ss tt",
					        M: "MMMM dd",
					        Y: "yyyy MMMM",
					        S: "yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss"
					    }
                }
                if(language == "en") {
                	localizationobj.decimalseparator= '.';
				    localizationobj.thousandsseparator= ',';
				    localizationobj.pagergotopagestring= "Go to page:";
				    localizationobj.pagershowrowsstring= "Show rows:";
				    localizationobj.pagerrangestring= " of ";
				    localizationobj.pagerpreviousbuttonstring= "previous";
				    localizationobj.pagernextbuttonstring= "next";
				    localizationobj.groupsheaderstring= "Drag a column and drop it here to group by that column";
				    localizationobj.sortascendingstring= "Sort Ascending";
				    localizationobj.sortdescendingstring= "Sort Descending";
				    localizationobj.sortremovestring= "Remove Sort";
				    localizationobj.groupbystring= "Group By this column";
				    localizationobj.groupremovestring= "Remove from groups";
				    localizationobj.filterclearstring= "Clear";
				    localizationobj.filterstring= "Filter";
				    localizationobj.filtershowrowstring= "Show rows where:";
				    localizationobj.filtershowrowdatestring= "Show rows where date:";
				    localizationobj.filterorconditionstring= "Or";
				    localizationobj.filterandconditionstring= "And";
				    localizationobj.filterselectallstring= "(Select All)";
				    localizationobj.filterchoosestring= "Please Choose:";
				    localizationobj.filterstringcomparisonoperators= ['empty', 'not empty', 'contains', 'contains(match case)',
				        'does not contain', 'does not contain(match case)', 'starts with', 'starts with(match case)',
				        'ends with', 'ends with(match case)', 'equal', 'equal(match case)', 'null', 'not null'];
				    localizationobj.filternumericcomparisonoperators= ['equal', 'not equal', 'less than', 'less than or equal', 'greater than', 'greater than or equal', 'null', 'not null'];
				    localizationobj.filterdatecomparisonoperators= ['equal', 'not equal', 'less than', 'less than or equal', 'greater than', 'greater than or equal', 'null', 'not null'];
				    localizationobj.filterbooleancomparisonoperators= ['equal', 'not equal'];
				    localizationobj.validationstring= "Entered value is not valid";
				    localizationobj.emptydatastring= "No data to display";
				    localizationobj.filterselectstring= "Select Filter";
				    localizationobj.loadtext= "Loading...";
				    localizationobj.patterns={
					        d: "M/d/yyyy",
					        D: "dddd, MMMM dd, yyyy",
					        t: "h:mm tt",
					        T: "h:mm:ss tt",
					        f: "dddd, MMMM dd, yyyy h:mm tt",
					        F: "dddd, MMMM dd, yyyy h:mm:ss tt",
					        M: "MMMM dd",
					        Y: "yyyy MMMM",
					        S: "yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss"
					    }
                } 
				$("#jqxgrid").jqxGrid('localizestrings', localizationobj);
				var clearFilterText;
				var ExportDataText;
				if(language == "en") {
					clearFilterText = "Clear Filter";
					ExportDataText = "Export Data";
				}
				if(language == "es") {
					clearFilterText = "Limpiar filtros";
					ExportDataText = "Exportar datos";
				}
				document.getElementById("clearfilteringbutton").value = clearFilterText;
				document.getElementById("exportbutton").value = ExportDataText;
				$("#jqxgrid").jqxGrid('autoresizecolumns', 'all');		
    	}
    </script>
</head>
<body>
	<input type="image" src="img/en.png" onclick="changeLanguage('en');" style="height:2%;width:2%;margin-left:93%;"/>
	<input type="image" src="img/es.jpg" onclick="changeLanguage('es');" style="height:2%;width:2%;" />
    <header class="header">
        <div id="header-content">
            <h4><a href="#">Ohio | Inglobe</a></h4>            
            <nav>
                <ul>
                    <li><a href="registros.php">Tabla</a></li>
                    <li><a href="gestion-cuentas.php">Cuentas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="banner">
    </div>
	<div id="jqxgrid" style="width: 95%; margin-left: auto; margin-right: auto; text-align:center; background-color:#000;"></div>
	<br/>
	<input style="margin-top: 10px;margin-left: 2.5%;" value="Remove Filter" id="clearfilteringbutton" type="button" />
	<input style="margin-top: 10px;" value="Export data" id="exportbutton" type="button" />
    <footer class="footer">
        Inglobe 2014 - All rights reserved 
    </footer>
</body>
</html>