<?php 
$PAG_FECHA_HOY=strtotime('now');
$PAG_FECHA_HOY=$PAG_FECHA_HOY-25200;
$PAG_FECHA_HOY=date('Y-m-d', $PAG_FECHA_HOY);
list( $ano, $mes, $dia ) = preg_split( '[-]', $PAG_FECHA_HOY);
$diadehoy=date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $ano)); 
$diacaducado=date("Y-m-d", mktime(0, 0, 0, $mes+1, $dia, $ano)); 

if (!empty($_FILES['PNA_FOTO_SUBIR']['name'])){$nameimagen = $_FILES['PNA_FOTO_SUBIR']['name'];}else{$nameimagen="";}
if (!empty($_FILES['PNA_FOTO_SUBIR']['tmp_name'])){$tmpimagen = $_FILES['PNA_FOTO_SUBIR']['tmp_name'];}else{$tmpimagen="";}
if (!empty($_GET['PNA_FOTO'])){$PNA_FOTO=$_GET['PNA_FOTO'];}else{$PNA_FOTO="IMAGENES/leon.png";}
$extimagen = pathinfo($nameimagen);
$ext = array("JPG","jpg","PNG","png","gif");
"nueva url ".$urlnueva = "fotos/".$nameimagen;


if(is_uploaded_file($tmpimagen)) {
		if (in_array($extimagen['extension'],$ext)) {
		copy ($tmpimagen,$urlnueva);
		$accionfoto="Se ha guardado correctamente";
		header("Location: mostrar_clientes_agregar.php?accionfoto=$accionfoto&PNA_FOTO=$urlnueva");
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
$(document).ready(function(){
<?php 
if($PNA_TIPO==2 or $PNA_TIPO==3)
{
?>
window.onload = document.getElementById("bloque_usuario_admin_encargado").style.display="table-row";
<?php	
}
else if($PNA_TIPO==4)
{
?>
window.onload = document.getElementById("bloque_usuario_admin_encargado").style.display="none";
<?php
}
?>
});

function validar_contraseñas()
{
var tipo= document.formulario_agregar_clientes.PNA_TIPO.value;	
if(tipo==2 || tipo==3){
var contraseña1= document.formulario_agregar_clientes.PNA_PASSWORD.value;	
var contraseña2= document.formulario_agregar_clientes.PNA_PASSWORD_REPITE.value;
if(contraseña1==contraseña2)
{
return true;
}
else
{
return false;
}
}
else if(tipo==4){
return true;
}
};

function mostrar_tipo_usuario() 
{
var tipo= document.formulario_agregar_clientes.PNA_TIPO.value;	
//Envio las variables nombre=Pepe, apellido= Grillo al archivo mi_php.php

if(tipo==2 || tipo==3){
document.getElementById("bloque_usuario_admin_encargado").style.display="table-row";
	}
else if(tipo==4){
document.getElementById("bloque_usuario_admin_encargado").style.display="none";
	}
};

function verificar_cedula() 
{
var cedula= document.formulario_agregar_clientes.PNA_DOC_IDENTIDAD.value;	
//Envio las variables nombre=Pepe, apellido= Grillo al archivo mi_php.php
$.post("validar_cedula.php",{cedula:cedula},function(respuesta){
if(respuesta==1){
	$('#identificacion_registro2').attr('id','identificacion_registro_error');
	var xd=$('#identificacion_registro_error').attr('name');
	$('#identificacion_registro_error').text("Numero de Identificacion ya registrado");
	document.getElementById( "identificacion_registro_error" ).focus();
	formulario_agregar_clientes.PNA_DOC_IDENTIDAD.style.border = "2px solid red";

	}
else{
	$('#identificacion_registro_error').attr('id','identificacion_registro2');
	var xd=$('#identificacion_registro2').attr('name');
	$('#identificacion_registro2').text("Maximo 20 digitos Cedula O T.I.");
	formulario_agregar_clientes.PNA_DOC_IDENTIDAD.style.border = "2px solid #00ff00";
	}

});
};
</script>
<body>
<div>
  <table width="100%" height="100%" name='tabla_agregar_clientes' id='tabla_agregar_clientes'>
    <tr>
      <td height="331"><table width="100%">
          <tr>
            <td height="21" colspan="5"><p id='titulo_formulario_inscripcion'>Formulario de inscripcion ATLAS GYM</p></td>
          </tr>
          <tr>
            <td colspan="2" valign="middle"><form  action='PHP/agregar_clientes_basedatos.php' method='post' name='formulario_agregar_clientes' target='internal'>
            <table width="100%" border="0" align="center">
  <tr>
    <td width="50%" valign="middle"><p id='subtexto_documento_registro'>Nombres :</p></td>
    <td width="50%" valign="middle"><input id='nombres_registro' name='PNA_NOMBRE' type=text placeholder='Nombres' maxlength='30' value='' required></td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Apellidos :</p></td>
    <td valign="middle"><input id='apellidos_registro' name='PNA_APELLIDO' type=text placeholder='Apellidos' maxlength='30' value='' required></td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Sexo :</p></td>
    <td valign="middle"><label id='subtexto_planes_registro'>
      <input name='PNA_SEXO' type='radio' value='1' checked='checked'/>
      Hombre</label>
      <label id='subtexto_planes_registro'>
        <input name='PNA_SEXO' type='radio' value='2'/>
      Mujer</label></td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Fecha Inicial :</p></td>
    <td valign="middle">
    <p id='subtexto_documento_registro'>Fecha Final :</p>
    </td>
  </tr>
  <tr>
    <td valign="middle"><input type="date" id='date_inscripcion' name='PNA_FECHA_INICIAL' value="<?php echo date($diadehoy); ?>"></td>
    <td valign="middle"><input type="date"  name='PNA_FECHA_FINAL' value="<?php echo date($diacaducado); ?>"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="hidden" name="PNA_FOTO" value="<?php echo $PNA_FOTO;?>" />
      <input type="submit" name="Submit2" id='boton-ingresar' value="Agregar" /></td>
    </tr>
</table>
            </form></td>
            <td width="47%" height="23" align='center'><form action="mostrar_clientes_agregar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div align="center">
                <table width="100%">
                  <tr>
                    <td> <p align="center"><input type="file" name='PNA_FOTO_SUBIR'/>
                      </p>                 </td>
                    </tr>
                  </table><br>
                <img src="<?php echo $PNA_FOTO;?>" width="190" height="190" /> <br>
                <input type="submit" name="Submit" value="Aplicar" id='boton-ingresar-peque' />
                </div>
            </form></td>
            
          </tr>
          </table>
      </td>
    </tr>
  </table>
  
  

</div>			 
</body>
</html>
