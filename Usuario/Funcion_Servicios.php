<?php			
				@$gn = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
				$n = mysql_fetch_array($gn);
				if($n['nick'] == "$nick"){  
				if($n['mute'] == "0"){  
				echo'
                <div id="muro"></div><div id="muroi"></div><div id="productosa"></div><div id="serviciosa"></div>
				<div id="texto1">
				
				<div class="spoiler"><input id="mbutton" type="button" onclick="showSpoiler(this);" value="Agregar Servicio" /><div class="inner" style="display:none;">
				
				<form action="Usuario/Publicar_Servicios.php" id="Servicios" method="POST">
					
				<table><br>
				
						
				<tr><td><input type="text" name="mTitulo" id="titulo_box" maxlength="45" value="Titulo"></td></tr>
						
				<tr><td><textarea name="mPubli" id="text_servicio_box" maxlength="500"></textarea></td></tr>
								
			    <tr><td><br><input id="button1" type="submit" name="servicio" value="Anunciar"></td></tr>
						
                </table></form>    
						
				</div></div></div>
				
				<div id="bbottom"></div>';
				}else{
	
				echo'						
				<div id="divisor3">¿No puedes publicar? La razón es porque estas silenciado por motivo de infringimientode los Términos de Uso y Condiciones. Esta situación se presentará temporalmente.</div>';
				}
				}
				require_once 'Categorias/paginacion.php';
				$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `Servicios` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idServicios` DESC");        
				$paging->ejecutar();  
				$gc = mysql_query("SELECT * FROM `Servicios` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idServicios`") or die(mysql_error());
				if(mysql_num_rows($gc) <= 0){
				echo'<div id="divisor3">No han agregado ningun servicio</div>';
				}else{
				while($c= $paging->fetchResultado()) {
						$gy = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$c['idEmpresa']."'") or die(mysql_error());
						$y = mysql_fetch_array($gy); 
						$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$y['idEmpresa']."'") or die(mysql_error());
						$d = mysql_fetch_array($diseno);
						$r = mysql_fetch_array($gc); 
                echo"	
                <div id='divisor'><table>
				
				<td valign='top'><a href=\"".$y['nick']."\"><img src='misc/fotosperfil/".$d['foto']."' id='fotoanuncio'></a>";
				if(isset($_SESSION['id'])){
				if($_SESSION['nick'] == "$nick"){
				echo'<form method="POST" action="Admin/Funcion_borrar_servicios.php?id='.$c['idServicios'].'"><br><input id="buttonborrar" type="submit" name="borrar" value="Borrar"></form>';
				}else{
				if(isset($_SESSION['admin'])){
				echo'<form method="POST" action="Admin/Funcion_borrar_servicios.php?id='.$c['idServicios'].'"><br><input id="buttonborrar" type="submit" name="eliminar" value="Spam"></form>';
						}
					}
				}
				
				
				echo"</td>
				<td valign='top'><div id='mtext'><h8>".$c['nombreServicio']."</h8>";
				
				echo"</div>";
				
                echo'<div id="publicacion">';echo mensionar($c['detallesServicio']);
				echo'
				</div>
				</td></table></div>
                <div id="bbottom"></div>';
				}
				echo '<center>';
				echo ' '.$paging->fetchNavegacion();
				echo '</center>';
				}
?>
<script type="text/javascript" src="css/js/jquery.form.js"></script>
<script>
$(document).ready(function()
{
    $('#Comentar').on('submit', function(e)
    {
        e.preventDefault();
        $('#publicar').attr('disabled', '');
        //show uploading message
        $("#muro").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#muro',
	   success:  afterSuccess
 
        });
    });
});
$(document).ready(function()
{
    $('#imgs').on('submit', function(d)
    {
        d.preventDefault();
        $('#publicars').attr('disabled', '');
        //show uploading message
        $("#muroi").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#muroi',
	   success:  afterSuccess
 
        });
    });
});
$(document).ready(function()
{
    $('#Servicios').on('submit', function(f)
    {
        f.preventDefault();
        $('#servicio').attr('disabled', '');
        //show uploading message
        $("#serviciosa").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#serviciosa',
	   success:  afterSuccess
 
        });
    });
});
function afterSuccess()
{
    $('#Comentar').resetForm();
    $('#publicar').removeAttr('disabled');
    $('#imgs').resetForm();
    $('#publicars').removeAttr('disabled');
	$('#Servicios').resetForm();
    $('#servicio').removeAttr('disabled');

}

</script>
