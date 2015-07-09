<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo"<title>$tituloindex</title>";

echo'</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">
	<div id="tboxizqmin">
		<div id="content-header"><div id="header1"><div id="h1">Gracias Por Donar</div></div></div>
			<div id="backgroundindex">
						<table>
							<div id="divisor">
								<h7>Gracias Por Donar ayudas a crecer a nuestra empresa.</h7></div>
						</table>
							</div>
										<div id="content-header2"><div id="header2"><a href=@inicio>Volver al Inicio</div></div>
										
										
										</div>';
										require_once '../Plugins/publicidad.php';
										echo'</div>';
										require_once '../Plugins/pie.php';
?>

