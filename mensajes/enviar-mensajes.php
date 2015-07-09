<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'<title>Enviar Mensaje en Ioseet</title>

</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox"><div id="tboxizq">';

require_once '../mensajes/Enviar_mensajes.php';

echo'</div>';

require_once '../Plugins/publicidadREG.php';

require_once '../Plugins/pie.php';

echo'</div>';
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="../css/js/jquery.form.js"></script>
<script>
$(document).ready(function()
{
    $('#EnviarM').on('submit', function(e)
    {
        e.preventDefault();
        $('#buttonEnviar').attr('disabled', '');
        $("#EM").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/></div>');
        $(this).ajaxSubmit({
        target: '#EM',
        success:  afterSuccess
        });
    });
});
 
function afterSuccess()
{
    $('#EnviarM').resetForm();
    $('#buttonEnviar').removeAttr('disabled');
}
</script>
</script>