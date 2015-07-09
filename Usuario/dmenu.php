<?php
echo'<div id="tboxder">';
	if(isset($_SESSION['id'])){
$v = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
$r = mysql_fetch_array($v);
 echo'<div id="content-header"><div id="header1"><div id="h1">Estilo | <a href="'.$r['nick'].'">Volver</a></div></div></div> 
 <div id="minheader"><table><td><img src="misc/iconos/image.png"></td><td valign="top"><a href="@foto">Subir foto</a></td></table></div>                         
 <div id="minheader"><table><td><img src="misc/iconos/fondo.png"></td><td valign="top"><a href="@fondo">Subir fondo</a></td></table></div>
 <div id="minheader"><table><td><img src="misc/iconos/portada.png"></td><td valign="top"><a href="@portada">Subir portada</a></td></table></div>
 <div id="minheader"><table><td><img src="misc/iconos/configu.png"></td><td valign="top"><a href="@panel">Configuracion</a></td></table></div>'; 
}else{
			echo'<div id="divisor3">Esta pagina no exite</div>';
}
echo"</div>";
?>