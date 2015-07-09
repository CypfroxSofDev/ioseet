<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Editar información</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'

	</div>

	<div class="turabox">

	<div id="tboxizqmin">
	
	<div id="content-header"><div id="header1"><div id="h1">Borrar</div></div></div>
	
	<div id="texto1">';
if(isset($_SESSION['id'])){
	if(isset($_SESSION['admin'])){
                $gc = mysql_query("SELECT * FROM `AfiliadosPremium` WHERE `idAnuncioPremium` ORDER BY `idAnuncioPremium` DESC") or die(mysql_error());
                while($n = mysql_fetch_array($gc)){
                echo'
				<div id="publicacion">
                <table>
                <div style="divisor">';
				echo"

				<td valign='top'><div id='bordep'><img src='../misc/publicidad/".$n['imagenAnuncio']."' width='120' height='80'></div></td>
				<td valign='top'>".$n['tituloAnuncio']."<br>".$n['descripcionAnuncio']."<br>
				<form method='POST' action='Admin/Funcion_borrarPublicidad.php?id=".$n['idAnuncioPremium']."'><input id='buttonborrar' type='submit' name='eliminar' value='Cancelar Anuncio'></form></td>
				</table>
				</div>";
                echo'
				</td></table>';
                    
		        }			
		}else{
		    echo'Error 504. Página no existente';
	}
		}else{
			echo'Error 504. Página no existente';
	}

	echo'</div></div>';

	require_once '../Plugins/publicidadREG.php';
	
	require_once '../Plugins/pie.php';

	echo'</div>';
	
	?>