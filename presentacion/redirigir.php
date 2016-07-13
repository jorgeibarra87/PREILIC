<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>redirigir</title>
</head>

<body>
<?php
$reporte=$_POST['reporte'];

if($reporte=='Reporte de Eventos'){
header("location:../presentacion/reporteev.php");
}
else if($reporte=='Reporte Recursos Asignados'){
header("location:../presentacion/reportera.php");
}
else if($reporte=='Reporte Resultados Asignados'){
header("location:../presentacion/reporteres.php");
}
else if($reporte=='Reporte Datos Basicos'){
header("location:../presentacion/reportedb.php");
}
else{
echo"error";
}

?>
</body>
</html>
