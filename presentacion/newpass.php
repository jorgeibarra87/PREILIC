<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>nueva contrase&ntilde;a</title>
<link rel="stylesheet" type="text/css" href="../presentacion/estilos.css">
<link rel="shortcut icon"href="../presentacion/icono.ico"/>
<link rel="stylesheet" type="text/css" href="../presentacion/menu_h.css">
<link rel="stylesheet" type="text/css" href="../presentacion/css/sunny/jquery-ui-1.9.1.custom.css">
<link rel="stylesheet" type="text/css" href="../presentacion/css/sunny/jquery-ui-1.9.1.custom.min.css">
<script type="text/jscript" src="../presentacion/js/jquery-1.8.2.js"></script>
<script type="text/jscript" src="../presentacion/js/jquery-ui-1.9.1.custom.js"></script>
<script type="text/jscript" src="../presentacion/js/jquery-ui-1.9.1.custom.min.js"></script>
<style type="text/css">
<!--
.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 50px}
body {
	background-image: url(../presentacion/fondo.jpg);
}
-->
</style>
<script>
function validar(form1){
if(document.form1.login.value.length==0&&document.form1.pass.value.length==0&&document.form1.conpass.value.length==0){ 
alert("campos vacios"); 
return false; 
}
else if(document.form1.login.value.length==0){
alert("login vacio"); 
document.form1.login.focus(); 
return false;
}
else if(document.form1.pass.value.length==0){
alert("nuevo password vacio"); 
document.form1.pass.focus(); 
return false;
}
else if(document.form1.conpass.value.length==0){
alert("confirmacion password vacio"); 
document.form1.conpass.focus(); 
return false;
}
else{
return true;
}
}
</script>
</head>
<body>

<?php
include ('../conexion/base.php');
include_once('adodb/adodb.inc.php');
include_once('adodb/adodb-pager.inc.php');
echo"<div id=\"principal\">
<div id=\"cabecera\">
<img src=\"../presentacion/baner.png\" />
</div>

<div id=\"contenido\">
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\"/></a></p>";
$log=$_POST['login'];
$ncon=$_POST['pass'];
$cncon=$_POST['conpass'];

$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=@mysql_query("SELECT `usuarios`.`login` FROM usuarios where `usuarios`.`login`= '$log'",$conexion);
$filas=mysql_num_rows($query);
if($filas==1){

if("$ncon"=="$cncon"){
$querys=@mysql_query("UPDATE `usuarios` SET `pass`= '$ncon' WHERE `login`= '$log'",$conexion);
$filass=@mysql_num_rows($querys);

if($filas==1){
$base=new base('localhost','root','','plico');
$sqls="UPDATE `usuarios` SET `pass`= '$ncon' WHERE `login`= '$log'";
$rss=$base->dosql($sqls);
echo"<br><br><center><p class=\"Estilo12\">EL PASSWORD SE A CAMBIADO</p></center>";
echo"<center><a href=\"../presentacion/index.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
}


}
else{
echo"<br><br><center><p class=\"Estilo12\">!LOS PASSWORD NO COINCIDEN¡</p></center>";
echo"<center><a href=\"../presentacion/cpassword.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
}



}
else{
echo"<br><br><center><p class=\"Estilo12\">EL LOGIN INGRESADO NO EXISTE</p></center>";
echo"<center><a href=\"../presentacion/cpassword.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
}





echo"</div>
<div class=\"clear\">
</div>
<div id=\"pie\">
  <p align=\"center\" class=\"Estilo11\">Copiright @ 2012-All Rights Reserved</p>
  <p align=\"center\" class=\"Estilo11\">Developed by Jorge Ibarra-Juan Sanchez </p>
</div>
</div>";
?>

</body>
</html>
