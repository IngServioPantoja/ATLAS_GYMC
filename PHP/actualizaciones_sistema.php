<?php
include 'conexion.php';
if (!empty($_POST['accion'])){$accion=$_POST['accion'];}else{$accion=1;}
if(1==$accion)
{
$actualizar="select @i := 0";
$query = mysql_query ($actualizar)or die(mysql_error());
$actualizar_activos="update personas set pna_orden = (select @i := @i + 1) order by pna_fecha_final asc";
$query_activos = mysql_query ($actualizar_activos)or die(mysql_error());
}
?>




