<?php
echo'<div id="tboxdermin"><div id="content-header"><div id="header1"><div id="h1">Mis anuncios</a></div></div></div>';
if(isset($_SESSION['id'])){
		$gb = mysql_query("SELECT * FROM `AfiliadosPremium` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
		$b = mysql_fetch_array($gb);
		$gc = mysql_query("SELECT * FROM `AnuncioPremium` WHERE `idAnuncioPremium`='".$b['idAnuncioPremium']."' ORDER BY `idAnuncioPremium` DESC") or die(mysql_error());
                while($n = mysql_fetch_array($gc)){
                echo"
						<div id='bbottom'></div>
						<a href='".$n['URL']."'><div id='divisorads'>
						<table>
						<td valign='top'><div id='bordep'><img src='misc/publicidad/".$n['imagenAnuncio']."' width='120' height='80'></div></td>
						<td valign='top'>".$n['tituloAnuncio']."<div style='color:#888;'>".$n['descripcionAnuncio']."</div>
						<form method='POST' action='Admin/Funcion_borrarPublicidad.php?id=".$n['idAnuncioPremium']."'><input id='buttonborrar' type='submit' name='borrar' value='Cancelar Anuncio'></form></td>
						</table>
						</div></a>";
				}
						}else{
						echo"<div id='divisor3'>Sin cuenta no podras ver tus anuncios</div>";
						}
						echo'</div>';
?>