<?php
require_once 'css/w3.php';

include("config/prop.php");

require_once 'css/direcion.php';

require_once 'css/fancy.php';

echo'<meta name="description" content="Ioseet es una manera de conectar negocios de cualquier parte del mundo con posibles clientes, ofreciendo la información necesaria de las diferentes empresas."/>';

echo'<title>Empresas en Ioseet</title>

</head>

<div class="arriba">';

require_once 'Plugins/arriba.php';

echo'</div>

<div class="turabox">';

include('Categorias/Funcion_negocios.php');

require_once 'Plugins/publicidadREG.php';

require_once 'Plugins/pie.php';

echo'</div>';

?>