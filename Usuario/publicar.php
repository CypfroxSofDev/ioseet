<?php 

if($_SESSION['idEmpresa'] == getID($nick)){

if($n['mute'] == "0"){  

	$gn = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['id']."'") or die(mysql_error());
	$n = mysql_fetch_array($gn); 
	echo'
	<div id="tboxdermin">';
	echo'<div id="content-header"><div id="header1"><div id="h1">Anunciar</div></div></div>';
				
				echo'
						
						<div id="texto1">
						
						<div class="spoiler"><input id="mbutton" type="button" onclick="showSpoiler(this);" value="Publicar" /><div class="inner" style="display:none;">
						
                        <form action="Usuario/Publicar_Imagen.php" id="imgs" enctype="multipart/form-data" method="post">
						
			            <table>
                        <br> 
						
			            <tr><td><textarea name="mPubli" id="text_anunciar_box" maxlength="300"></textarea></td></tr>
						
						<tr><td>
						<div class="custom-input-file">
						<input type="file" name="mFile">Imagen a publicar
						<div class="files">Seleccionar archivo
						</div>
						</td></tr>
						
			            <tr><td><input id="button1" type="submit" name="publicars" value="Anunciar"></td></tr>		
						
                        </table></form>
						
						</div></div></div>
						</div>';
						
						
					}else{
	
						echo'
						<div id="tboxdermin">
						
						<div id="texto1">¿No puedes publicar? La razón es porque estas silenciado por motivo de infracción de los Términos de Uso y Condiciones. Esta situación se presentará temporalmente.</div></div>';
					}
		}else{
   
	}
	
?>