<?php
echo'<div id="divisor">';
	if(isset($_SESSION['id'])){
	    if(!isset($_POST['modify'])){
		
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);
		$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`='".$row['idGremio']."'") or die(mysql_error());
		$g = mysql_fetch_array($gremio);
		$ubicacion = mysql_query("SELECT * FROM `Ubicacion` WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error());
		$ub = mysql_fetch_array($ubicacion);
		echo '
		<form method="POST" enctype="multipart/form-data">
		<table>
				<tr><td><b>Propietario</b></td>
				<td style="padding:5px;"><input id="editar" maxlength="45" type="text" name="propietario" value="'.$row['propietario'].'"></td></tr>
				
				<tr><td><b>Pagina web</b></td>
				<td style="padding:5px;"><input id="editar" maxlength="45" type="text" name="web" value="'.$row['web'].'"></td></tr>
				
                <tr><td><b>Gremio</b>
				
	            <td style="padding:5px;" valign="top"><select id="editar_select" name="tipo">
				<option value="'.$g['idGremio'].'"> '.$g['nombreGremio'].'</option>';
				$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`") or die(mysql_error());
				while($gre = mysql_fetch_array($gremio)){
                echo'
				<option value="'.$gre['idGremio'].'"> '.$gre['nombreGremio'].'</option>';
				}
	            echo'</select>
				
			<tr><td><b>Que haces?</b></td>
			<td style="padding:5px;"><input id="editar" maxlength="35" type="text" name="desEmpresa" value="'.$row['Labor'].'"></td></tr>
			
			<tr><td><b>Pais</b></td>		
			<td style="padding:5px;" valign="top"><select id="editar_select" name="pais">';
			$paises = mysql_query("SELECT * FROM `Pais` WHERE `idPais`") or die(mysql_error());
			while($cte = mysql_fetch_array($paises)){
			echo'<option value="'.$cte['idPais'].'"> '.$cte['nombrePais'].'</option>';
			}
			echo'</select>
            
			<tr><td><b>Ciudad</b></td>		
			<td style="padding:5px;" valign="top"><select id="editar_select" name="city">';
			$paises = mysql_query("SELECT * FROM `Pais` WHERE `idPais`") or die(mysql_error());
			$cte = mysql_fetch_array($paises);
			$ciudad = mysql_query("SELECT * FROM `Ciudad` WHERE `idPais`='".$cte['idPais']."'") or die(mysql_error());
			while($ct = mysql_fetch_array($ciudad)){
			echo'<option value="'.$ct['idCiudad'].'">'.$ct['nombreCiudad'].'</option>';
			}
			echo'</select>
			
            <tr><td><b>Direccion</b></td>
			<td style="padding:5px;"><input id="editar" maxlength="45" type="text" name="dir" value="'.$row['direccion'].'"></td></tr>
			
            <tr><td><b>Telefono</b></td>
			<td style="padding:5px;"><input id="editar" maxlength="7" type="text" name="tel" value="'.$row['telefono'].'"></td></tr>
			
            <tr><td><b>Celular</b></td>
			<td style="padding:5px;"><input id="editar" maxlength="10" type="text" name="cel" value="'.$row['celular'].'"></td></tr>
			
            <tr><td><b>BlackBerry Pin</b></td>
			<td style="padding:5px;"><input id="editar" maxlength="8" type="text" name="bbpin" value="'.$row['bbm'].'"></td></tr>
			
		    </br>
			
            <tr><td></td><td style="padding:5px;"><input id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
			
		    </table></form>
            ';
			
				}else{
		$city = limpiarString($_POST['city']);
		$web = limpiarString($_POST['web']);
		$propietario = limpiarString($_POST['propietario']);
		$pais = htmlentities($_POST['pais']);
		$perf = htmlentities($_POST['tipo']);
		$desEmpresa = mysql_real_escape_string($_POST['desEmpresa']);
		$desEmpresaa = str_replace("<",'',($desEmpresa));
		$dir = mysql_real_escape_string($_POST['dir']);
		$dira = str_replace("<",'',($dir));
		$bbpin = mysql_real_escape_string($_POST['bbpin']);
		$bbpina = str_replace("<",'',($bbpin));
		$tel = mysql_real_escape_string($_POST['tel']);
		$tela = str_replace("<",'',($tel));
		$cel = mysql_real_escape_string($_POST['cel']);
		$cela = str_replace("<",'',($cel));

			@mysql_query("UPDATE `Empresa` SET `propietario`='".$propietario."', `web`='".$web."', `celular`='".$cela."', `bbm`='".$bbpina."',`direccion`='".$dira."',`telefono`='".$tela."',`idGremio`='".$perf."',`Labor`='".$desEmpresaa."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
			@mysql_query("UPDATE `Ubicacion` SET `idCiudad`='".$city."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
			echo"<script  language='javascript'>window.location='".$_SESSION['nick']."'</script>";  
				}
			}else{
			
			echo'<div id="divisor3">Esta pagina no exite</div>';
			}
echo'</div>';
		?>