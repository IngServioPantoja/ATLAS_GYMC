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

function jsrealizar_copia() 
{
//Envio las variables nombre=Pepe, apellido= Grillo al archivo mi_php.php
var exito=0;
$.post("php/realizar_copia.php",{exito:exito},function(exito){
alert(""+exito);

});
};
function confirmar()
{
if(confirm('¿Desea Realmente cargar esta base de datos Don Orlando?'))
	{
		return true;
	}
	else{
		return false;
		}
}

</script>
<body>
<div>
  <table width="100%" height="100%" name='tabla_agregar_clientes' id='tabla_agregar_clientes'>
    <tr>
      <td height="331"><table width="100%">
          <tr>
            <td height="21" colspan="5"><p id='titulo_formulario_inscripcion'>Realizar copia de seguridad ATLAS GYM</p></td>
          </tr>
          <tr>
            <td colspan="2" valign="middle">
            
            <table width="100%" border="0" align="center">
  <tr>
    <td width="50%" align="center" valign="middle"><p id='subtexto_documento_registro'>¿Desea Realizar una copia de seguridad de su informacion?</p></td>
    <td width="50%" valign="middle">
    <form  method='post' name='formulario_agregar_clientes' target='internal'>
    <input name="realizar_copia" type="button" id='boton_realizar_copia' onClick="jsrealizar_copia()" value="Realizar copia" /></form>
    </td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>&nbsp;</p></td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle"><p id='subtexto_documento_registro'>Cargar Una Copia de seguridad</p></td>
    <td valign="middle">
    <?
$lugar=dirname(__FILE__);
$cadena=str_replace("\\","/",$lugar);
$cadena=$cadena."/fotos/copiaseguridad/";
    // Pon la ruta del directorio de donde listar los archivos desde el root
    $path = "$cadena";

    // Abrir la carpeta
    $dir_handle = @opendir($path) or die("Unable to open $path");
    // Leer los archivos
		$varo=0;
    while ($file = readdir($dir_handle)) {
		
    if($file == "." || $file == ".." || $file == "index.php" )

        {continue;}
        {
$archivos[$varo]=$file;

				}
		$varo=$varo+1;
    }

    // Cerrar
    closedir($dir_handle);
		$array=count($archivos);
		$array=$array-1;
		for($a=$array;$a>=0;$a--)
		{
		?>	
<form action="PHP/cargar_copia.php" method="post" onSubmit="return confirmar()">
          <table>
          	<tr>
            	<td>
              
              <input type="hidden" value="<?php echo $archivos[$a]; ?>" name="copia">
              </td>
              <td>
              <input type="submit" value="<?php echo $archivos[$a]; ?> Cargar">
              </td>
          	</tr>
          </table>
          
					</form>

		<?php
    }
?>
    </td>
  </tr>
  <tr>
    <td valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"></td>
    </tr>
</table>
            </td>
          </tr>
          </table>
      </td>
    </tr>
  </table>
  
  

</div>			 
</body>
</html>
