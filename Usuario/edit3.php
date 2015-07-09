<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Texto</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
		</div>

		<div class="turabox">
		
		<div id="tboxizq">
		
		<div id="content-header"><div id="header1"><div id="h1"><a href="@editar">Contacto</a>&nbsp;&nbsp;&nbsp;<a href="@editexto">Eslogan</a>&nbsp;&nbsp;&nbsp;Streams&nbsp;&nbsp;&nbsp;<a href="@edithorario">Horario</a></div></div></div>
		
		<div id="texto1">';
	if(isset($_SESSION['id'])){
	    if(!isset($_POST['modify'])){
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);
		$query2 = mysql_query("SELECT * FROM `StreamRadio` WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error()); 
        $row2 = mysql_fetch_array($query2);
		$query3 = mysql_query("SELECT * FROM `URL` WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error()); 
        $row3 = mysql_fetch_array($query3);
		echo '
		<form method="POST" enctype="multipart/form-data">
		<table>
			<tr><td><b>Stream de radio</b></td><td><input id="login" type="text" name="stream" value="'.$row2['URLStreamRadio'].'"></td></tr>
            <tr><td><b>Stream de television</b></td><td><input id="login" type="text" name="tvstream" value="'.$row3['nombreUrl'].'"></td></tr>
			<tr><td><b>Tipo de StreamTv</b>
				
	            <td valign="top"><select id="login_select" name="tipostreamtv">';
				$television = mysql_query("SELECT * FROM `StreamTV` WHERE `idStreamTV`") or die(mysql_error());
				while($tv = mysql_fetch_array($television)){
                echo'
				<option value="'.$tv['idStreamTV'].'"> '.$tv['tipoStreamTV'].'</option>';
				}
	            echo'</select></td></tr>
            <tr><td></td><td><input id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
		    </table></form>';
				}else{
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);		
		$stream = mysql_real_escape_string($_POST['stream']);
		$tvstream = mysql_real_escape_string($_POST['tvstream']); 
		$tipostreamtv = mysql_real_escape_string($_POST['tipostreamtv']); 
		@mysql_query("UPDATE `StreamRadio` SET `URLStreamRadio`='".$stream."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
		@mysql_query("UPDATE `URL` SET `nombreUrl`='".$tvstream."',`idStream`='".$tipostreamtv."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
			echo"<script  language='javascript'>window.location='".$_SESSION['nick']."'</script>"; 
				}
				
				}else{
			
			echo'<div id="divisor3">Esta pagina no exite</div>';
		}
			
		echo'</div></div>';
		
		require_once '../Usuario/dmenu.php';
		
		require_once '../Plugins/publicidadREG.php';
		
		require_once '../Plugins/pie.php';
		
		echo'</div>';

	?>