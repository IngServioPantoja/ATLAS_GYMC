<?php
include 'conexion.php';
$copia=$_POST['copia'];
$lugar=dirname(__FILE__);
$lugar=str_replace("\\","/",$lugar);
$cadena = substr($lugar, 0, -3);
$cadena=$cadena."fotos/copiaseguridad/".$copia;
$borrao = mysql_query("truncate table personas");
$sql  = "LOAD DATA INFILE '$cadena' IGNORE INTO TABLE personas";
$result = mysql_query($sql);
?>
		<div id="div_centro_centro">
		
            <div id="div_centro_centro_texto">Base de datos cargada con exito.</div>
			<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../copiar.php" />
		
        </div>





