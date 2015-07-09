<?php

require_once 'css/w3.php';

echo'<head>';

require_once 'config/prop.php';

require_once 'css/direcion.php';

echo'<meta name="description" content="Ioseet es una manera de conectar negocios de cualquier parte del mundo con posibles clientes, ofreciendo la información necesaria de las diferentes empresas."/>';
echo'<title>Bienvenido a Ioseet</title>

</head>	

<div class="arriba">';

require_once 'Plugins/arriba.php';

echo'</div>



<div class="turabox">';

require_once 'Index/index.php';

echo'<div id="tboxderindex">';

require_once 'Plugins/login.php';

echo'</div>';

echo'<body bgcolor="#fafafa"></body>
<div class="pieindex">
<br>
<center><span style="padding:5px; font-size: 11px;"><a href="@info" id="piecolor">¿Que es Ioseet?</a> - <a href="@info-contacto" id="piecolor">Contacto</a> - <a href="@info-TMC" id="piecolor">Terminos y Condiciones</a> - Copyrigth To Ioseet TM 2013-2200.</span></center>
</div>
</html>
</div>';
?>


