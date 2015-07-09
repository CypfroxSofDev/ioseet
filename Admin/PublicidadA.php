<?php 

if(isset($_SESSION['id'])){

	$gn = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$n = mysql_fetch_array($gn); 
	$ge = mysql_query("SELECT * FROM `Cupos` WHERE `idCupos`='1' AND `cantidaCupos`") or die(mysql_error());
	$cuposreg = mysql_fetch_array($ge);
	$creg = mysql_num_rows($ge);
	$gu = mysql_query("SELECT * FROM `Cupos` WHERE `idCupos`='2' AND `cantidaCupos`") or die(mysql_error());
	$cuposvip = mysql_fetch_array($gu);
	$cvip = mysql_num_rows($gu);
	$ga = mysql_query("SELECT * FROM `Cupos` WHERE `idCupos`='3' AND `cantidaCupos`") or die(mysql_error());
	$cuposroyal = mysql_fetch_array($ga);
	$croyal = mysql_num_rows($ga);
    echo'
		<div id="content-header"><div id="header1"><div id="h1">Anunciate</a></div></div></div>
			<div id="divisor">
						<div id="PB"></div>
						
                        <form action="Admin/Funcion_Publicidad.php" id="FilepUploader" enctype="multipart/form-data" method="post">
						<table>
						<tr><td><div class="custom-input-file">
						<input type="file" name="mFile">Imagen del producto
						<div class="files">Seleccionar archivo
						</div>
						</div></td></tr>
						
						<tr><td><input id="enviarmensaje_box_title" maxlength="45" type="text" name="mTitulo" value="Titulo"></td></tr>
						
						<tr><td><input id="enviarmensaje_box_title" maxlength="100" type="text" name="mURL" value="http://"></td></tr>
						
			            <tr><td><textarea name="mPubli" id="enviarmensaje_box_texto" maxlength="100"></textarea></td></tr>
							
						<tr><td valign="top">';	
						if($n['PuntosPremium'] >= '30' ){ 
						if($cuposroyal > '0' ){ 
						echo'<option value="3"> General (ROYAL) | 30 Ioseet Points</option>';
						}else{
						echo'-No hay mas cupos ROYAL<br>';
						}
						}else{
						echo'';
						}
						echo'</select><b><h8>-Puntos: '.$n['PuntosPremium'].'</h8></b></td></tr> 
						
                        <td><div id="divisor">Si no puedes visualizar las opciones es porque no tienes los suficientes puntos para usarlas<br>-Publicando acepto los Terminos y Condiciones</div><td>
						
						
						
			            <tr><td><input id="tbutton" type="submit" name="uploadpButton" value="Anunciar"> <b>ROYAL: '.$cuposroyal['cantidaCupos'].' | REGULAR: '.$cuposreg['cantidaCupos'].' | VIP: '.$cuposvip['cantidaCupos'].'</b></td></tr>		
						
						
						
                        </table></form>
						
						</div>';
						
		}else{
		
		echo"<script  language='javascript'>window.location='@404'</script>";  
   
	}
?>