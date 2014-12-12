<?php error_reporting(E_ERROR | E_PARSE);
include_once './db_connect.php';
$db = new DB_connect();
$db->connect();

$sql = "SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p INNER JOIN becerros b ON p.par_id = b.bec_parto INNER JOIN calostro c ON b.bec_id = c.cal_becerro";
$_SESSION["username"] = "admin";
if($_SESSION["username"] !="admin") {
	$sql .= " WHERE p.usu_rodeo_desc like '".$_SESSION["rodeo"]."'";
}
$result = mysql_query($sql);

while($rec = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
	if(!isset($rec["Fin parto"]) || empty($rec["Fin parto"])) {
		$FinParto = null;
	} else {
		$FinParto = date("h:i:s A",strtotime($rec["Fin parto"]));
	}
	if(!isset($rec["Fecha becerro muerto"]) || empty($rec["Fecha becerro muerto"])) {
		$FechaMuerto = null;
	} else {
		$FechaMuerto = date("Y-m-d",strtotime(substr($rec["Fecha becerro muerto"],6,4)."-".substr($rec["Fecha becerro muerto"],3,2)."-".substr($rec["Fecha becerro muerto"],0,2)));
	}
	if(!isset($rec["Hora becerro muerto"]) || empty($rec["Hora becerro muerto"])) {
		$HoraMuerto = null;
	} else {
		$HoraMuerto = date("h:i:s A",strtotime($rec["Hora becerro muerto"]));
	}
	$registros[] = array(
		'Rodeo' => $rec["Rodeo"],
		'NroVaca' => (int)$rec["No Vaca"],
		'FechaComParto' => date("Y-m-d",strtotime(substr($rec["Fecha comienzo parto"],6,4)."-".substr($rec["Fecha comienzo parto"],3,2)."-".substr($rec["Fecha comienzo parto"],0,2))),
		'Lactancia' => (int)$rec["Lactancia"],
		'RazaVaca' => $rec["Raza vaca"],
		'CCVaca' => (int)$rec["CC Vaca"],
		'TecnicoComParto' => $rec["Tecnico comienzo parto"],
		'ComienzoParto' => date("h:i:s A",strtotime($rec["Comienzo parto"])),
		'FinParto' => $FinParto,
		'HigienePerineo' => (int)$rec["Higiene Perineo"],
		'FechaParto' => date("Y-m-d",strtotime(substr($rec["Fecha parto"],6,4)."-".substr($rec["Fecha parto"],3,2)."-".substr($rec["Fecha parto"],0,2))),
		'NroBecerro' => (int)$rec["No Becerro"],
		'Sexo' => $rec["Sexo"],
		'EstadoNacimiento' => $rec["Estado al nacimiento"],
		'BecerroMuerto' => $rec["Becerro muerto"],
		'FechaBecerroMuerto' => $FechaMuerto,
		'HoraBecerroMuerto' => $HoraMuerto,
		'DificultadParto' => (int)$rec["Dificultad parto"],
		'BecerroPresentacion' => $rec["Becerro presentacion"],
		'RazaBecerro' => $rec["Raza becerro"],
		'BecerroNacimientoTecnico' => $rec["Becerro nacimiento tecnico"],
		'FechaCalostro' => date("Y-m-d",strtotime(substr($rec["Fecha calostro"],6,4)."-".substr($rec["Fecha calostro"],3,2)."-".substr($rec["Fecha calostro"],0,2))),
		'HoraCalostro' => date("h:i:s A",strtotime($rec["Hora calostro"])),
		'CalidadCalostro' => (int)$rec["Calidad calostro"],
		'CantidadCalostro' => (int)$rec["Cantidad calostro"],
		'BecerroVigor' => (int)$rec["Becerro vigor"],
		'PesoAlNacer' => (float)$rec["Peso al nacer becerro"],
		'CalostroTecnico' => $rec["Calostro tecnico"]
		);
}
echo json_encode($registros);
 ?>
