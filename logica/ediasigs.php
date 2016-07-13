<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>editar el resultado asignado</title>
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
$radicado=$_POST['radicado'];
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `eventos`.`id_evento`,`eventos`.`num_radicado`,`eventos`.`estado` FROM `eventos`where `eventos`.`num_radicado`='$radicado'",$conexion);
$filas=mysql_num_rows($query);
if($filas==1){
$row = @mysql_fetch_array($query);
$idevento= $row['id_evento'];
}
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


echo"<center><p\">EVENTO Y RESULTADOS ASIGNADOS </p></center><BR>";
$db = NewADOConnection('mysql');
  $db->Connect('localhost','root','','plico');
  $sql="SELECT `eventos`.`fecha_registro`,`eventos`.`num_radicado`,`eventos`.`nom_evento`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`lugar`.`municipio`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`fecha_apr`,`eventos`.`costo`,`eventos`.`resultado`,`eventos`.`beneficio`,`eventos`.`porcentaje` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$radicado'";
echo"<center>";
echo"</center>";
$pager = new ADODB_Pager($db,$sql);
echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br><br>";
$sqldos="SELECT `resultado`.`id_resultado`,`eventos`.`nom_evento`,`recurso`.`nombre_recurso`,`resultado`.`cantidad`,`resultado`.`valor`,`resultado`.`subtotal` FROM resultado
LEFT JOIN `plico`.`eventos` ON `resultado`.`id_evento` = `eventos`.`id_evento` 
LEFT JOIN `plico`.`recurso` ON `resultado`.`id_recurso` = `recurso`.`id_recurso`  where `resultado`.`id_evento`='$idevento'";
$page = new ADODB_Pager($db,$sqldos);
echo"<center><p class=\"Estilo12\">RESULTADOS ASIGNADOS: </p></center><BR>";
echo"<center>";
$page->Render($rows_per_page=10);

echo"<BR><BR><center>";
echo"<center>ELIJA EL RESULTADO ASIGNADO QUE DESEA BORRAR:</center><BR><BR>";
$base=new base('localhost','root','','plico');
$rs=$base->dosql($sqldos);
 echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/borrarecasigs.php\">
<select name=\"resasig\">";
    while(!$rs->EOF)
{
	    $resasig=$rs->fields['nombre_recurso'];
		$iresasig=$rs->fields['id_resultado'];
		echo"<option value=\"$iresasig\">$iresasig</option>";
		$rs->MoveNext();
}		
  echo"</select><BR><BR>
<input type=\"submit\" name=\"Submit\" value=\"BORRAR\" onclick=\"return confirmar('¿Está seguro que desea eliminar el registro?')\" />
</form></center><BR><BR>";




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
