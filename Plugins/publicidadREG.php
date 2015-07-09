<?php
echo"
<div id='tboxdermin'>
	<div id='content-header'><div id='header1'><div id='h1'>
				<table>
					<td><img src='../misc/iconos/bullhorn.png'></td>
						<td valign='top'>Publicidad<div id='date'><a href='@info-comprarpublicidad'>Comprar Ioseet Ads</a></td>
						</table>
						</div></div></div>
						";
						
						$limit = 1;
						$gt = mysql_query("SELECT * FROM `AnuncioPremium` WHERE `TipoPremium`='1' ORDER BY RAND()") or die(mysql_error());
						while($n = mysql_fetch_array($gt) AND $limit <= 5){
						$limit ++;
						echo"
						<div id='bbottom'></div>
						<a href='".$n['URL']."'><div id='divisorads'>
						<table>
						<td valign='top'><div id='bordep'><img src='misc/publicidad/".$n['imagenAnuncio']."' width='130' height='75'></div></td>
						<td valign='top'>".$n['tituloAnuncio']."<div id='textoadsnormal'>".$n['descripcionAnuncio']."</div></td>
						</table>
						</div></a>
						";
						}
	echo"</div>";
?>