<?php

include 'PHP/conexion.php';
$select="select PNA_CODIGO,PNA_NOMBRE,PNA_APELLIDO from personas";
$query = mysql_query ($select)or die(mysql_error());
$fila=mysql_fetch_array($query, MYSQL_ASSOC);
$PNA_NOMBRE=$fila["PNA_NOMBRE"];
$PNA_APELLIDO=$fila["PNA_APELLIDO"];
?>
<!DOCTYPE html>
<html lang="es" height='100%'>
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="hojadeestilos.css">
<title>ATLAS GYM</title>
<style type="text/css">
.Copiright {
	color: #FFF;
}
body,td,th {
	font-family: Helvetica, Arial;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#bodyindex #contenido #internalpanel1 header nav {
	text-align: center;
}
#bodyindex #contenido #internalpanel1 header nav ul li a {
	text-align: center;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script src='http://code.jquery.com/jquery-1.7.2.min.js'></script>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="js/jquery.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var accion_realizar=1;
	window.onload = $.post("PHP/actualizaciones_sistema.php", { accion: accion_realizar}, function(data){
		});		

});	
function actualizar_sesiones_restantes()
{	//Funcion utilizada para calculr las sesiones restantes de un cliente
var accion_realizar=1;
$.post("PHP/actualizaciones_sistema.php", 
	{ accion: accion_realizar}, 
	  function(data)
	  {
	 });		
}

function cerrar_sesion()
{	//Funcion utilizada para calculr las sesiones restantes de un cliente
	actualizar_sesiones_restantes();
	if(confirm('¿Desea cerrar Sesion Y Guardar Cambios Realizados?'))
	{
		window.location.href = 'PHP/cerrar.php';
	}
}
</script>
<body id='bodyindex' height='100%'>
<div id='contenido'>
        <div id='internalpanel1'>
        <img id='imagenlogo' src='IMAGENES/logo.png'>
			 
			         <nav><ul>
             		  <li><a href='mostrar_clientes_agregar.php' target='internal' name='memunav' onClick='actualizar_sesiones_restantes()'>&nbsp;&nbsp;NUEVO CLIENTE&nbsp;</a></li>
					  <li><a href='objeto_pagos.php' target='internal' name='memunav' onClick='actualizar_sesiones_restantes()'>&nbsp;&nbsp;PAGOS&nbsp;&nbsp;</a></li>
					  <li><a href='mostrar_clientes_consultar.php' target='internal' name='memunav'>&nbsp;&nbsp;FOTOS HOMBRES&nbsp;&nbsp;</a></li>
					  <li><a href='mostrar_clientes_consultar_mujeres.php' target='internal' name='memunav' o>&nbsp;&nbsp;FOTOS MUJERES&nbsp;&nbsp;</a></li>
            <li><a href='copiar.php' target='internal' name='memunav' o>&nbsp;&nbsp;COPIAR&nbsp;&nbsp;</a></li>
                      <li><a href='sistema.html' target='internal' name='memunav'>&nbsp;&nbsp;SISTEMA&nbsp;&nbsp;</a></li>
			         </ul>  
		  </nav>		  
		
</div>

				   <div id='internalpanel'>
		       <object type="text/html" name='internal' id='object_panel' data='objeto_bienvenidos.php'> </object>

</div>

<span id="copyright">Copyright (c) 2012-2013 Pasto-Nariño de Servio Andres Pantoja Rosero. Todos los derechos reservados. </span>
</div>	
</body>
</html>
