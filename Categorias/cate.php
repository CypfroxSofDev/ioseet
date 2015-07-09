<?php

require_once '../css/w3.php';

echo'<head>';

include("../config/prop.php");

require_once '../css/direcion.php';

echo'<title>Categorias en Ioseet</title>

</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

require_once '../Categorias/Funcion_cate.php';

require_once '../Plugins/publicidadROYAL.php';

require_once '../Plugins/pie.php';

echo'</div>';

?>