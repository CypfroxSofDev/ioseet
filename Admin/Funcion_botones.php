						<?php	
						if(isset($_SESSION['admin'])){
						echo'<div id="adminboxizqmin">
						<div id="divisor">';
						if($t['verificado'] == '0'){
                        echo'<table><td><form method="POST" action="Admin/verificado.php?nick='.$nick.'"><input id="button1" type="submit" name="verificado" value="Verificar"></form></td>';
						}else{
						echo'<table><td><form method="POST" action="Admin/verificado.php?nick='.$nick.'"><input id="button1" type="submit" name="noverificado" value="No Verificar"></form></td>';
						}
						if($chl['activo'] == '0'){
                        echo'<td><form method="POST" action="Admin/Funcion_bloquear.php?nick='.$nick.'"><input id="button1" type="submit" name="bloquear" value="Bloquear"></form></td>';
						}else{
						echo'<td><form method="POST" action="Admin/Funcion_bloquear.php?nick='.$nick.'"><input id="button1" type="submit" name="nobloquear" value="Desbloquear"></form></td>';
						}
						if($chl['mute'] == '0'){
						echo'<td><form method="POST" action="Admin/Funcion_silenciar.php?nick='.$nick.'"><input id="button1" type="submit" name="mute" value="Silenciar"></form></td></table>';
						}else{
						echo'<td><form method="POST" action="Admin/Funcion_silenciar.php?nick='.$nick.'"><input id="button1" type="submit" name="nomute" value="Desilenciar"></form></td></table>';
						}
						echo'</div></div>';
						}else{
						}
						?>