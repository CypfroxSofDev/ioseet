<?php
echo'<div id="tboxder"><center>';
	if(isset($_SESSION['id'])){	
		}else{
		echo'<div id="content-header"><div id="header1"><div id="h1">Conectar</div></div></div>';
		if(!isset($_POST['login'])){  
                 echo '
		<form method="POST">
                <table>
        <tr><td><b>Correo o Usuario</b></tr><tr><td><input id="login" type="text" name="username" maxlength="50"></td><tr>
        <tr><td><b>Clave</b></td></tr><tr><td><input id="login" type="password" name="password" maxlength="70"></td></tr>
        <tr><td><b>&nbsp;</b></td></tr>
		<tr><td><b></b></td></tr>
		<tr><td><input id="lbutton" type="submit" name="login" value="Entrar">&nbsp;<a href="@registrarse"><input id="lbutton" type="button" value="Registrarse"></a></td></tr>
		<tr><td><b><a href="@lostkey">Perdistes tu clave?</a></b></td></tr>
		</table></form><br><br></center>';

	}else{
		$u = mysql_real_escape_string($_POST['username']);
		$p = mysql_real_escape_string($_POST['password']);
		$s = mysql_query("SELECT * FROM `Login` WHERE `correo`='".$u."' OR `nick`='".$u."'") or die(mysql_error());
		$i = mysql_fetch_array($s);
	  if($i['activo'] == "1") {
		echo"<script languaje='javascript'>alert('Tu cuenta fue bloqueada Por infringir los Terminos y Condiciones.')</script>
			 <script  language='javascript'>window.location='@inicio'</script>";  
												
		}elseif($i['password'] == hash('sha512',$p) || sha1($p) == $i['password']){
		
			$user = mysql_query("SELECT * FROM `Login` WHERE `correo`='".$i['correo']."' AND `password`='".$i['password']."'  AND `activo`='0'") or die(mysql_error());
			$auser = mysql_fetch_array($user);
			$o = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$auser['idLogin']."'") or die(mysql_error());
			$a = mysql_fetch_array($o);
			$_SESSION['id'] = $auser['idLogin'];
			$_SESSION['nick'] = $auser['nick'];
			$_SESSION['idEmpresa'] = $a['idEmpresa'];
			$_SESSION['idGremio'] = $a['idGremio'];
			if($auser['idPerfil'] == "2"){
				$_SESSION['admin'] = $auser['idPerfil'];
			}
			$name = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$auser['idLogin']."'") or die(mysql_error());
			$pname = mysql_fetch_array($name);
			if($pname['nombre'] == NULL){
				$_SESSION['pname'] = NULL;
			}else{
				$_SESSION['pname'] = $pname['nombre'];
			}


			echo"<script  language='javascript'>window.location='".$auser['nick']."'</script>";  

		  
		  }else{
                        echo"<script languaje='javascript'>alert('Los datos que digistastes no son correctos intenta de nuevo')</script>
							 <script  language='javascript'>window.location='@inicio'</script>";  
		}
	}
}

?>
</div>	