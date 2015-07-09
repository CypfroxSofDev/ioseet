<?php
echo"<div id='tboxizqmin'>
<div id='content-header'>
<div id='header1'>
<div id='h1'>
<table>
<td valign='top'><img src='../misc/iconos/bullhorn.png'></td>
<td>Publicidad</td>
</table>
</div>
</div>
</div>";
$limit = 1;
$gt = mysql_query("SELECT * FROM `AnuncioPremium` WHERE `TipoPremium`='1' ORDER BY RAND()") or die(mysql_error());
while($n = mysql_fetch_array($gt) AND $limit <= 2){
$limit ++;
echo"<div id='bbottom'></div>
						<a href='".$n['link']."'><div id='divisorads'>
						<table>
						<td valign='top'><div id='bordep'><img src='misc/publicidad/".$n['imagenAnuncio']."' width='253' height='189'></div></td>
						<td valign='top'>".$n['tituloAnuncio']."<div id='textoadsnormal'>".$n['descripcionAnuncio']."</div></td>
						</table>
						</div></a>";
}
echo"</div>";
?>