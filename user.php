<?php

require_once 'css/w3.php';

echo'<head>';

include('config/prop.php');

require_once 'css/direcion.php';

require_once 'css/fancy.php';

echo'</head><body>

<div class="arriba">';

require_once 'Plugins/arriba.php';

echo'</div>

<div class="feedbox">';

require_once 'Plugins/miniarriba.php';

require_once 'Usuario/usuario.php';

require_once 'Plugins/pie.php';

echo'</body></div>';

?>
<script>
	function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
</script>



