<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Admin Panel</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
		</div>

		<div class="turabox">
		
		<div id="tboxizq">';
		
		require_once '../Admin/PublicidadA.php';
		
		echo'</div>';
		
		require_once '../Admin/minianuncios.php';
		
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