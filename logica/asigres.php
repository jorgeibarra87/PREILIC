<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>asignacion de los recursos</title>
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
if(document.form1.cantidad.value.length==0&&document.form1.valor.value.length==0){ 
alert("campos vacios"); 
return false; 
}
else if(document.form1.cantidad.value.length==0){
alert("cantidad vacia"); 
document.form1.cantidad.focus(); 
return false;
}
else if(document.form1.valor.value.length==0){
alert("valor vacio"); 
document.form1.valor.focus(); 
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
$radicado=$_POST['radicado'];
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','','plico');
$sql="SELECT `eventos`.`fecha_registro`,`eventos`.`num_radicado`,`eventos`.`nom_evento`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`lugar`.`municipio`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`fecha_apr`,`eventos`.`costo`,`eventos`.`resultado`,`eventos`.`beneficio`,`eventos`.`porcentaje` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante` where `eventos`.`num_radicado`= $radicado ";
echo"<center>";
echo"</center>";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
echo"<center><p class=\"Estilo12\">ASIGNAR RESULTADOS: </p></center><BR>";
echo"<center>EVENTO:</center><BR>";
$pager->Render($rows_per_page=1);
echo"</center><br><br>";
echo"<center>ELIJA EL RECURSO QUE DESEA ASIGNAR AL EVENTO:</center><BR>";
echo"</p><center>";
$base=new base('localhost','root','','plico');
$sql="SELECT `recurso`.`id_recurso`,`recurso`.`nombre_recurso` FROM recurso";
$rs=$base->dosql($sql);
echo"<form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/asignacionres.php?ID=$radicado\" onsubmit=\"return validar()\">
  <table width=\"492\" border=\"1\">
    <tr>
      <td width=\"155\">RECURSO: </td>
      <td width=\"232\"><label>
        <center><BR><select name=\"recurso\">";
           while(!$rs->EOF)
{
	    $rec=$rs->fields['nombre_recurso'];
		$irec=$rs->fields['id_recurso'];
		echo"<option value=\"$irec\">$rec</option>";
		$rs->MoveNext();
}		
        echo"</select><BR><BR></center>
      </label></td>
    </tr>
    <tr>
      <td>CANTIDAD: </td>
      <td><label>
        <center><BR><input type=\"text\" name=\"cantidad\" /><BR><BR></center>
      </label></td>
    </tr>
    <tr>
      <td>VALOR: </td>
      <td><label>
        <center><BR><input type=\"text\" name=\"valor\" /><BR><BR></center>
      </label></td>
    </tr>
	<tr>
      <td><center><BR><input type=\"submit\" name=\"Submit\" value=\"ASIGNAR\" /><BR><BR></center> </td>
      <td><label>
        <center><BR><input type=\"reset\" name=\"cancel\" value=\"CANCELAR\" /><BR><BR></center>
      </label></td>
    </tr>
  </table>
</form><BR><BR><BR>";





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
