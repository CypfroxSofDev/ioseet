<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'<title>Buscar</title>';

echo'</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

echo"<div id='tboxizqmin'>";
                        
    echo'

	<div id="content-header">
	
	<div id="header1">
	
	<div id="h1">
	
	<table>
	
	<td><a href=@negocios>Categorias</a></td>
	
	<td id="mobilebar"><form method="GET" action="@buscare"><input id="barrabuscarnovedades" type="text" name="categoria"></td>
	
    <td><input id="barrabtn" type="submit"  value="Buscar"></td></form></td></div>
	
    </table>
	
	</div></div></div>';

		                if($_GET['categoria']){

			            $Gremio = mysql_real_escape_string($_GET['categoria']);
												
                        $gi = mysql_query("SELECT * FROM `Gremio` WHERE `nombreGremio` LIKE '%".$Gremio."%' ORDER BY `idGremio`") or die(mysql_error());
			            while($i = mysql_fetch_array($gi)){ 
                        echo'
						<div id="divisor">
						
						<table>
					
						
						<td valign="top"><a href="@-'.$i['nombreGremio'].'"><h8>'.$i['nombreGremio'].'</h8></a></td></table></div>
						
						<div id="bbottom"></div>';
                        
					}  			  
			}
echo"</div>";

require_once '../Plugins/publicidadREG.php';

require_once '../Plugins/pie.php';

echo'</div>';
?>
