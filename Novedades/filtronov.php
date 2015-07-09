<?php
echo'<div id="tboxdermin">';
echo'<div id="content-header"><div id="header1"><div id="h1">Filtros</div></div></div>';

echo'
<div id="texto1">
<div class="spoiler"><input id="mbutton" type="button" onclick="showSpoiler(this);" value="Expandir/Reducir" />
<div class="inner" style="display:none;"><div id="filtro">';
$gn = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio` ORDER BY `idGremio` ASC") or die(mysql_error());
	      while($n = mysql_fetch_array($gn)){
              echo'
			  <div id="divisor">
			  <a href="@novedades-'.$n['nombreGremio'].'">'.$n['nombreGremio'].'</a></div>
              <div id="bbottom"></div>';
		}
		
echo'
</div>
</div>
</div>
</div>
</div>';
?>
