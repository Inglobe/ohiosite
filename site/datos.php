<?php error_reporting(E_ERROR | E_PARSE);
include_once './db_connect.php';
session_start();
$db = new DB_connect();
$db->connect();

if($_SESSION['username']=='admin') {
	//$sql = "SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones', SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p  LEFT OUTER JOIN becerros b ON p.par_id = b.bec_parto  LEFT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro UNION SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones',SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p RIGHT OUTER JOIN becerros b ON p.par_id = b.bec_parto RIGHT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro";
	$sql = "SELECT p.par_id as 'ID Parto', c.cal_id as 'ID Calostro', b.bec_id as 'ID Becerro', p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones', SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p  LEFT OUTER JOIN becerros b ON p.par_id = b.bec_parto  LEFT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro UNION SELECT p.par_id as 'ID Parto', c.cal_id as 'ID Calostro', b.bec_id as 'ID Becerro',  p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones',SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p RIGHT OUTER JOIN becerros b ON p.par_id = b.bec_parto RIGHT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro";

} else {
	//$sql .= " WHERE p.usu_rodeo =".$_SESSION['rodeo'];
	$sql = "SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones', SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p  LEFT OUTER JOIN becerros b ON p.par_id = b.bec_parto  LEFT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro WHERE p.par_rodeo =".$_SESSION['rodeo']." UNION SELECT p.par_rodeo_desc as 'Rodeo', p.par_vaca as 'No Vaca', p.par_corral as 'Corral',SUBSTRING(p.par_fecha, 1, 10) as 'Fecha comienzo parto', p.par_lactancia as 'Lactancia', p.par_vaca_raza as 'Raza vaca', p.par_cc as 'CC Vaca', p.par_tecnico as 'Tecnico comienzo parto',  SUBSTRING(p.par_fecha, 12, 8) as 'Comienzo parto', SUBSTRING(p.par_fecha_fin, 12, 8) as 'Fin parto', p.par_higiene as 'Higiene Perineo', p.par_observaciones as 'Observaciones',SUBSTRING(p.par_fecha_fin,1,10) as 'Fecha parto', b.bec_caravana as 'No Becerro', b.bec_sexo as 'Sexo', b.bec_condicion as 'Estado al nacimiento', b.bec_muerto as 'Becerro muerto', SUBSTRING(b.bec_fecha_muerto,1,10) as 'Fecha becerro muerto', SUBSTRING(b.bec_fecha_muerto,12,8) as 'Hora becerro muerto', p.par_dificultad as 'Dificultad parto', b.bec_presentacion as 'Becerro presentacion', p.par_raza_becerros as 'Raza becerro', b.bec_tecnico as 'Becerro nacimiento tecnico', SUBSTRING(c.cal_fecha,1,10) as 'Fecha calostro', SUBSTRING(c.cal_fecha,12,8) as 'Hora calostro',c.cal_calidad as 'Calidad calostro', c.cal_cantidad as 'Cantidad calostro', c.cal_vigor as 'Becerro vigor', c.cal_peso as 'Peso al nacer becerro', c.cal_tecnico as 'Calostro tecnico' FROM partos p RIGHT OUTER JOIN becerros b ON p.par_id = b.bec_parto RIGHT OUTER JOIN calostro c ON b.bec_id = c.cal_becerro WHERE p.par_rodeo =".$_SESSION['rodeo'];

}
$result = mysql_query($sql);

