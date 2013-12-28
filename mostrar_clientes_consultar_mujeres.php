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
    <form name="formulario_pagos" action="lista_mujeres.php" method="post" target='internal_lista'><table width="100%" border="0" id='tabla_estatica'>
      <tr>
    <td width="38%" height="50"><p id='titulo_formulario_inscripcion'>Consultar Mujeres ATLAS GYM</p></td>
    <td width="10%"><p id='subtexto_documento_registro'>Nombres :</p></td>
    <td width="20%"><input type='text' name='PNA_NOMBRE' placeholder='Nombre'  onKeyUp='submit();'></td>
    <td width="12%">
    <p id='subtexto_documento_registro'>Apellidos :</p>
    </td>
    <td width="20%"><input type='text' name='PNA_APELLIDO' placeholder='Apellido' onKeyUp='submit();'></td>
  </tr>
</table>

</form>
        
        <table width="100%" border="0" id='internal_lista'>
          <tr>
            <td>
            
            <object type="text/html" name='internal_lista' data='lista_mujeres.php'> </object></td>
          </tr>
        </table>
</table>
  </div>
			 
</body>
</html>
