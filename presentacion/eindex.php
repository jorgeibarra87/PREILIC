<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="menu_h.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PREILIC</title>
<link rel="shortcut icon"href="icono.ico"/>
<style type="text/css">
<!--
.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 50px}
body {
	background-image: url(fondo.jpg);
}
.Estilo13 {color: #000099}
-->
</style>
</head>

<body>
<?php
$ID=$_GET['ID'];
?>
<div id="principal">
<div id="cabecera"><img src="baner.png" width="920" height="100" /></div>
<div id="contenido">
<div align="right"><a href="../presentacion/cpassword.php" class="Estilo13" style="text-decoration:none">CAMBIAR CONTRASE&Ntilde;A </a></div>

<?php if($ID=1){echo"<center><font color=\"red\">!EL LOGIN O PASSWORD SON INVALIDOS¡</center><center>digite un login y password valido</font><center>";} ?>
<form id="form1" name="form1" method="post" action="../logica/sesion.php">
  <div align="center">
  <table width="414" height="221" border="1" align="center">
      <tr>
        <td colspan="2"><span class="Estilo12"><center>INICIAR SESION</center></span></td>
      </tr>
      <tr>
        <td><center>LOGIN:</center></td>
        <td><center><input name="login" type="text" id="login" autocomplete="off" /></center></td>
      </tr>
      <tr>
        <td><center>PASSWORD:</center></td>
        <td><center><input name="pass" type="password" id="pass" border="1" /></center></td>
      </tr>
      <tr>
        <td><center><input name="isesion" type="submit" id="isesion" value="INICIAR SESION" /></center></td>
        <td><center><input name="cancel" type="reset" id="cancel" value="CANCELAR" /><center></td>
      </tr>
    </table>
  </div>
  <label><br />
  </label>
  <p>
    <label></label><label></label>
    <label></label>
  </p>
  </form>
</div>
<div class="clear">
</div>
<div id="pie">
  <p align="center" class="Estilo11">Copiright @ 2012-All Rights Reserved</p>
  <p align="center" class="Estilo11">Developed by Jorge Ibarra-Juan Sanchez </p>
</div>
</div>

</body>
</html>
