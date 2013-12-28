<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="\atlas/hojadeestilos.css">
</head>
<?php
include 'conexion.php';
$atributos="update personas set ";
if (!empty($_POST['A_BORAR'])){
$PNA_CODIGO=$_POST['A_BORAR'];}else{}
if (!empty($_POST['PNA_FOTO'])){
$PNA_FOTO=$_POST['PNA_FOTO'];$atributos=$atributos."PNA_FOTO='$PNA_FOTO'";}else{$atributos=$atributos."PNA_FOTO='fotos/leon.png'";}
if (!empty($_POST['PNA_NOMBRE'])){
$PNA_NOMBRE=$_POST['PNA_NOMBRE'];$atributos=$atributos.",PNA_NOMBRE='$PNA_NOMBRE'";}else{}
if (!empty($_POST['PNA_APELLIDO'])){
$PNA_APELLIDO=$_POST['PNA_APELLIDO'];$atributos=$atributos.",PNA_APELLIDO='$PNA_APELLIDO'";}else{}
if (!empty($_POST['PNA_SEXO'])){
$PNA_SEXO=$_POST['PNA_SEXO'];$atributos=$atributos.",PNA_SEXO=$PNA_SEXO";}else{}
if (!empty($_POST['PNA_FECHA_INICIAL'])){
$PNA_FECHA_INICIAL=$_POST['PNA_FECHA_INICIAL'];$atributos=$atributos.",PNA_FECHA_INICIAL='$PNA_FECHA_INICIAL'";}else{}
if (!empty($_POST['PNA_FECHA_FINAL'])){
$PNA_FECHA_FINAL=$_POST['PNA_FECHA_FINAL'];$atributos=$atributos.",PNA_FECHA_FINAL='$PNA_FECHA_FINAL'";}else{}

$atributos=$atributos." where PNA_CODIGO=$PNA_CODIGO LIMIT 1";
$insert="";
$insert=$insert.$atributos;
$query = mysql_query ($insert)or die(mysql_error());
?>
<body>
		<div id="div_centro_centro">
		
            <div id="div_centro_centro_texto">Pago Realizado Exitosamente.</div>
			<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../objeto_pagos.php" />
		
        </div>
</body>
</html>



