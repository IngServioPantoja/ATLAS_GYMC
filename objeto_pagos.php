<?php 
if (!empty($_POST['PNA_NOMBRE'])){$PNA_NOMBRE="%".$_POST['PNA_NOMBRE']."%";}else{$PNA_NOMBRE=NULL;}
if (!empty($_POST['PNA_APELLIDO'])){$PNA_APELLIDO="%".$_POST['PNA_APELLIDO']."%";}else{$PNA_APELLIDO=NULL;}
?>
<!DOCTYPE html>
<html lang="es" id='EXPRIMMENTO'>
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="hojadeestilos.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial;
	text-align: center;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
  <div name='div_consultar_clientes' id='div_consultar_clientes' >
    <form name="formulario_pagos" action="mostrar_clientes_agregar_viejo.php" method="post" target='internal_lista'><table width="100%" border="0" id='tabla_estatica'>
      <tr>
    <td width="38%" height="50"><spam id='titulo_formulario_inscripcion'>Consultar Hombres ATLAS GYM</spam></td>
    <td width="10%"><spam id='subtexto_documento_registro'>Nombres :</spam></td>
    <td width="20%"><input name='PNA_NOMBRE' type='text' onKeyUp='submit();' placeholder='Nombre'></td>
    <td width="12%">
    <spam id='subtexto_documento_registro'>Apellidos :</spam>
    </td>
    <td width="20%"><input type='text' name='PNA_APELLIDO' placeholder='Apellido' onKeyUp='submit();'></td>
  </tr>
</table>

</form>
        
        <table width="100%" border="0" id='internal_lista'>
          <tr>
            <td>
            
            <object type="text/html" name='internal_lista' data='mostrar_clientes_agregar_viejo.php'> </object></td>
          </tr>
        </table>
</table>
  </div>
			 
</body>
</html>
