<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Lista de recomendados</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
		</div>

		<div class="turabox">
		
		
		
		<div id="tboxizq">
		
		<div id="content-header"><div id="header1"><div id="h1">Lista de Sucursales </a></div></div></div>
		
		<div id="texto1">';
		
		require_once '../Usuario/Funcion_Listafans.php';
		
		echo'</div>';
		
		echo'</div>';
		
		require_once '../Plugins/publicidadREG.php';
		
		require_once '../Plugins/pie.php';

		echo'</div>';
?>