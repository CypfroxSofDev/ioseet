<?php

require_once '../css/w3.php';

echo'<head>';

include('../config/prop.php');

require_once '../css/direcion.php';

require_once '../css/fancy.php';

echo'<title>Perdi mi contraseña</title></head><body>

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

require_once '../config/Funcion_lostkey.php';

require_once '../Plugins/publicidadREG.php';

require_once '../Plugins/pie.php';

echo'</body></div>';

?>