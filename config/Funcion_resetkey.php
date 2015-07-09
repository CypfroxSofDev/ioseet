<?php 
if($_GET['key']){
if($_GET['user']){
$key = mysql_real_escape_string($_GET['key']);
$nick = mysql_real_escape_string($_GET['user']);
$gp = mysql_query("SELECT `password` FROM `Login` WHERE `nick`='".$_GET['user']."'") or die(mysql_error());
	$p = mysql_fetch_array($gp);

if($_GET['key'] == $p['password']){
	if(!isset($_POST['modify'])){
echo'
		<form method="POST">
		
		<table>
		<tr><td><b>Nueva Clave</b></td><td><input id="login" type="password" name="password" maxlength="70"></td></tr>
		
		<tr><td><b>Confirmar Clave</b></td><td><input id="login" type="password" name="cpassword" maxlength="50"></td></tr>
		
		<tr><td></td><td><input id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
		</table></form>
		';
		}else{
		$pass = mysql_real_escape_string($_POST['password']);
		$cpass = mysql_real_escape_string($_POST['cpassword']);
						if($pass != $cpass){
					echo "<div id='divisor3'>Las contraseñas no coinciden.</div>";
				}else{
					if(strlen($pass) < 6){
						echo "<div id='divisor3'>Tu nueva contraseña debe tener mas de 6 digitos.</div>";
					}elseif(strlen($pass) > 50){
						echo "<div id='divisor3'>Tu nueva contraseña debe de tener menos de 50 digitos.</div>";
					}else{
						$u = mysql_query("UPDATE `login` SET `password`='".sha1($pass)."' WHERE `nick`='".$nick."'AND `password`='".$key."'") or die(mysql_error());
						
						echo "<div id='divisor'>Tus Cambios se han Guardado.</div>";
					}
				}
		}
		}else{
		echo"<div id='divisor3'>Enlase no existente.</div>";
		}
	}
}
?>