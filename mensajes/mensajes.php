<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

require_once '../css/fancy.php';

echo'<title>Novedades en Ioseet</title>

</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

require_once '../mensajes/Funcion_mensajes.php';

require_once '../mensajes/menumensajes.php';

require_once '../Plugins/pie.php';

echo'</div>';
?>