<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>cambiar contrase&ntilde;a</title>
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
echo"<div id=\"principal\">
<div id=\"cabecera\">
<img src=\"../presentacion/baner.png\" />
</div>

<div id=\"contenido\">
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\"/></a></p>";

echo"<br><br><center><p class=\"Estilo12\">CAMBIAR CONTRASE&Ntilde;A :</p></center>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../presentacion/newpass.php\" onsubmit=\"return Validar(this);\">
  <table width=\"516\" border=\"1\" bordercolor=\"#000000\" bgcolor=\"#FFFFFF\">
    <tr>
      <td width=\"307\"><center><BR>
      LOGIN
      :<BR>
      <BR></center> </td>
      <td width=\"193\"><label>
        <center><input type=\"text\" name=\"login\" autocomplete=\"off\" onChange=\"javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);\" /></center>
      </label></td>
    </tr>
    <tr>
      <td><center><BR>
      NUEVA CONTRASE&Ntilde;A
      :<BR>
      <BR></center> </td>
      <td><label>
        <center><input type=\"password\" name=\"pass\" onChange=\"javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);\"/></center>
      </label></td>
    </tr>
    <tr>
      <td><center><BR>
      CONFIRMAR NUEVA CONTRASE&Ntilde;A:
      <BR>
      <BR></center> </td>
      <td><label>
        <center><input type=\"password\" name=\"conpass\" onChange=\"javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);\"/></center>
      </label></td>
    </tr>
	<tr>
      <td><center><BR><input type=\"submit\" name=\"Submit\" value=\" CAMBIAR \" >
	  <BR><BR></center> </td>
      <td><label>
        <center><BR><input type=\"reset\" name=\"cancel\" value=\" CANCELAR \" /><BR><BR></center>
      </label></td>
    </tr>
  </table>
</form></center<br><br>";



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
