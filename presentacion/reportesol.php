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
include_once('adodb/adodb.inc.php');
include_once('adodb/adodb-pager.inc.php');

$base=new base('localhost','root','','academico');
$sql="SELECT `solicitante`.`id_solicitante`,`solicitante`.`cedula`,`solicitante`.`solicitante`,`solicitante`.`direccion`,`solicitante`.`telefono`,`solicitante`.`email`,`solicitante`.`tipo_solicitante` FROM solicitante";
$rs=$base->dosql($sql);
$Tabla .= "<table border=\"1\"><tr><td>***********************************</td></tr><br>";
$Tabla .= "<tr><td>PREILIC<br>(Programacion de Eventos Industria Licorera del Cauca)</td></tr>";
$Tabla .= "<tr><td>REPORTE DE SOLICITANTES</td></tr>";
$Tabla .= "<tr><td>***********************************</td></tr>";
$Tabla .= "<tr><td><b>CEDULA</b></td><td><b>NOMBRE DEL SOLICITANTE</b></td><td><b>DIRECCION</b></td><td><b>TELEFONO</b></td><td><b>EMAIL</b></td><td><b>TIPO DE SOLICITANTE</b></td></tr>";
       	while(!$rs->EOF)
		{
		    $Tabla .='<tr><td>'.$rs->fields['cedula'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['solicitante'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['direccion'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['telefono'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['email'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['tipo_solicitante'].'</td>'."\n";
			$rs->MoveNext();
			
		}
		$Tabla.= "</table>";
header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte_de_Solicitantes_".date('d-m-Y').".xls");
echo $Tabla;  
?>		
</body>
</html>
