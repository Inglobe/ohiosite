<?php error_reporting(E_ERROR | E_PARSE);
include_once './db_connect.php';
$db = new DB_connect();
$db->connect();

$sql = "SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p INNER JOIN becerros b ON p.par_id = b.bec_parto INNER JOIN calostro c ON b.bec_id = c.cal_becerro";
$result = mysql_query($sql);

while($rec = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
	$registros[] = array(
		'Rodeo' => $rec["Rodeo"],
		'NroVaca' => $rec["No Vaca"],
		'FechaComParto' => $rec["Fecha comienzo parto"],
		'Lactancia' => $rec["Lactancia"],
		'RazaVaca' => $rec["Raza vaca"],
		'CCVaca' => $rec["CC Vaca"],
		'TecnicoComParto' => $rec["Tecnico comienzo parto"],
		'ComienzoParto' => $rec["Comienzo parto"],
		'FinParto' => $rec["Fin parto"],
		'HigienePerineo' => $rec["Higiene Perineo"],
		'FechaParto' => $rec["Fecha parto"],
		'NroBecerro' => $rec["No Becerro"],
		'Sexo' => $rec["Sexo"],
		'EstadoNacimiento' => $rec["Estado al nacimiento"],
		'BecerroMuerto' => $rec["Becerro muerto"],
		'FechaBecerroMuerto' => $rec["Fecha becerro muerto"],
		'HoraBecerroMuerto' => $rec["Hora becerro muerto"],
		'DificultadParto' => $rec["Dificultad parto"],
		'BecerroPresentacion' => $rec["Becerro presentacion"],
		'RazaBecerro' => $rec["Raza becerro"],
		'BecerroNacimientoTecnico' => $rec["Becerro nacimiento tecnico"],
		'FechaCalostro' => $rec["Fecha calostro"],
		'HoraCalostro' => $rec["Hora calostro"],
		'CalidadCalostro' => $rec["Calidad calostro"],
		'CantidadCalostro' => $rec["Cantidad calostro"],
		'BecerroVigor' => $rec["Becerro vigor"],
		'PesoAlNacer' => $rec["Peso al nacer becerro"],
		'CalostroTecnico' => $rec["Calostro tecnico"]
		);
}
echo json_encode($registros);
 ?>
