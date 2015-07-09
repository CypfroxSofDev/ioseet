<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Editar Informacion</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
		</div>

		<div class="turabox">
		
		<div id="tboxizq">
		
		<div id="content-header"><div id="header1"><div id="h1">Contacto&nbsp;&nbsp;&nbsp;<a href="@editexto">Eslogan</a>&nbsp;&nbsp;&nbsp;<a href="@editstream">Streams</a>&nbsp;&nbsp;&nbsp;<a href="@edithorario">Horario</a>&nbsp;&nbsp;&nbsp;</div></div></div>
		
		<div id="texto1">';
		
		require_once '../Usuario/edit.php';
		
		echo'</div></div>';
		
		require_once '../Usuario/dmenu.php';
		
		require_once '../Plugins/publicidadREG.php';
		
		require_once '../Plugins/pie.php';

		echo'</div>';
?>