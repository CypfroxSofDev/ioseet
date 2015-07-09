<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'<title>Sube tu Logo</title>

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'
	</div>

	<div class="turabox">';
	
if(isset($_SESSION['id'])){

require_once '../Diseno/uinfo.php';

echo'
<div id="tboxizqmin">

<div id="content-header"><div id="header1"><div id="h1">Subir Logo</div></div></div>

<div id="texto1">
 
<table>

<form action="Diseno/Funcion_foto.php" id="FilemUploader" enctype="multipart/form-data" method="post">

						<tr><td>
						<div class="custom-input-file"><input type="file" name="mFile">Imagen de logo <div class="files">Seleccionar archivo
						</div>
						</td></tr>
				
						<tr><td><textarea type="text" name="sobre" id="diseno_box" id="mName"  name="mName"/>Ioseet.com</textarea></td><tr>

<tr><td><div id="content-header"><div id="header2"><button type="submit" id="tbutton" id="uploadmButton">Subir (10MB)</button></div></div></td></tr>

<div id="spacer"></div>

</form></table></div>';
				}else{
			
			echo'<div id="divisor3">Esta pagina no exite</div>';
		}
		
echo'</div>';	

require_once '../Plugins/pie.php';

echo'</div>';

?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="../css/js/jquery.form.js"></script>
<script>
$(document).ready(function()
{
    $('#FilemUploader').on('submit', function(e)
    {
        e.preventDefault();
        $('#uploadmButton').attr('disabled', '');
        //show uploading message
        $("#outputm").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/></div>');
        $(this).ajaxSubmit({
        target: '#outputm',
        success:  afterSuccess
        });
    });
});
 
function afterSuccess()
{
    $('#FilemUploader').resetForm();
    $('#uploadmButton').removeAttr('disabled');
}
</script>
