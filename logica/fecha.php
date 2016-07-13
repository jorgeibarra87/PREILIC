<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-size: xx-large}
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

if(document.form1.nombre.value.length==0&&document.form1.direccion.value.length==0&&document.form1.telefono.value.length==0&&document.form1.email.value.length==0&&document.form1.tiposolicitante.value.length==0){ 
alert("campos vacios"); 
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
alert("funcionario vacio"); 
document.form1.telefono.focus(); 
return false;
}
else if(document.form1.email.value.length==0){
alert("funcionario vacio"); 
document.form1.email.focus(); 
return false;
}
else if(document.form1.tiposolicitante.value.length==0){
alert("funcionario vacio"); 
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
</head>

<body>

<center><p class="Estilo12">&nbsp;</p>
  <p class="Estilo12">&nbsp;</p>
  <form id="form2" name="form2" method="post" action="">
    <label>
      OPCIONES DE REPORTES:
      <select name="select">
        <option value="Reporte de eventos" selected="selected">Reporte de Eventos</option>
        <option value="Reporte Recursos Asignados">Reporte Recursos Asignados</option>
        <option value="Movimientos de Costo">Movimientos de Costo</option>
        <option value="Reporte Recursos">Reporte Recursos</option>
        <option value="Reporte Lugares">Reporte Lugares</option>
        <option value="Reporte Solicitantes">Reporte Solicitantes</option>
      </select> 
    </label>
    <label>
    <input type="submit" name="Submit2" value="IR" />
    </label>
  </form>
  <p class="Estilo12">CREAR SOLICITANTE:</p>
</center><BR>
   <center><form id="form1" name="form1" method="post" action="../logica/newsolicitante.php" onsubmit="return Validar(this);">
  <table width="420" border="1">
    <tr>
      <td width="155"><center><BR>NOMBRE:<BR><BR></center> </td>
      <td width="232"><label>
        <input type="text" name="nombre" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);" />
      </label></td>
    </tr>
    <tr>
      <td><center><BR>DIRECCION:<BR><BR></center> </td>
      <td><label>
        <input type="text" name="direccion" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);"/>
      </label></td>
    </tr>
    <tr>
      <td><center><BR>TELEFONO:<BR><BR></center> </td>
      <td><label>
        <input type="text" name="telefono" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);"/>
      </label></td>
    </tr>
	<tr>
      <td><center><BR>EMAIL:<BR><BR></center> </td>
      <td><label>
        <input type="text" name="email" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);"/>
      </label></td>
    </tr>
	<tr>
      <td><center><BR>TIPO DE SOLICITANTE:<BR><BR></center> </td>
      <td><label>
        <input type="text" name="tiposolicitante" onChange="javascript:while(''+this.value.charAt(0) ==' ')this.value=this.value.substring(1,this.value.len gth);"/>
      </label></td>
    </tr>
	<tr>
      <td><center><BR><input type="submit" name="Submit" value="CREAR" >
	  <BR><BR></center> </td>
      <td><label>
        <center><BR><input type="reset" name="cancel" value="LIMPIAR" /><BR><BR></center>
      </label></td>
    </tr>
  </table>
</form></center>
</body>
</html>
