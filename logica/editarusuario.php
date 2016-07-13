<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>editar usuario</title>
<link rel="stylesheet" type="text/css" href="../presentacion/estilos.css">
<link rel="shortcut icon"href="../presentacion/icono.ico"/>
<link rel="stylesheet" type="text/css" href="../presentacion/menu_h.css">
<style type="text/css">
<!--
.Estilo11 {font-size: 12px}
.Estilo12 {font-size: 50px}
body {
	background-image: url(../presentacion/fondo.jpg);
}
-->
</style>
<script language="JavaScript"> 
function confirmar ( mensaje ) { 
return confirm( mensaje ); 
}
</script> 
</head>

<body>
<?php
include('../logica/seguridad.php');
include ('../conexion/base.php');
include_once('adodb/adodb.inc.php');
include_once('adodb/adodb-pager.inc.php');
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
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\" /></a></p>";
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
$consul=mysql_query("SELECT `permisos_perfil`.`id_perfil`,`permisos_perfil`.`id_permiso` FROM `permisos_perfil`where `permisos_perfil`.`id_perfil`='$perfil'and `permisos_perfil`.`id_permiso`='4'",$conexion);
$fil=mysql_num_rows($consul);
if($fila==1||$fil==1){
echo"<center><p class=\"Estilo12\">USUARIOS: </p></center>";
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','','plico');
$db->execute("SET NAMES 'utf8'"); 
$sql="SELECT `usuarios`.`id_usuario`,`usuarios`.`login`,`usuarios`.`pass`,`usuarios`.`id_perfil`,`usuarios`.`funcionario` FROM usuarios";
echo"<center>";
echo"</center>";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=10);
echo"</center><br><br>";
$base=new base('localhost','root','','plico');
$sqls="SELECT `usuarios`.`id_usuario`,`usuarios`.`login` FROM usuarios";
$rss=$base->dosql($sqls);

$sqlss="SELECT `usuarios`.`id_usuario`,`usuarios`.`login` FROM usuarios";
$rsss=$base->dosql($sqlss);

echo"<center><p class=\"Estilo12\">EDITAR USUARIOS ELEGIR: </p></center><BR><BR>";
echo"<center><p class=\"Estilo12\">USUARIOS: </p></center><BR>";
echo"<center>ELIJA EL USUARIO PARA EDITAR:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/editaruser.php\">";
echo"<center>";
echo"<select name=\"usuario\">";
            while(!$rss->EOF)
{
	    $usuario=$rss->fields['login'];
		$iusuario=$rss->fields['id_usuario'];
		echo"<option value=\"$iusuario\">$usuario</option><BR><BR>";
		$rss->MoveNext();
}		
echo"</center>";
echo"<center><BR><input type=\"submit\" name=\"Submit\" value=\" EDITAR \" /></center><BR><BR>";
echo"</form></center><br><br>";


echo"<center>ELIJA EL USUARIO PARA BORRAR:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/borraus.php\">";
echo"<center>";
echo"<select name=\"usuario\">";
            while(!$rsss->EOF)
{
	    $usuarios=$rsss->fields['login'];
		$iusuarios=$rsss->fields['id_usuario'];
		echo"<option value=\"$iusuarios\">$usuarios</option><BR><BR>";
		$rsss->MoveNext();
}		
echo"</center>";
echo"<center><BR><input type=\"submit\" name=\"Submit\" value=\" BORRAR \" onclick=\"return confirmar('¿Está seguro que desea eliminar el registro?')\"/></center><BR><BR>";
echo"</form></center><br><br>";

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
