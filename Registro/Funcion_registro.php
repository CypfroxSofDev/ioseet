<?php
echo'
<div id="tboxizq">
<div id="content-header"><div id="header1"><div id="h1">Tienes un Negocio,Empresa o Mercado? - �Vamos! Reg�strate ya.</div></div></div>
<div id="texto1">';

if(isset($_SESSION['id'])){

				echo"<script  language='javascript'>window.location='".$_SESSION['nick']."'</script>"; 


}else{
	  if(!isset($_POST['register'])){
		echo '
		<form method="POST">
		<table>
		
		<tr><td><b>Usuario</b></td><td>
		<input id="registro" type="text" name="username" maxlength="20"><br><div style="font-size:10px">*Campo obligatorio, M�ximo de 15 Caracteres</div></td></tr>
		
		<tr><td><b>Correo</b></td><td>
		<input id="registro" type="text" name="correo" maxlength="50"><br><div style="font-size:10px">-Campo opcional, Lo necesitaras en el caso de restablecer tu contrase�a</div></td></tr>
		
		<tr><td><b>Contrase�a</b></td>
		<td><input id="registro" type="password" name="password" maxlength="70"><br><div style="font-size:10px">*Campo obligatorio, M�ximo de 80 Caracteres</div></td></tr>
		
		<tr><td><b>Confirmar</b></td>
		<td><input id="registro" type="password" name="cpassword" maxlength="70"><br><div style="font-size:10px">*Campo obligatorio, Confirma tu contrase�a</div></td></tr>
		
		<tr><td><b>Nombre</b></td><td>
		<input id="registro" type="text" name="name" maxlength="30"><br><div style="font-size:10px">*Campo obligatorio, Denomina el nombre de tu empresa(M�ximo de 50 Caracteres)</div></td></tr>
		
		<tr><td></td><td><div id="bbottom"></div>Si presionas "Registrarse", los <a href="@TMC">T�rminos de Uso y Condiciones</a> ser�n aceptados.</td></tr>
		
		<tr><td></td><td><input id="lbutton" type="submit" value="Registrarse" name="register">
		
		</table></left></form>';
	}else{
		$correo = mysql_real_escape_string($_POST['correo']);
		$password = mysql_real_escape_string($_POST['password']);
		$cpassword = mysql_real_escape_string($_POST['cpassword']);
        $username = mysql_real_escape_string($_POST['username']);
		$name = mysql_real_escape_string($_POST['name']);
        $cnombreu = mysql_real_escape_string($_POST['name']);
        $cnombre = ucwords($cnombreu);
        $date = date("m-d-y g:i A");
        $user = str_replace(" ",'',($username));
        $usera = str_replace("�",'n',($user));
		$userb = str_replace("�",'a',($usera));
		$userc = str_replace("�",'a',($userb));
		$userd = str_replace("�",'a',($userc));
		$usere = str_replace("�",'e',($userd));
		$userf = str_replace("�",'e',($usere));
		$userg = str_replace("�",'e',($userf));
		$userh = str_replace("�",'i',($userg));
		$useri = str_replace("�",'i',($userh));
		$userj = str_replace("�",'i',($useri));
		$userk = str_replace("�",'o',($userj));
		$userl = str_replace("�",'o',($userk));
		$userm = str_replace("�",'o',($userl));
		$usern = str_replace("�",'u',($userm));
		$usero = str_replace("�",'u',($usern));
		$userp = str_replace("�",'u',($usero));
		$userq = str_replace('"','',($userp));
                $userr = str_replace("�",'a',($userq));
                $users = str_replace("�",'a',($userr));
                $usert = str_replace("�",'a',($users));
                $useru = str_replace("�",'a',($usert));
                $userv = str_replace("�",'a',($useru));
                $userw = preg_replace("[^A-Za-z0-9]", "", $userv);
                
				
		$ucheck = mysql_query("SELECT * FROM `Login` WHERE `correo`='".$correo."'") or die(mysql_error());
		$ucheck1 = mysql_query("SELECT * FROM `Login` WHERE `nick`='".$userw."'") or die(mysql_error());
		if(mysql_num_rows($ucheck) >= 1){
			echo "<div id='divisor3'>Tu correo ya esta en uso, usa otro por favor.</div>";
		}elseif($username == ""){
			echo "<div id='divisor3'>Por favor, ingresa un nick de usuario sin la letra '�', sin espacios ni puntos</div>";
		}elseif(mysql_num_rows($ucheck1) >= 1){
			echo "<div id='divisor3'>Tu nombre de usuario ya se encuentra registrado, ingresa otro por favor.</div>";
		}elseif($password == ""){
			echo "<div id='divisor3'>Por favor, ingresa una contrase�a.</div>";
		}elseif($password != $cpassword){
			echo "<div id='divisor3'>Las contrase�as no coinciden</div>";
		}elseif($name == ""){
			echo "Por favor, ingresa el nombre para tu negocio</div>";
		}elseif(strlen($password) < 6){
			echo "<div id='divisor3'>La contrase�a tiene que ser entre 6 y 30 car�cteres</div> ";
		}elseif(strlen($password) > 30){
			echo "<div id='divisor3'>La contrase�a tiene que ser entre 6 y 30 car�cteres</div> ";
		}else{             
			@mysql_query("INSERT INTO `Login` (`correo`,`password`,`nick`) VALUES ('".$correo."','".sha1($password)."','".$userw."')") or die(mysql_error());
			$o = mysql_query("SELECT * FROM `Login` WHERE `idLogin` ORDER BY `idLogin` DESC") or die(mysql_error());
			$idlogin = mysql_fetch_array($o);
			@mysql_query("INSERT INTO `Empresa` (`idLogin`,`nombre`,`nick`) VALUES ('".$idlogin['idLogin']."','".$cnombre."','".$userw."')") or die(mysql_error());
			$i = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`  ORDER BY `idEmpresa` DESC") or die(mysql_error());
			$idempresa = mysql_fetch_array($i);
			@mysql_query("INSERT INTO `DisenoFD` (`idEmpresa`) VALUES ('".$idempresa['idEmpresa']."')") or die(mysql_error());
			@mysql_query("INSERT INTO `URL` (`idEmpresa`) VALUES ('".$idempresa['idEmpresa']."')") or die(mysql_error());
			@mysql_query("INSERT INTO `StreamRadio` (`idEmpresa`) VALUES ('".$idempresa['idEmpresa']."')") or die(mysql_error());
			@mysql_query("INSERT INTO `Ubicacion` (`idEmpresa`,`idCiudad`) VALUES ('".$idempresa['idEmpresa']."','1')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','1')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','2')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','3')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','4')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','5')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','6')") or die(mysql_error());
			@mysql_query("INSERT INTO `HorarioAtencion` (`idEmpresa`,`idDiaSemana`) VALUES ('".$idempresa['idEmpresa']."','7')") or die(mysql_error());
			
                        echo'
												<div id="divisor3">Tu cuenta se a creado satisfactoriamente. Gracias por registrarte<br>
												No necesitas confirmar tu correo, la �nica confirmaci�n que se requiere es que ingreses desde el <a style="color:#fff" href="@inicio">menu Conectar.</a> Que se encuentra ubicado en parte derecha de la plataforma.</div>';
		}
	}
}
?>	
</div>
</div>