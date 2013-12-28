<?php 
include 'PHP/conexion.php';
if (!empty($_POST['PNA_NOMBRE'])){$PNA_NOMBRE=$_POST['PNA_NOMBRE']."%";}else{$PNA_NOMBRE=NULL;}
if (!empty($_POST['PNA_APELLIDO'])){$PNA_APELLIDO=$_POST['PNA_APELLIDO']."%";}else{$PNA_APELLIDO=NULL;}


$PAG_FECHA_HOY=strtotime('now');
$PAG_FECHA_HOY=$PAG_FECHA_HOY-25200;
$PNA_INICIAL="select * from personas where PNA_ORDEN=1";
$query_pna_final = mysql_query ($PNA_INICIAL)or die(mysql_error());
$fila_pna_final=mysql_fetch_array($query_pna_final, MYSQL_ASSOC);
$PNA_INICIAL=$fila_pna_final['PNA_CODIGO'];

$consultar_cantidad="select count(pna_codigo) AS CANTIDAD from PERSONAS";
$query_consultar_cantidad = mysql_query ($consultar_cantidad)or die(mysql_error());
$Fila_cantidad=mysql_fetch_array($query_consultar_cantidad, MYSQL_ASSOC);	
$Total_consultar_cantidad=$Fila_cantidad["CANTIDAD"];
$select_ultimo="select * from personas where PNA_ORDEN=$Total_consultar_cantidad";
$query_ultimo = mysql_query ($select_ultimo)or die(mysql_error());
$fila_ultimo=mysql_fetch_array($query_ultimo, MYSQL_ASSOC);
$PNA_FINAL=$fila_ultimo['PNA_CODIGO'];

if($Total_consultar_cantidad==0)
{
header("Location: \atlas_gym/mostrar_clientes_agregar.php");

}

$PAG_FECHA_HOY=date('Y-m-d', $PAG_FECHA_HOY);
if (!empty($_POST['PNA_CODIGO']))
{
$PNA_CODIGO=$_POST['PNA_CODIGO'];
}
else if (!empty($_GET['PNA_CODIGO']))
{
$PNA_CODIGO=$_GET['PNA_CODIGO'];
}
else
{
$Total=0;
$PNA_CODIGO=0;
$conta=0;
while ($Total==0)
{
if (!empty($_POST['PNA_NOMBRE']) or !empty($_POST['PNA_APELLIDO']))
{
$select="select * from personas where (PNA_NOMBRE like '$PNA_NOMBRE' or PNA_APELLIDO like '$PNA_APELLIDO') LIMIT 1";
}
else
{
$select="select * from personas where PNA_FECHA_FINAL='$PAG_FECHA_HOY' order by PNA_FECHA_FINAL DESC LIMIT 1";
}
list( $ano, $mes, $dia ) = preg_split( '[-]', $PAG_FECHA_HOY);
$PAG_FECHA_HOY=date("Y-m-d", mktime(0, 0, 0, $mes, $dia-1, $ano)); 
$query = mysql_query ($select)or die(mysql_error());
$fila=mysql_fetch_array($query, MYSQL_ASSOC);
$Total=mysql_num_rows($query);	
if($Total>0)
{
$PNA_CODIGO=$fila["PNA_CODIGO"];
}
$conta=$conta+1;
if($conta==120)
{
$select_interno="select * from personas where PNA_ORDEN=$Total_consultar_cantidad";
$query_interno = mysql_query ($select_interno)or die(mysql_error());
$fila_interno=mysql_fetch_array($query_interno, MYSQL_ASSOC);
$Total=1;
$PNA_CODIGO=$fila_interno["PNA_CODIGO"];
break;
}

}
}



$select_2="select * from personas where PNA_CODIGO=$PNA_CODIGO";
$query_2 = mysql_query ($select_2)or die(mysql_error());
$fila_2=mysql_fetch_array($query_2, MYSQL_ASSOC);
$PNA_FOTO=$fila_2["PNA_FOTO"];
$PNA_NOMBRE=$fila_2["PNA_NOMBRE"];
$PNA_APELLIDO=$fila_2["PNA_APELLIDO"];
$PNA_SEXO=$fila_2["PNA_SEXO"];
$PNA_FECHA_INICIAL=$fila_2["PNA_FECHA_INICIAL"];
$PNA_FECHA_FINAL=$fila_2["PNA_FECHA_FINAL"];
$PNA_ORDEN=$fila_2["PNA_ORDEN"];

