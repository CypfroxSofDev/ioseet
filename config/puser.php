<?php
if(isset($_SESSION['id'])){
	if(!isset($_POST['modify'])){
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
		$row = mysql_fetch_array($query);
		$a = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
		$user = mysql_fetch_array($a);
		echo '

		
		<form method="POST">
		
		<table>
		
		<tr><td><b>Nombre</b></td><td><input id="login" type="text" name="name" value="'.$row['nombre'].'" maxlength="30"></td></tr>
		
		<tr><td><b>Clave</b></td><td><input id="login" type="password" name="current" maxlength="50"></td></tr>
		
		<tr><td><b>Nueva Clave</b></td><td><input id="login" type="password" name="password" maxlength="70"></td></tr>
		
		<tr><td><b>Confirmar Clave</b></td><td><input id="login" type="password" name="cpassword" maxlength="50"></td></tr>
		
		<tr><td><b>E-mail</b></td><td><input id="login" type="text" name="email" value="'.$user['correo'].'"></td></tr>
		
		<tr><td></td><td><input id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
		
		</table></form>';
	}else{
		$a = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
		$user = mysql_fetch_array($a);
		$u = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
		$ser = mysql_fetch_array($u);
		$name = htmlspecialchars(mysql_real_escape_string($_POST['name']));
		$current = mysql_real_escape_string($_POST['current']);
		$pass = mysql_real_escape_string($_POST['password']);
		$cpass = mysql_real_escape_string($_POST['cpassword']);
		$email = mysql_real_escape_string($_POST['email']);
		
		if($current){
			if($user['password'] == hash('sha512',$current) || sha1($current) == $user['password']){
				if($pass != $cpass){
					echo "<div id='divisor3'>Las contraseñas no coinciden.</div>";
				}else{
					if(strlen($pass) < 6){
						echo "<div id='divisor3'>Tu nueva contraseña debe tener mas de 6 digitos.</div>";
					}elseif(strlen($pass) > 50){
						echo "<div id='divisor3'>Tu nueva contraseña debe de tener menos de 50 digitos.</div>";
					}else{
						$u = mysql_query("UPDATE `Login` SET `password`='".sha1($pass)."' WHERE `idLogin`='".$user['idLogin']."'") or die(mysql_error());
						
						echo "<div id='divisor'>Tus Cambios se han Guardado.</div>";
					}
				}
			}else{
				echo "<div id='divisor3'>La contraseña antigua esta mal digitada.</div>";
			}
			}elseif($name == ""){
			echo "<div id='divisor3'>Ingresa tu nuevo nombre porfavor.</div>";
		}elseif($email == ""){
			echo "<div id='divisor3'>Ingresa tu nuevo email porfavor.</div>";
		}else{
			@mysql_query("UPDATE `Empresa` SET `nombre`='".$name."' WHERE `idEmpresa`='".$ser['idEmpresa']."'") or die(mysql_error());
			@mysql_query("UPDATE `Login` SET `correo`='".$email."' WHERE `idLogin`='".$user['idLogin']."'") or die(mysql_error());
			echo "<div id='divisor3'>Tus Cambios se han Guardado.</div>";
		}
	}
}else{
	echo '
	<fieldset><legend><b>Error!</b></legend>
	<div id="divisor3">Conectate para Acceder a esta opcion.</div>
	</fieldset>
	';
}
?>
