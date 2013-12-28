<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="\atlas/hojadeestilos.css">
<title>ATLAS GYM</title>
</head>
<?php
include 'conexion.php';
if (!empty($_POST['PNA_CODIGO'])){
$PNA_CODIGO=$_POST['PNA_CODIGO'];}else{}
$atributos="delete from personas where PNA_CODIGO=$PNA_CODIGO LIMIT 1";
$insert="";
$insert=$insert.$atributos;
$query = mysql_query ($insert)or die(mysql_error());
$actualizar="select @i := 0";
$query = mysql_query ($actualizar)or die(mysql_error());
$actualizar_activos="update personas set pna_orden = (select @i := @i + 1) order by pna_fecha_final asc";
$query_activos = mysql_query ($actualizar_activos)or die(mysql_error());
?>

<body>
		<div id="div_centro_centro">
			<div id="div_centro_centro_texto">Usuario Borrado Exitosamente.</div>
			<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../mostrar_clientes_eliminar_viejo.php" />
		</div>
</body>
</html>



