<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Modifica tu Portada</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
	  </div>

		<div class="turabox">

		<div id="tboxizqmin">';
		
		if(isset($_SESSION['id'])){
		
		echo'<div id="content-header"><div id="header1"><div id="h1"><a href="@editar">Portada&nbsp;&nbsp;&nbsp;<a href="@fondo">Fondo</a></div></div></div>
		
		<div id="texto1">

		<table>
		
		<form action="Diseno/Funcion_portada.php" id="FilepUploader" enctype="multipart/form-data" method="post">
		
		 <tr><td>
						<div class="custom-input-file">
						<input type="file" name="mFile">Imagen de portada
						<div class="files">Seleccionar archivo
						</div>
						</td></tr>
				
						<tr><td><textarea type="text" name="sobre" id="diseno_box" id="mName"  name="mName"/>Ioseet.com</textarea></td><tr>
		
		<tr><td><div id="content-header"><div id="header2"><button type="submit" id="tbutton" id="uploadmButton">Subir</button></div></div></td></tr>
		
		<div id="spacer"></div>
		
		</form>
		
		</table>

		</div>
		
		<div id="outputp"></div>';
		
				}else{
			
			echo'<div id="divisor3">Esta pagina no exite</div>';
		}
		
echo'</div>';	

		require_once '../Usuario/dmenu.php';

		require_once '../Plugins/pie.php';
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="../css/js/jquery.form.js"></script>
<script>
$(document).ready(function()
{
    $('#FilepUploader').on('submit', function(e)
    {
        e.preventDefault();
        $('#uploadpButton').attr('disabled', '');
        //show uploading message
        $("#outputp").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/></div>');
        $(this).ajaxSubmit({
        target: '#outputp',
        success:  afterSuccess
        });
    });
});
 
function afterSuccess()
{
    $('#FilepUploader').resetForm();
    $('#uploadpButton').removeAttr('disabled');
}
</script>