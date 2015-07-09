<?php
echo"
<div id='tboxdermin'>
	<div id='content-header'><div id='header1'><div id='h1'>
				<table>
					<td><img src='../misc/iconos/bullhorn.png'></td>
						<td valign='top'>Publicidad<div id='date'><a href='@info-comprarpublicidad'>Comprar Ioseet Ads</a></td>
						</table>
						</div></div></div>";
						
						$limit = 1;
						$gt = mysql_query("SELECT * FROM `AnuncioPremium` WHERE `TipoPremium`='3' ORDER BY RAND()") or die(mysql_error());
						while($n = mysql_fetch_array($gt) AND $limit <= 5){
						$limit ++;
						echo"
						<a href='".$n['URL']."'><div id='divisoradsroyal'>
						<table>
						<td><img src='misc/publicidad/".$n['imagenAnuncio']."' width='100%' height='153'></div>".$n['tituloAnuncio']."<br>
						<div id='textoads'>".$n['descripcionAnuncio']."</div></td>
						</table>
						</div></a>
						<div id='bbottom'></div><br>
						<div id='bbottom'></div>";
						}
	echo"</div>";
?>