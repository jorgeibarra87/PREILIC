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

$base=new base('localhost','root','','academico');
$sql="SELECT `id_recurso`, `nombre_recurso`, `tipo_recurso` FROM `recurso`";
$rs=$base->dosql($sql);
$Tabla .= "<table border=\"1\"><tr><td>***********************************</td></tr><br>";
$Tabla .= "<tr><td>PREILIC<br>(Programacion de Eventos Industria Licorera del Cauca)</td></tr>";
$Tabla .= "<tr><td>REPORTE DE RECURSOS</td></tr>";
$Tabla .= "<tr><td>***********************************</td></tr>";
$Tabla .= "<tr><td>NOMBRE DEL RECURSO</td><td>TIPO DE RECURSO</td></tr>";
       	while(!$rs->EOF)
		{
		    $Tabla .='<tr><td>'.$rs->fields['nombre_recurso'].'</td>'."\n";
			$Tabla .='<td>'.$rs->fields['tipo_recurso'].'</td>'."\n";
			$rs->MoveNext();
			
		}
		$Tabla.= "</table>";
header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Reporte_de_Recuesos_".date('d-m-Y').".xls");
echo $Tabla;  
?>		
</body>
</html>
