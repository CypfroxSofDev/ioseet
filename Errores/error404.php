<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../css/direcion.php';

echo"<title>Error 404</title>";

echo'</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">

<div id="tboxizqmin">

<div id="content-header"><div id="header1"><div id="h1">Error 404</div></div></div>

	<div id="backgroundindex">
                <div id="divisor">
					<table>
						<div id="divisor"><h7>Has entrado en un archivo no existente. Error 404</h7></div>
							</table></div></div>
								<div id="content-header2"><div id="header2"><div id="h1"><a href=@inicio>Volver al Inicio</a></div></div></div></div></div>';
								echo'</div>';
								require_once '../Plugins/pie.php';
								

?>