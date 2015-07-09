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
		
		<div id="content-header"><div id="header1"><div id="h1"><a href="@editar">Contacto</a>&nbsp;&nbsp;&nbsp;Eslogan&nbsp;&nbsp;&nbsp;<a href="@editstream">Streams</a>&nbsp;&nbsp;&nbsp;<a href="@edithorario">Horario</a></div></div></div>
		
		<div id="divisor">';
	if(isset($_SESSION['id'])){
	    if(!isset($_POST['modify'])){
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);
		$query2 = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error()); 
        $row2 = mysql_fetch_array($query2);
		echo '
		<form method="POST" enctype="multipart/form-data">
		<table>
			<tr><td><div style="margin:10px 0 10px 7px; "><div style="border:1px solid #efefef; background:#fff; padding:2px; border-radius:5px 0 0 5px;"><img src="misc/fotosperfil/'.$row2['foto'].'" id="fotoperfil" alt="Logo"></div></td>
			<td><textarea id="edittbox" maxlength="500" cols="20" rows="5" type="text" name="sobre" style="height:80px;">'.$row2['slogan'].'</textarea></td></tr>
            <tr><td><input style="margin:0 0 10px 7px;"id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
		    </table></form>';
			}else{
			$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
			$row = mysql_fetch_array($query);
			$sobre = limpiarString($_POST['sobre']);
			
			@mysql_query("UPDATE `DisenoFD` SET `slogan`='".$sobre."' WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error());
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