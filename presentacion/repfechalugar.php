<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
include('../logica/seguridad.php');
include ('../conexion/base.php');
include('../conexion/adodb5/adodb.inc.php');
include('../conexion/adodb5/adodb-pager.inc.php');
$fechaini= $_POST['fechaini'];
$fechafin= $_POST['fechafin'];
$lugar=$_POST['lugar'];

$base=new base('localhost','root','','academico');
$sql="SELECT `eventos`.`num_radicado`,`eventos`.`nom_evento`,`eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`lugar`.`municipio`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`fecha_apr`,`eventos`.`comentario_apr`,`eventos`.`fecha_resultado`,`eventos`.`comentario_res`,`eventos`.`costo`,`eventos`.`resultado`,`eventos`.`beneficio`,`eventos`.`porcentaje` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` 
 WHERE `eventos`.`fecha_inicio`>='$fechaini' and `eventos`.`fecha_inicio`<='$fechafin' and `lugar`='$lugar'";
$rs=$base->dosql($sql);
$Tabla .= "<table border=\"1\"><tr><td>***********************************</td></tr><br>";
$Tabla .= "<tr><td>PREILIC<br>(Programacion de Eventos Industria Licorera del Cauca)</td></tr>";
$Tabla .= "<tr><td>REPORTE DE EVENTOS<br>DESDE: ($fechaini) HASTA: ($fechafin)</td></tr>";
$Tabla .= "<tr><td>CON LUGAR: $lugar</td></tr>";
$Tabla .= "<tr><td>***********************************</td></tr>";
$Tabla .= "<tr><td><b>Numero de Radicado</b></td><td><b>Nombre del Evento</b></td><td><b>Fecha Registro</b></td><td><b>Fecha Inicio</b></td><td><b>Fecha Fin</b></td><td><b>Municipio</b></td><td><b>Lugar</b></td><td><b>Solicitante</b></td><td><b>Estado</b></td><td><b>Fecha Aprobacion</b></td><td><b>Comentario Aprobacion</b></td><td><b>Fecha Resultado</b></td><td><b>Comentario Resultado</b></td><td><b>Costo</b></td><td><b>Resultado</b></td><td><b>Beneficio</b></td><td><b>Porcentaje</b></td></tr>";
       	while(!$rs->EOF)
		{
		    $Tabla .='<tr><td>'.$rs->fields['num_radicado'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['nom_evento'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['fecha_registro'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['fecha_inicio'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['fecha_fin'].'</td>'."\n";
            $Tabla .='<td>'.$rs->fields['municipio'].'</td>'."\n";  
			$Tabla .='<td>'.$rs->fields['lugar'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['solicitante'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['estado'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['fecha_apr'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['comentario_apr'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['fecha_resultado'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['comentario_res'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['costo'].'</td>';
			$Tabla .='<td>'.$rs->fields['resultado'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['beneficio'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['porcentaje'].'</td></tr>'."\n";
			$rs->MoveNext();
			
		}
		$Tabla.= "</table>";
header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte_de_Eventos_".date('d-m-Y').".xls");
echo $Tabla;  
?>		
</body>
</html>
