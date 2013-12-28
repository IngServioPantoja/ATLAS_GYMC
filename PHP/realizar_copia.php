<?php
include 'conexion.php';
$lugar=dirname(__FILE__);
$lugar=str_replace("\\","/",$lugar);
$cadena = substr($lugar, 0, -3);
$cadena=$cadena."fotos/copiaseguridad/";
$archivo = $cadena.'Atlas-'.date('Y-m-d-h-m-s').'.sql';
$sql  = "SELECT * INTO OUTFILE '$archivo' FROM personas";
$result = mysql_query($sql);
echo "Copia de Seguridad realizada";
?>





