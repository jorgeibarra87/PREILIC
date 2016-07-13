<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>crear solicitante</title>
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
<script type="text/javascript"> 
function ValMail(valor) { 
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){ 
   return (true) 
} else {alert("Por favor, ingrese un eMail válido."); 
return (false); 
} 
} 
 
function ValPass() { 

if(document.form1.cedula.value.length==0&&document.form1.nombre.value.length==0&&document.form1.direccion.value.length==0&&document.form1.telefono.value.length==0&&document.form1.email.value.length==0&&document.form1.tiposolicitante.value.length==0){ 
alert("campos vacios"); 
return false; 
}
else if(document.form1.cedula.value.length==0){
alert("cedula vacia"); 
document.form1.cedula.focus(); 
return false;
}
else if(document.form1.nombre.value.length==0){
alert("nombre vacio"); 
document.form1.nombre.focus(); 
return false;
}
else if(document.form1.direccion.value.length==0){
alert("direccion vacia"); 
document.form1.direccion.focus(); 
return false;
}
else if(document.form1.telefono.value.length==0){
alert("telefono vacio"); 
document.form1.telefono.focus(); 
return false;
}
else if(document.form1.email.value.length==0){
alert("email vacio"); 
document.form1.email.focus(); 
return false;
}
else if(document.form1.tiposolicitante.value.length==0){
alert("tipo de solicitante vacio"); 
document.form1.tiposolicitante.focus(); 
return false;
}
else{ 
return true; 
} 
} 
function Validar(frm){
return ValPass()&& ValMail(frm.email.value);
}

</script>
<script language="javascript" type="text/javascript">
    //*** Este Codigo permite Validar que sea un campo Numerico
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
    //*** Fin del Codigo para Validar que sea un campo Numerico
</script>
</head>
<body>

<?php
include('../logica/seguridad.php');
include ('../conexion/base.php');
include('../conexion/adodb5/adodb.inc.php');
include('../conexion/adodb5/adodb-pager.inc.php');
echo"<div id=\"principal\">
<div id=\"cabecera\">
<img src=\"../presentacion/baner.png\" />
</div>
<div id=\"header\">
<ul class=\"nav\">
     <li><a>Usuarios</a>
           <ul>
               <li><a>Crear</a>
                   <ul>
                       <li><a href=\"../logica/crearusuario.php\">Crear Usuario</a></li>
                       <li><a href=\"../logica/crearperfil.php\">Crear Perfil</a></li>
					   <li><a href=\"../logica/crearpp.php\">Crear Perfil Permiso</a></li>
                  </ul>
             </li>
               <li><a>Ver</a>
                    <ul>
                       <li><a href=\"../logica/verusuario.php\">Usuarios</a></li>
                       <li><a href=\"../logica/verperfil.php\">Perfiles</a></li>
					   <li><a href=\"../logica/verperfilper.php\">Perfil Permiso</a></li>
                    </ul>
             </li>
			  <li><a>Editar</a>
			       <ul>
                       <li><a href=\"../logica/editarusuario.php\">Editar Usuarios</a></li>
                       <li><a href=\"../logica/editarperfil.php\">Editar Perfiles</a></li>
					   <li><a href=\"../logica/edperfper.php\">Borrar Perfil Permiso</a></li>
                  </ul>
           </ul>
      </li>
     <li><a>Datos Basicos</a>
           <ul>
               <li><a>Crear</a>
                   <ul>
                       <li><a href=\"../logica/crearlugar.php\">Crear Lugar</a></li>
                       <li><a href=\"../logica/crearsolicitante.php\">Crear Solicitante</a></li>
                       <li><a href=\"../logica/crearecurso.php\">Crear Recurso</a></li>
	            </ul>
             </li>
               <li><a>Ver</a>
                    <ul>
                       <li><a href=\"../logica/verlugar.php\">Ver Lugares</a></li>
                       <li><a href=\"../logica/versolicitante.php\">Ver Solicitantes</a></li>
                       <li><a href=\"../logica/verecurso.php\">Ver Recursos</a></li>
                    </ul>
             </li>
			 <li><a>Editar</a>
                    <ul>
                       <li><a href=\"../logica/editarlugar.php\">Editar Lugares</a></li>
                       <li><a href=\"../logica/edsolicitante.php\">Editar Solicitantes</a></li>
                       <li><a href=\"../logica/editarecurso.php\">Editar Recursos</a></li>
                    </ul>
           </ul>
      </li>
     <li><a>Eventos</a>
           <ul>
               <li><a href=\"../logica/crearevento.php\">Crear Evento</a></li>
               <li><a href=\"../logica/principal.php\">Ver Eventos</a></li>
			   <li><a href=\"../logica/bevento.php\">Editar Eventos</a></li>
			   <li><a href=\"../logica/aprobarevento.php\">Aprobar Eventos</a></li>
			   <li><a href=\"../logica/cambiarestado.php\">Cambiar Estado</a></li>
           </ul>
      </li>
     <li><a>Asignar Recursos</a>
	       <ul>
               <li><a>Asignar</a>
                   <ul>
                       <li><a href=\"../logica/asignarrecursos.php\">Asignar Recursos</a></li>
                       <li><a href=\"../logica/asignarresultados.php\">Asignar Resultados</a></li>
	            </ul>
             </li>
               <li><a>Ver</a>
                    <ul>
                       <li><a href=\"../logica/verasigrec.php\">Ver Rec Asignados</a></li>
                       <li><a href=\"../logica/verresultados.php\">Ver Resultados</a></li>
                    </ul>
             </li>
			 <li><a>Borrar</a>
                    <ul>
                       <li><a href=\"../logica/ediasigrec.php\">Borrar Rec Asignados</a></li>
                       <li><a href=\"../logica/ediasigres.php\">Borrar Resultados</a></li>

                    </ul>
           </ul>
      </li>   
     <li><a>Reportes</a>
	        <ul>
              <li><a href=\"../presentacion/reportes.php\">Generar Reportes</a></li>
	        </ul>
	 </li> 
