<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Recarga</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'

	</div>

	<div class="turabox">

	<div id="tboxizqmin">';
if($_SESSION['id']){ 
	if($_SESSION['admin']){ 
		 echo'
			<div id="content-header"><div id="header1"><div id="h1">Recargar IoseetPoints</a></div></div></div>
				<div id="divisor">
							<div id="PB"></div>
							
							<form action="Admin/Funcion_Points.php" id="FilepUploader" method="post">
							
							<table>

							<tr><td><input id="enviarmensaje_box_title" maxlength="45" type="text" name="mNick" value="Usuario"></td></tr>
							
							<tr><td><input id="enviarmensaje_box_title" maxlength="100" type="text" name="mPoints" value="1"></td></tr>
							
							<td><div id="divisor">Valor por 1Puntos es de $1.000 Pesos Colombianos</div><td>
							
							<tr><td><input id="tbutton" type="submit" name="uploadpButton" value="Cargar"></td></tr>
							
							</table>
							
							</form>
						
							</div>';
	}else{
		
		echo"<script  language='javascript'>window.location='@404'</script>";  
   
	}
	
}else{
		
	echo"<script  language='javascript'>window.location='@404'</script>";  
   
}

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
    $('#FilepUploader').on('submit', function(e)
    {
        e.preventDefault();
        $('#uploadpButton').attr('disabled', '');
        $("#PB").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/></div>');
        $(this).ajaxSubmit({
        target: '#PB',
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