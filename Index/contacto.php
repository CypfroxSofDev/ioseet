<?php

require_once '../css/w3.php';

echo'<head>';

include('../config/prop.php');

require_once '../css/direcion.php';

require_once '../css/fancy.php';

echo'<title>Contacto e Informacion</title></head><body>

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

require_once '../Index/Funcion_contacto.php';

require_once '../Index/menucontacto.php';

require_once '../Plugins/pie.php';

echo'</body></div>';

?>


