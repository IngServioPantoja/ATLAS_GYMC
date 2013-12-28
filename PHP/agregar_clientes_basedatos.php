<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="\atlas/hojadeestilos.css">
</head>
<?php
include 'conexion.php';
$atributos="insert into personas (";
$valores="values(";
if (!empty($_POST['PNA_FOTO'])){
$atributos=$atributos."PNA_FOTO"; $valores=$valores."'".$_POST['PNA_FOTO']."'";$PNA_FOTO=$_POST['PNA_FOTO'];}else{$atributos=$atributos."PNA_FOTO"; $valores=$valores."'IMAGENES/leon.png'";}
if (!empty($_POST['PNA_NOMBRE'])){
$atributos=$atributos.",PNA_NOMBRE"; $valores=$valores.",'".$_POST['PNA_NOMBRE']."'";$PNA_NOMBRE=$_POST['PNA_NOMBRE'];}else{}
if (!empty($_POST['PNA_APELLIDO'])){
$atributos=$atributos.",PNA_APELLIDO"; $valores=$valores.",'".$_POST['PNA_APELLIDO']."'";$PNA_APELLIDO=$_POST['PNA_APELLIDO'];}else{}
if (!empty($_POST['PNA_SEXO'])){
$atributos=$atributos.",PNA_SEXO"; $valores=$valores.",".$_POST['PNA_SEXO'];$PNA_SEXO=$_POST['PNA_SEXO'];}else{}
$atributos=$atributos.",PNA_FECHA_INICIAL"; $valores=$valores.",'".$_POST['PNA_FECHA_INICIAL']."'";
$atributos=$atributos.",PNA_FECHA_FINAL"; $valores=$valores.",'".$_POST['PNA_FECHA_FINAL']."'";
$atributos=$atributos.") ";
$valores=$valores.")";
$insert="";
$insert=$insert.$atributos.$valores;
$query = mysql_query ($insert)or die(mysql_error());
?>
<body>
		<div id="div_centro_centro">
			<div id="div_centro_centro_texto">
			  <p>Usuario Y Pago Registrados Exitosamente.</p>
			  
        </div>
			<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../mostrar_clientes_agregar.php" />
		</div>
</body>
</html>



