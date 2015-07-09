<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Configuracion</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'
	</div>

	<div class="turabox">
	
	<div id="tboxizqmin">
	
	<div id="content-header"><div id="header1"><div id="h1">Configuracion</div></div></div>
	
	<div id="texto1">';

require_once '../config/Funcion_resetkey.php';

echo'
	</div>
	</div>';

require_once '../Plugins/publicidadREG.php';

require_once '../Plugins/pie.php';

echo'</div>';

?>