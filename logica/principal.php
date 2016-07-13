<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Eventos Principal</title>
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
    $(document).ready(function() {
        $( "#datepick" ).datepicker();
		$( "#datepick" ).datepicker('option',{dateFormat:'yy/mm/dd'});
    });
</script>
<script>
    $(document).ready(function() {
        $( "#datepicke" ).datepicker();
		$( "#datepicke" ).datepicker('option',{dateFormat:'yy/mm/dd'});
    });
</script>

<?php
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `lugar`.`lugar` FROM lugar order by `lugar`",$conexion);

/*$con = "select * from palabras";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysql_query($con);*/
?>

<script>
	$(function() {
		
	<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['lugar'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
?>	
		
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#busca" ).autocomplete({
			source: availableTags
		});
	});
	</script>



<script>
    $(document).ready(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker('option',{dateFormat:'yy/mm/dd'});
    });
</script>
<script>
    $(document).ready(function() {
        $( "#datepickerr" ).datepicker();
		$( "#datepickerr" ).datepicker('option',{dateFormat:'yy/mm/dd'});
    });
</script>

<?php
$conexion=mysql_connect('localhost','root','');
mysql_select_db('plico',$conexion);
$query=mysql_query("SELECT `lugar`.`lugar` FROM lugar order by `lugar`",$conexion);

/*$con = "select * from palabras";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysql_query($con);*/
?>

<script>
	$(function() {
		
	<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['lugar'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
?>	
		
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#buscar" ).autocomplete({
			source: availableTags
		});
	});
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
<p align=\"right\" class=\"Estilo12\"><a href=\"../presentacion/salir.php\"><img src=\"../presentacion/cerrarSession.gif\" width=\"97\" height=\"21\" border=\"0\" /></a></p>
<center><p class=\"Estilo12\">EVENTOS: </p></center>";
			$db = NewADOConnection('mysql');
			$db->Connect('localhost','root','','plico');
			$sql="SELECT `eventos`.`fecha_registro`,`eventos`.`num_radicado`,`eventos`.`nom_evento`,`eventos`.`fecha_inicio`,`eventos`.`fecha_fin`,`lugar`.`municipio`,`lugar`.`lugar`,`solicitante`.`solicitante`,`eventos`.`estado`,`eventos`.`fecha_apr`,`eventos`.`costo`,`eventos`.`resultado`,`eventos`.`beneficio`,`eventos`.`porcentaje` FROM eventos
LEFT JOIN `plico`.`lugar` ON `eventos`.`id_lugar` = `lugar`.`id_lugar` 
LEFT JOIN `plico`.`solicitante` ON `eventos`.`id_solicitante` = `solicitante`.`id_solicitante`";
echo"<center>";
echo"</center>";
$pager = new ADODB_Pager($db,$sql);
echo"<center>";
$pager->Render($rows_per_page=10);
echo"</center><br><br>";
echo"<br><center><p class=\"Estilo12\">OPCIONES:</p></center><br>";

echo"<center>VER EVENTOS POR ESTADO:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/verestado.php\">
<select name=\"estado\">
        <option value=\"aprobado\">aprobado</option>
        <option value=\"no aprobado\">no aprobado</option>
        <option value=\"pendiente\">pendiente</option>
        <option value=\"realizado\">realizado</option>
		<option value=\"no realizado\">no realizado</option>
      </select> 
	  <center><BR><input type=\"submit\" name=\"Submit\" value=\" VER \" /><BR><BR></center>
</form></center><br><br>";

echo"<center>VER EVENTOS POR FECHAS Y ESTADO:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/verfechaestado.php\">";
echo"<label>DESDE LA FECHA:
        <input readonly type=\"text\"name=\"fechaini\" id=\"datepicker\"/>
      </label>";
echo"<label>HASTA LA FECHA: 
        <input readonly type=\"text\"name=\"fechafin\" id=\"datepickerr\"/>
      </label>";
echo"ESTADO:	  
<select name=\"estado\">
        <option value=\"aprobado\">aprobado</option>
        <option value=\"no aprobado\">no aprobado</option>
        <option value=\"pendiente\">pendiente</option>
        <option value=\"realizado\">realizado</option>
		<option value=\"no realizado\">no realizado</option>
      </select> 
	  <center><BR><input type=\"submit\" name=\"Submit\" value=\" VER \" /><BR><BR></center>
</form></center><br><br>";
echo"<center>VER EVENTOS POR LUGAR:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/vermunicipio.php\">";

echo"<input type=\"text\" name=\"lugar\"id=\"buscar\" />
<center><BR><input type=\"submit\" name=\"Submit\" value=\" VER \" /><BR><BR></center>
</form></center><br><br>";


echo"<center>VER EVENTOS POR FECHAS Y LUGAR:</center><BR>";
echo"<center><form id=\"form1\" name=\"form1\" method=\"post\" action=\"../logica/verfechalugar.php\">";
echo"<label>DESDE LA FECHA:
        <input readonly type=\"text\"name=\"fechaini\" id=\"datepick\"/>
      </label>";
echo"<label>HASTA LA FECHA: 
        <input readonly type=\"text\"name=\"fechafin\" id=\"datepicke\"/>
      </label>";
echo"LUGAR:	  
      <input type=\"text\" name=\"lugar\"id=\"busca\" />
	  <center><BR><input type=\"submit\" name=\"Submit\" value=\" VER \" /><BR><BR></center>
</form></center><br><br>";


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
