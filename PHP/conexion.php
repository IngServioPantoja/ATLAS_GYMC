<?php
  $conexion = mysql_connect("localhost", "root")or die("Problemas en la conexión con el servidor");
  mysql_select_db ("ATLAS", $conexion)or die("Problemas en la seleccion  de la Base de Datos");
?> 