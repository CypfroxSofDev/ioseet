<?php

				if(isset($_GET['nick'])){
				$nick = mysql_real_escape_string($_GET['nick']);    
				$gn = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				echo'
				
				<div id="content-header">
	
				<div id="header1">
	
				<div id="h1">Enviar Mensaje</div></div></div>
				
				<div id="texto1">
				
				
				<form action="mensajes/Funcion_enviar.php" id="EnviarM" method="POST">
					
				<table><br>
				
				<tr><td><input type="text" name="mEmisor" id="enviarmensaje_box_title" maxlength="45" value="Emisor"></td></tr>
				
				<tr><td><input type="text" name="mAsunto" id="enviarmensaje_box_title" maxlength="45" value="Asunto"></td></tr>
				
				<tr><td><input type="text" name="mCorreo" id="enviarmensaje_box_title" maxlength="45" value="E-mail"></td></tr>
						
				<tr><td><textarea name="mPubli" id="enviarmensaje_box_texto" maxlength="300"></textarea></td></tr>
				
				<tr><td><input type="text" name="mNick" id="enviarmensaje_box_id" maxlength="45" value="'.getID($nick).'"></td></tr>
								
			    <tr><td><br><input id="button1" type="submit" name="buttonEnviar" value="Enviar"></td></tr>
						
                </table></form>    
				<div id="EM"></div>
				</div>';
			}else{
						die('Este nick no existe');
				}
?>
