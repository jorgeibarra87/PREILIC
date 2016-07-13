<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ver detalle evento</title>
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
$ID=$_POST['radicado'];
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `eventos`.`id_evento`,`eventos`.`estado`,`eventos`.`comentario_res`,`eventos`.`comentario_apr` FROM eventos where `eventos`.`num_radicado`='$ID'",$conexion);
$filas=mysql_num_rows($query);
if($filas==1){
$row = @mysql_fetch_array($query);
$estado = $row['estado'];
$comenres = $row['comentario_res'];
$comenapr = $row['comentario_apr'];
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
if(($estado=='aprobado'||$estado=='no aprobado')and $comenapr==''){
echo"<fieldset><legend>AGREGAR COMENTARIO DE APROBACION</legend><BR>
<form id=\"form1\" name=\"form1\" method=\"post\" action=\"../presentacion/comentapr.php?ID=$ID\">
<label>COMENTARIO DE APROBACION DEL EVENTO:<BR>
  <input type=\"text\" name=\"aprobado\" />
  </label>
  <input type=\"submit\" name=\"Submit\" value=\"AGREGAR\" />
</form><BR>
</fieldset>";


echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','','plico');
$sql="SELECT `eventos`.`nom_evento`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`costo` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$ID'";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">FECHAS: </p></center><BR>";
$consulta="SELECT `eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`eventos`.`fecha_apr`,`eventos`.`fecha_resultado` FROM eventos where `eventos`.`num_radicado`='$ID'";
$page = new ADODB_Pager($db,$consulta);
echo"<center>";
$page->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">USUARIOS Y COMENTARIOS: </p></center><BR>";
$consul="SELECT `eventos`.`id_usuario_reg`,`eventos`.`comentario_apr`,`eventos`.`id_usuario_apr`,`eventos`.`comentario_res`,`eventos`.`id_usuario_res` FROM eventos where `eventos`.`num_radicado`='$ID'";
$pag = new ADODB_Pager($db,$consul);
echo"<center>";
$pag->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}

else if(($estado=='aprobado'||$estado=='no aprobado') and $comenres=!NULL){
echo"<fieldset><legend>ACTUALIZAR COMENTARIO DE APROBACION</legend><BR>
<form id=\"form1\" name=\"form1\" method=\"post\" action=\"../presentacion/comentapr.php?ID=$ID\">
<label>COMENTARIO DE APROBACION DEL EVENTO:<BR>
  <input type=\"text\" name=\"aprobado\" />
  </label>
  <input type=\"submit\" name=\"Submit\" value=\"AGREGAR\" />
</form><BR>
</fieldset>";
echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
$db = NewADOConnection('mysql');
			$db->Connect('localhost','root','','plico');
			$sql="SELECT `eventos`.`nom_evento`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`costo` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$ID'";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">FECHAS: </p></center><BR>";
$consulta="SELECT `eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`eventos`.`fecha_apr`,`eventos`.`fecha_resultado` FROM eventos where `eventos`.`num_radicado`='$ID'";
$page = new ADODB_Pager($db,$consulta);
echo"<center>";
$page->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">USUARIOS Y COMENTARIOS: </p></center><BR>";
$consul="SELECT `eventos`.`id_usuario_reg`,`eventos`.`comentario_apr`,`eventos`.`id_usuario_apr`,`eventos`.`comentario_res`,`eventos`.`id_usuario_res` FROM eventos where `eventos`.`num_radicado`='$ID'";
$pag = new ADODB_Pager($db,$consul);
echo"<center>";
$pag->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}

else if(($estado=='realizado'||$estado=='no realizado') and $comenres==''){
echo"<fieldset><legend>AGREGAR COMENTARIO DE RESULTADO</legend><BR>
<form id=\"form1\" name=\"form1\" method=\"post\" action=\"../presentacion/comentres.php?ID=$ID\">
<label>COMENTARIO DE RESULTADO DEL EVENTO:<BR>
  <input type=\"text\" name=\"resultado\" />
  </label>
  <input type=\"submit\" name=\"Submit\" value=\"AGREGAR\" />
</form><BR>
</fieldset>";


echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','','plico');
$sql="SELECT `eventos`.`nom_evento`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`costo` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$ID'";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">FECHAS: </p></center><BR>";
$consulta="SELECT `eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`eventos`.`fecha_apr`,`eventos`.`fecha_resultado` FROM eventos where `eventos`.`num_radicado`='$ID'";
$page = new ADODB_Pager($db,$consulta);
echo"<center>";
$page->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">USUARIOS Y COMENTARIOS: </p></center><BR>";
$consul="SELECT `eventos`.`id_usuario_reg`,`eventos`.`comentario_apr`,`eventos`.`id_usuario_apr`,`eventos`.`comentario_res`,`eventos`.`id_usuario_res` FROM eventos where `eventos`.`num_radicado`='$ID'";
$pag = new ADODB_Pager($db,$consul);
echo"<center>";
$pag->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}

else if(($estado=='realizado'||$estado=='no realizado') and $comenres=!NULL){
echo"<fieldset><legend>ACTUALIZAR COMENTARIO DE RESULTADO</legend><BR>
<form id=\"form1\" name=\"form1\" method=\"post\" action=\"../presentacion/comentres.php?ID=$ID\">
<label>COMENTARIO DE RESULTADO DEL EVENTO:<BR>
  <input type=\"text\" name=\"resultado\" />
  </label>
  <input type=\"submit\" name=\"Submit\" value=\"AGREGAR\" />
</form><BR>
</fieldset>";

echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
$db = NewADOConnection('mysql');
			$db->Connect('localhost','root','','plico');
			$sql="SELECT `eventos`.`nom_evento`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`costo` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$ID'";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">FECHAS: </p></center><BR>";
$consulta="SELECT `eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`eventos`.`fecha_apr`,`eventos`.`fecha_resultado` FROM eventos where `eventos`.`num_radicado`='$ID'";
$page = new ADODB_Pager($db,$consulta);
echo"<center>";
$page->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">USUARIOS Y COMENTARIOS: </p></center><BR>";
$consul="SELECT `eventos`.`id_usuario_reg`,`eventos`.`comentario_apr`,`eventos`.`id_usuario_apr`,`eventos`.`comentario_res`,`eventos`.`id_usuario_res` FROM eventos where `eventos`.`num_radicado`='$ID'";
$pag = new ADODB_Pager($db,$consul);
echo"<center>";
$pag->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}

else if($estado=='pendiente'){
echo"<center><p class=\"Estilo12\">EVENTO: </p></center><BR>";
$db = NewADOConnection('mysql');
			$db->Connect('localhost','root','','plico');
			$sql="SELECT `eventos`.`nom_evento`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`costo` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`='$ID'";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">FECHAS: </p></center><BR>";
$consulta="SELECT `eventos`.`fecha_registro`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`eventos`.`fecha_apr`,`eventos`.`fecha_resultado` FROM eventos where `eventos`.`num_radicado`='$ID'";
$page = new ADODB_Pager($db,$consulta);
echo"<center>";
$page->Render($rows_per_page=1);
echo"</center><br>";

echo"<center><p class=\"Estilo12\">USUARIOS Y COMENTARIOS: </p></center><BR>";
$consul="SELECT `eventos`.`id_usuario_reg`,`eventos`.`comentario_apr`,`eventos`.`id_usuario_apr`,`eventos`.`comentario_res`,`eventos`.`id_usuario_res` FROM eventos where `eventos`.`num_radicado`='$ID'";
$pag = new ADODB_Pager($db,$consul);
echo"<center>";
$pag->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center><BR><BR>";
}
else{
echo"<center><img src=\"../presentacion/Advertencia.gif\"/></center>";
echo"<center>DATOS ERRONEOS</center><BR>";
echo"<center><a href=\"../logica/bevento.php\"><IMG  src=\"../presentacion/volver.jpg\" ></a></center>";
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