//CODIGO PARA ENCONTRAR LA SIGUIENTE
$select_siguiente="select * from personas where PNA_ORDEN=$PNA_ORDEN+1";
$query_siguiente = mysql_query ($select_siguiente)or die(mysql_error());
$fila_siguiente=mysql_fetch_array($query_siguiente, MYSQL_ASSOC);
$Total_siguiente=mysql_num_rows($query_siguiente);	
if($Total_siguiente==0)
{
$select_siguiente_inicio="select * from personas where PNA_ORDEN=1";
$query_siguiente_inicio = mysql_query ($select_siguiente_inicio)or die(mysql_error());
$fila_siguiente_inicio=mysql_fetch_array($query_siguiente_inicio, MYSQL_ASSOC);
$PNA_CODIGO_SIGUIENTE=$fila_siguiente_inicio["PNA_CODIGO"];
}
else
{
$PNA_CODIGO_SIGUIENTE=$fila_siguiente["PNA_CODIGO"];
}

$select_anterior="select * from personas where PNA_ORDEN=$PNA_ORDEN-1";
$query_anterior = mysql_query ($select_anterior)or die(mysql_error());
$fila_anterior=mysql_fetch_array($query_anterior, MYSQL_ASSOC);
$Total_anterior=mysql_num_rows($query_anterior);	
if($Total_anterior==0)
{
$select_anterior_inicio="select * from personas where PNA_ORDEN=$Total_consultar_cantidad";
$query_anterior_inicio = mysql_query ($select_anterior_inicio)or die(mysql_error());
$fila_anterior_inicio=mysql_fetch_array($query_anterior_inicio, MYSQL_ASSOC);
$PNA_CODIGO_ANTERIOR=$fila_anterior_inicio["PNA_CODIGO"];
}
else
{
$PNA_CODIGO_ANTERIOR=$fila_anterior["PNA_CODIGO"];
}




if (!empty($_FILES['PNA_FOTO']['name'])){$nameimagen = $_FILES['PNA_FOTO']['name'];}else{$nameimagen="";}
if (!empty($_FILES['PNA_FOTO']['tmp_name'])){$tmpimagen = $_FILES['PNA_FOTO']['tmp_name'];}else{$tmpimagen="";}
if (!empty($_GET['PNA_FOTO'])){$PNA_FOTO=$_GET['PNA_FOTO'];}else{$PNA_FOTO=$fila_2["PNA_FOTO"];}
$extimagen = pathinfo($nameimagen);
$ext = array("png","gif","jpg");
$urlnueva = "fotos/".$nameimagen;