while($rec = mysql_fetch_assoc($result, MYSQL_ASSOC)) {

	//Cambios
	if(!isset($rec["ID Parto"]) || empty($rec["ID Parto"])) {
		$IDParto = null;
	}
	if(!isset($rec["ID Calostro"]) || empty($rec["ID Calostro"])) {
		$IDCalostro = null;
	}
	if(!isset($rec["ID Becerro"]) || empty($rec["ID Becerro"])) {
		$IDBecerro = null;
	}

	$audit = "";

	$queryParto = "SELECT usu_codigo, count(1) as cantidad FROM movimientos WHERE instr(mov_sql,'update%20partos')>0 and instr(mov_sql,'par_id%3D%27".$rec["ID Parto"]."%27')>0 GROUP BY usu_codigo";
	$resultParto = 	mysql_query($queryParto);
	while($recp = mysql_fetch_assoc($resultParto, MYSQL_ASSOC)) {
		$usnmp = $recp["usu_codigo"];
		$cantp = $recp["cantidad"];
		$audit .= $usnmp."(".$cantp." Birth) ";
	}

	$queryCalostro = "SELECT usu_codigo, count(1) as cantidad FROM movimientos WHERE instr(mov_sql,'update%20becerros')>0 and instr(mov_sql,'bec_id%3D%27".$rec["ID Calostro"]."%27')>0 GROUP BY usu_codigo";
	$resultCalostro = mysql_query($queryCalostro);
	while($recc = mysql_fetch_assoc($resultCalostro, MYSQL_ASSOC)) {
		$usnmc = $recc["usu_codigo"];
		$cantc = $recc["cantidad"];
		$audit .= $usnmc."(".$cantc." Col) ";
	}

	$queryBecerro = "SELECT usu_codigo, count(1) as cantidad FROM movimientos WHERE instr(mov_sql,'update%20calostro')>0 and instr(mov_sql,'cal_id%3D%27".$rec["ID Becerro"]."%27')>0 GROUP BY usu_codigo";
	$resultBecerro = mysql_query($queryBecerro);
	while($recb = mysql_fetch_assoc($resultBecerro, MYSQL_ASSOC)) {
		$usnmb = $recb["usu_codigo"];
		$cantb = $recb["cantidad"];
		$audit .= $usnmb."(".$cantb." Calf)";
	}	

	//---------------------------------------------------------------------

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
	if(!isset($rec["Fecha calostro"]) || empty($rec["Fecha calostro"])) {
		$FechaCalostro = null;
	} else {
		$FechaCalostro = date("Y-m-d",strtotime(substr($rec["Fecha calostro"],6,4)."-".substr($rec["Fecha calostro"],3,2)."-".substr($rec["Fecha calostro"],0,2)));
	}
	if(!isset($rec["Hora calostro"]) || empty($rec["Hora calostro"])) {
		$HoraCalostro = null;
	} else {
		$HoraCalostro = date("h:i:s A",strtotime($rec["Hora calostro"]));
	}
	$registros[] = array(
		'Rodeo' => $rec["Rodeo"],
		'NroVaca' => (int)$rec["No Vaca"],
		'Corral' => $rec["Corral"],
		'FechaComParto' => date("Y-m-d",strtotime(substr($rec["Fecha comienzo parto"],6,4)."-".substr($rec["Fecha comienzo parto"],3,2)."-".substr($rec["Fecha comienzo parto"],0,2))),
		'Lactancia' => (int)$rec["Lactancia"],
		'RazaVaca' => $rec["Raza vaca"],
		'CCVaca' => (int)$rec["CC Vaca"],
		'TecnicoComParto' => $rec["Tecnico comienzo parto"],
		'ComienzoParto' => date("h:i:s A",strtotime($rec["Comienzo parto"])),
		'FinParto' => $FinParto,
		'HigienePerineo' => (int)$rec["Higiene Perineo"],
		'Observaciones' =>$rec["Observaciones"],
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
		'FechaCalostro' => $FechaCalostro,
		'HoraCalostro' => $HoraCalostro,
		'CalidadCalostro' => (int)$rec["Calidad calostro"],
		'CantidadCalostro' => (int)$rec["Cantidad calostro"],
		'BecerroVigor' => (int)$rec["Becerro vigor"],
		'PesoAlNacer' => (float)$rec["Peso al nacer becerro"],
		'CalostroTecnico' => $rec["Calostro tecnico"],
		'Audit' => $audit
		);
}
echo json_encode($registros);
 ?>
