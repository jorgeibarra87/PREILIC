<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
session_start();

$usuario=$_POST['login'];
$password=$_POST['pass'];
$resultado=mysql_query("SELECT  `usuarios`.`login` ,  `usuarios`.`pass`FROM  `usuarios`WHERE ((`usuarios`.`login` =  \"$usuario\")AND (`usuarios`.`pass` = \"$password\"))",$conexion);
$filas=mysql_num_rows($resultado);

if($filas==1){
$_SESSION['autentificado']="1";
$_SESSION['user']=$_POST['login'];
$_SESSION['pass']=$_POST['pass'];
header("location:../logica/principal.php");
}
else{
header("location:../presentacion/eindex.php?ID='1'");
}
?>
</body>
</html>