if(is_uploaded_file($tmpimagen)) {
		if (in_array($extimagen['extension'],$ext)) {
		copy ($tmpimagen,$urlnueva);
		$accionfoto="Se ha guardado correctamente";
		header("Location: mostrar_clientes_agregar_viejo.php?accionfoto=$accionfoto&PNA_FOTO=$urlnueva&PNA_CODIGO=$PNA_CODIGO");
		} else {
		$accionfoto="ERROR: solo imagenes con formato png,gif,jpg)";
		}
	}else {
		if (!empty($_GET['accionfoto'])){$accionfoto=$_GET['accionfoto'];}else{$accionfoto="Elija una imagen";}
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="hojadeestilos.css">
<style type="text/css">
#tabla_agregar_clientes tr td table tr td {
	text-align: center;
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
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
#tabla_agregar_clientes tr td table tr td form table {
	text-align: left;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script src='http://code.jquery.com/jquery-1.7.2.min.js'></script>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script src="js/jquery.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript">

function preguntar()
{
	
if(confirm('¿Desea eliminar permanentemente este registro?')){
var CODIGO= document.formulario_pagos.A_BORAR.value;

$.ajax({
 url : 'PHP/borrar_clientes_basedatos.php',
 data : { PNA_CODIGO : CODIGO },
 type : 'POST',
 success : function() {
   // called after the ajax has returned successful response
   document.location.href = document.location.href; // alerts the response
 }
});


	
}else{
return false;
}

}

</script>
<body>
<div>
  <table width="100%" height="100%" name='tabla_agregar_clientes' id='tabla_agregar_clientes'>
    <tr>
    <td width="3%" height="183" >&nbsp;</td>
    <td width="3%" height="183">&nbsp;</td>
      <td width="88%" height="331" rowspan="3"><table width="100%">
          <tr>
          
            <td height="21" colspan="9"><p id='titulo_formulario_inscripcion'>Formulario de inscripcion ATLAS GYM &nbsp;&nbsp;&nbsp;&nbsp;Registro <?php echo $PNA_ORDEN; ?> de  : <?php echo $Total_consultar_cantidad; ?></p></td>
          </tr>
          <tr>
            <td colspan="2" valign="middle"><form  action='PHP/editar_clientes_basedatos.php' method='post' name='formulario_pagos' target='internal'>
            <table width="100%" border="0" align="center">
  <tr>
    <td width="50%" valign="middle"><p id='subtexto_documento_registro'>Nombres :</p></td>
    <td width="50%" valign="middle">
    <input id='nombres_registro' name='PNA_NOMBRE' type=text placeholder='Nombres' maxlength='30' value='<?php echo $PNA_NOMBRE;?>' required></td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Apellidos :</p></td>
    <td valign="middle">
    <input id='apellidos_registro' name='PNA_APELLIDO' type=text placeholder='Apellidos' maxlength='30' value='<?php echo $PNA_APELLIDO;?>' required></td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Sexo :</p></td>
    <td valign="middle">
      <?php if($PNA_SEXO==1)
	  {	  ?>
		  <label id='subtexto_planes_registro'>
		  <input name='PNA_SEXO' type='radio' value='1' checked='checked'/>
      Hombre</label>
      <label id='subtexto_planes_registro'>
        <input name='PNA_SEXO' type='radio' value='2'/>
      Mujer</label>
      
      <?PHP
	  }
	  else
	  {
	  ?>
      <label id='subtexto_planes_registro'>
		  <input name='PNA_SEXO' type='radio' value='1'/>
      Hombre</label>
      <label id='subtexto_planes_registro'>
        <input name='PNA_SEXO' type='radio' value='2' checked/>
      Mujer</label>
      <?php
      }
      ?>
      </td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Fecha Inicial :</p></td>
    <td valign="middle">
    <p id='subtexto_documento_registro'>Fecha Final :</p>
    </td>
  </tr>
  <tr>
    <td valign="middle"><input type="date" id='date_inscripcion' name='PNA_FECHA_INICIAL' value="<?php echo date($PNA_FECHA_INICIAL); ?>"></td>
    <td valign="middle"><input type="date"  name='PNA_FECHA_FINAL' value="<?php echo date($PNA_FECHA_FINAL); ?>"></td>
  </tr>
  <tr>
    <td><input type="hidden" name="PNA_FOTO" value="<?php echo $PNA_FOTO;?>" />
      
      <input type="hidden" value="<?PHP echo $PNA_CODIGO; ?>" name="A_BORAR">
      
      <input type="submit" name="pagar" id="boton-ingresar" value="Pagar" /></td>
    <td>
    <input name="eliminar" type="button" id='boton-ingresar' onClick="preguntar()" value="Eliminar" />
    </td>
    </tr>
</table>
            </form></td>
            <td width="47%" height="23" align='center'><form action="mostrar_clientes_agregar_viejo.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div align="center">
                <table width="100%">
                  <tr>
                    <td> <p align="center"><input type="file" name='PNA_FOTO'/>
                      </p>                 </td>
                    </tr>
                  </table><br>
                <img src="<?php echo $PNA_FOTO;?>" width="190" height="190" /> <br>
                <input type="submit" name="Submit" value="Aplicar" id='boton-ingresar-peque' />
                <input type="hidden" value="<?PHP echo $PNA_CODIGO; ?>" name="PNA_CODIGO">
<input type="hidden" value="<?PHP echo $PNA_CODIGO; ?>" name="PNA_CODIGO">
                </div>
            </form></td>
            
          </tr>
          </table>
      </td>
      <td width="3%" >&nbsp;</td>
      <td width="3%" >&nbsp;</td>
    </tr>
    <tr>
      <td width="3%" height="10%" >
      <form action="mostrar_clientes_agregar_viejo.php" method="post">
<input type="submit" value="<<" id="flechas">
<input type="hidden" value="<?PHP echo $PNA_INICIAL; ?>" name="PNA_CODIGO">
</form>
      </td>
      <td id='extremos' height="10%">
<form action="mostrar_clientes_agregar_viejo.php" method="post">
<input type="submit" value="<" id="flechas">
<input type="hidden" value="<?PHP echo $PNA_CODIGO_ANTERIOR; ?>" name="PNA_CODIGO">
</form>
      </td>
      <td width="3%" >
<form action="mostrar_clientes_agregar_viejo.php" method="post">
<input type="submit" value=">" id="flechas">
<input type="hidden" value="<?PHP echo $PNA_CODIGO_SIGUIENTE; ?>" name="PNA_CODIGO">
</form>
      </td>
      <td width="3%">
      <form action="mostrar_clientes_agregar_viejo.php" method="post">
<input type="submit" value=">>" id="flechas">
<input type="hidden" value="<?PHP echo $PNA_FINAL; ?>" name="PNA_CODIGO">
</form>
      </td>
    </tr>
    <tr>
      <td width="3%" height="45%">&nbsp;</td>
      <td height="45%">&nbsp;</td>
      <td width="3%" >&nbsp;</td>
      <td width="3%" >&nbsp;</td>
    </tr>
  </table>
  
  

</div>			 
</body>
</html>
