<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>borrar recurso asignado</title>
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
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\" /></a></p>";

$ID=$_POST['recasig'];
$fechasis=date('Y-m-d');
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `recursoasignado`.`id_evento`,`recursoasignado`.`id_recursoasignado`,`recursoasignado`.`subtotal` FROM recursoasignado where `recursoasignado`.`id_recursoasignado`='$ID'",$conexion);
$filas=mysql_num_rows($query);
if($filas==1){
$row = @mysql_fetch_array($query);
$evento = $row['id_evento'];
$idrecasig = $row['id_recursoasignado'];
$subtotal = $row['subtotal'];
}
$res=mysql_query("SELECT `eventos`.`id_evento`,`eventos`.`resultado` FROM eventos where `eventos`.`id_evento`='$evento' and `eventos`.`resultado`='NULL'",$conexion);
$fi=mysql_num_rows($res);
if($fi==1){
$querys=mysql_query("SELECT `eventos`.`id_evento`,`eventos`.`costo`,`eventos`.`comentario_res`,`eventos`.`comentario_apr` FROM eventos where `eventos`.`id_evento`='$evento'",$conexion);
$filass=mysql_num_rows($querys);
if($filass==1){
$row = @mysql_fetch_array($querys);
$subcosto = $row['costo'];
}
$costo=$subcosto-$subtotal;

$base=new base('localhost','root','','plico');

$sqltres="UPDATE  `eventos` SET  `costo` =  '$costo' WHERE `eventos`.`id_evento` ='$evento'";

$sql="DELETE FROM `recursoasignado` WHERE `id_recursoasignado` =$ID";



if($rss=$base->dosql($sqltres)and $rsss=$base->dosql($sql)){


echo"<center><p class=\"Estilo12\">EL RECURSO ASIGNADO SE A BORRADO</p></center><BR>";
echo"<center><a href=\"../logica/principal.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
}

else{
echo"<center><img src=\"../presentacion/Advertencia.gif\"/></center>";

echo"<center>DATOS ERRONEOS</center><BR>";
echo"<center><a href=\"../logica/ediasigrec.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
}	
}
else{
echo"<center>DEBE BORRAR PRIMERO LOS RESULTADOS</center><BR>";
echo"<center><a href=\"../logica/ediasigrec.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
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