</ul>
</div>
<div id=\"contenido\">
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\"/></a></p>";
$usuario=$_SESSION['user'];
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `usuarios`.`login`,`usuarios`.`id_perfil` FROM `usuarios`where `usuarios`.`login`='$usuario'",$conexion);
$filas=mysql_num_rows($query);
if($filas==1){
$row = @mysql_fetch_array($query);
$perfil = $row['id_perfil'];
}
$consulta=mysql_query("SELECT `permisos_perfil`.`id_perfil`,`permisos_perfil`.`id_permiso` FROM `permisos_perfil`where `permisos_perfil`.`id_perfil`='$perfil'and `permisos_perfil`.`id_permiso`='1'",$conexion);
$fila=mysql_num_rows($consulta);
$consul=mysql_query("SELECT `permisos_perfil`.`id_perfil`,`permisos_perfil`.`id_permiso` FROM `permisos_perfil`where `permisos_perfil`.`id_perfil`='$perfil'and `permisos_perfil`.`id_permiso`='5'",$conexion);
$fil=mysql_num_rows($consul);
if($fila==1||$fil==1){

$ced=$_POST['cedula'];
$sql=@mysql_query("SELECT `cedula`, `solicitante`, `direccion`, `telefono`, `email`, `tipo_solicitante` FROM `solicitante` WHERE `cedula`='$ced'",$conexion);
$s=@mysql_num_rows($sql);
if($s==1){
$rows = @mysql_fetch_array($sql);

$cedula= $rows['cedula'];
$solicitante= $rows['solicitante'];
$direccion= $rows['direccion'];
$telefono= $rows['telefono'];
$email= $rows['email'];
$tiposolicitante= $rows['tipo_solicitante'];


   echo"<center><p class=\"Estilo12\">EDITAR SOLICITANTE:</p></center><BR>";
   echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/updatesol.php?ID=$ced\" onsubmit=\"return Validar(this);\">
  <table width=\"420\" border=\"1\">
    <tr>
      <td width=\"155\"><center><BR>CEDULA:<BR><BR></center> </td>
      <td width=\"232\"><label>
        <input type=\"text\" name=\"cedula\" value=\"$cedula\"/>
      </label></td>
    </tr>
	<tr>
      <td width=\"155\"><center><BR>NOMBRE:<BR><BR></center> </td>
      <td width=\"232\"><label>
        <input type=\"text\" name=\"nombre\" value=\"$solicitante\"/>
      </label></td>
    </tr>
    <tr>
      <td><center><BR>DIRECCION:<BR><BR></center> </td>
      <td><label>
        <input type=\"text\" name=\"direccion\" value=\"$direccion\" />
      </label></td>
    </tr>
    <tr>
      <td><center><BR>TELEFONO:<BR><BR></center> </td>
      <td><label>
        <input type=\"text\" name=\"telefono\" value=\"$telefono\"  onkeyUp=\"return ValNumero(this);\"/>
      </label></td>
    </tr>
	<tr>
      <td><center><BR>EMAIL:<BR><BR></center> </td>
      <td><label>
        <input type=\"text\" name=\"email\" value=\"$email\" />
      </label></td>
    </tr>
	<tr>
      <td><center><BR>TIPO DE SOLICITANTE:<BR><BR></center> </td>
      <td><label>
        <select name=\"tiposolicitante\">
        <option value=\"Alcaldia\">Alcaldia</option>
        <option value=\"Junta\">Junta</option>
        <option value=\"Comunidad Indigena\">Comunidad Indigena</option>
        <option value=\"Persona Natural\">Persona Natural</option>
		<option value=\"Estanco\">Estanco</option>
        <option value=\"Otro\">Otro</option>
      </select>
      </label></td>
    </tr>
	<tr>
      <td><center><BR><input type=\"submit\" name=\"Submit\" value=\"EDITAR\" /><BR><BR></center> </td>
      <td><label>
        <center><BR><input type=\"reset\" name=\"cancel\" value=\"LIMPIAR\" /><BR><BR></center>
      </label></td>
    </tr>
  </table>
</form></center>";
echo"<br><br><br>";
}
else{
echo"<center><img src=\"../presentacion/Advertencia.gif\"/></center>";
echo"<center>DATOS ERRONEOS:</center><BR>";
echo"<center><a href=\"../logica/edsolicitante.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}
}
else{
echo"<center><img src=\"../presentacion/Advertencia.gif\"/></center>";
echo"<center>ACCESO RESTRINGIDO</center><BR>";
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
