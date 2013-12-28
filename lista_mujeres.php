<?php 
if (!empty($_POST['PNA_NOMBRE'])){$PNA_NOMBRE="%".$_POST['PNA_NOMBRE']."%";}else{$PNA_NOMBRE=NULL;}
if (!empty($_POST['PNA_APELLIDO'])){$PNA_APELLIDO="%".$_POST['PNA_APELLIDO']."%";}else{$PNA_APELLIDO=NULL;}
function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    $dias = array("","","","","","","");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "EN", "FB", "MZ", "AB", "MY", "JN", "JL", "AG", "SP", "OB", "NV", "DC");
    
    return $meses[$month]." ".$day." ".$year;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
<link rel="stylesheet" href="hojadeestilos.css">
<title>Sport Body Norte Admin Client</title>
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
<div id='completo'>
<?PHP
          if($PNA_NOMBRE!=NULL or $PNA_APELLIDO!=NULL)
            {        
                  include 'PHP/conexion.php';
				  $consulta = "select * from personas where (PNA_NOMBRE like '$PNA_NOMBRE' or PNA_APELLIDO like '$PNA_APELLIDO') AND PNA_SEXO=2 ORDER BY PNA_FECHA_FINAL ASC"or die(mysql_error());

                  $query = mysql_query ($consulta)or die(mysql_error());
                  echo ("<table align='center' id='tabla_fichas_contenedor' width='100%' height='100%'>");
                  $row=0;
                  $total_fichas=1;
                  while($fila = mysql_fetch_array($query)) 
                          { if($row==0){echo("<tr>");}   
                            echo("<td width='25%'>"); 
                            echo "<div id='div_ficha_clientes' style='background: url(".$fila['PNA_FOTO'].")no-repeat; background-size: 100% 100%;'><form id='form_ficha_clientes' action='mostrar_clientes_agregar_viejo.php' method='post' onclick='this.form.submit()'>";
                            echo ("<input type='submit' name='Submit' value='Aplicar' id='submit_ficha_clientes'/>");
                            echo "<p id='p_ficha_clientes'>".$fila['PNA_NOMBRE']." ".$fila['PNA_APELLIDO']."";
							echo "<br/>".fechaesp ($fila['PNA_FECHA_INICIAL'])." -- ".fechaesp ($fila['PNA_FECHA_FINAL']);
                            echo ("
                            <input name='PNA_CODIGO' type='hidden' value=".$fila["PNA_CODIGO"]." />
                            </p></form></div><br></td>");
                            $total_fichas_consulta=mysql_num_rows($query);
                            if($total_fichas==$total_fichas_consulta AND $total_fichas_consulta<3){
                            $tds=4-$total_fichas_consulta;
                            $i=0;
                            while($i<$tds)
                            {$i=$i+1;
                            echo("<td width='25%'></br></br></td>"); 
                            }
                            }
                            $row=$row+1;
                            $total_fichas=$total_fichas+1;
                            if($row==4){echo("</tr>");$row=0;}                   
                          }   
            }
          else
            {     
                  include 'PHP/conexion.php';

				  	  $consulta = "select * from personas WHERE PNA_SEXO=2  ORDER BY PNA_FECHA_FINAL asc"or die(mysql_error());

                  $query = mysql_query ($consulta)or die(mysql_error());
                  echo ("<table align='center' id='tabla_fichas_contenedor' width='100%' height='100%'>");
                  $row=0;
                  $total_fichas=1;
                  while($fila = mysql_fetch_array($query)) 
                          { if($row==0){echo("<tr>");}   
                            echo("<td width='25%'>"); 
                            echo "<div id='div_ficha_clientes' style='background: url(".$fila['PNA_FOTO'].")no-repeat; background-size: 100% 100%;'><form id='form_ficha_clientes' action='mostrar_clientes_agregar_viejo.php' method='post' onclick='this.form.submit()'>";
                            echo ("<input type='submit' name='Submit' value='Aplicar' id='submit_ficha_clientes'/>");
                            echo "<p id='p_ficha_clientes'>".$fila['PNA_NOMBRE']." ".$fila['PNA_APELLIDO']."";
							echo "<br/>".fechaesp ($fila['PNA_FECHA_INICIAL'])." -- ".fechaesp ($fila['PNA_FECHA_FINAL']);
                            echo ("
                            <input name='PNA_CODIGO' type='hidden' value=".$fila["PNA_CODIGO"]." />
                            </p></form></div><br></td>");
                            $total_fichas_consulta=mysql_num_rows($query);
                            if($total_fichas==$total_fichas_consulta AND $total_fichas_consulta<3){
                            $tds=4-$total_fichas_consulta;
                            $i=0;
                            while($i<$tds)
                            {$i=$i+1;
                            echo("<td width='25%'></br></br></td>"); 
                            }
                            }
                            $row=$row+1;
                            $total_fichas=$total_fichas+1;
                            if($row==4){echo("</tr>");$row=0;}                   
                          }    
            }   
          

	      ?>

</div>			 
</body>
</html>
