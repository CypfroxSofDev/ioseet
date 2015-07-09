<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';
echo'<meta name="description" content="Ioseet es una manera de conectar negocios de cualquier parte del mundo con posibles clientes, ofreciendo la información necesaria de las diferentes empresas."/>';
require_once '../css/fancy.php';

echo'<title>Novedades en Ioseet</title>

</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

require_once '../Novedades/Funcion_novedades.php';



require_once '../Novedades/filtronov.php';

require_once '../Plugins/publicidadROYAL.php';


require_once '../Plugins/pie.php';

echo'</div>';
?>