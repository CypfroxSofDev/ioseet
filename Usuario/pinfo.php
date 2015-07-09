<?php
echo'<div id="tboxdermin">';
				echo'<div id="content-header"><div id="header1"><div id="h1">
				<table><td>';
				@$gp = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
				$p = mysql_fetch_array($gp);
				$radio = mysql_query("SELECT * FROM `StreamRadio` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				$r = mysql_fetch_array($radio);
				$gl = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".getIDLogin($nick)."'") or die(mysql_error());
				$l = mysql_fetch_array($gl);
				$horario = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
				$at = mysql_fetch_array($horario);
				if($p['nick'] == "$nick"){ 
				echo'<a href="@editar"><img src="../misc/iconos/editar.png"><div id="date">Editar info</div></a></td><td valign="top">Información</td></table></div></div></div>';
				}else{
				echo'<td>Información</td></table></div></div></div>';
				}

				echo'
			<div id="texto1">
			<div style="padding:5px;">
			<table>';
			if($t['propietario']==""){
			}else{
            echo'<tr><td><img style="padding:5px;" src="../misc/iconos/prop.png"></td><td>Pertenece a '.$t['propietario'].'</td></tr>';
			}
            echo'<tr><td><img style="padding:5px;" src="../misc/iconos/tipo.png"></td><td>Gremio de trabajo&nbsp;<a href="@-'.$g['nombreGremio'].'">'.$g['nombreGremio'].'</a></td></tr>';
			if($ct['nombreCiudad']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/ciudad.png"></td><td>De '.$ct['nombreCiudad'].'</td></tr>';
			}
			if($t['direccion']==""){
			}else{
            echo'<tr><td><img style="padding:5px;" src="../misc/iconos/calle.png"></td><td>En la '.$t['direccion'].'</td></tr>';
			}
			if($t['telefono']==""){
			}else{
            echo'<tr><td><img style="padding:5px;" src="../misc/iconos/tel.png"></td><td><div style="color:#3298ef">'.$t['telefono'].'</div></td></tr>';
			}
            if($t['celular']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/cel.png"></td><td><div style="color:#3298ef">'.$t['celular'].'</div></td></tr>';
			}
            if($l['correo']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/mail.png"></td><td><div style="color:#3298ef">'.$l['correo'].'</div></td></tr>';
			}
			
			if($t['bbm']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/bbm.png"></td><td>BBM '.$t['bbm'].'</td></tr>';
			}	
			if($t['web']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/web.png"></td><td><div style="color:#3298ef"><a href="http://'.$t['web'].'" target="_blank">'.$t['web'].'</a></div></td></tr>';
			}
			if($t['Labor']==""){
			}else{
			echo'<tr><td><img style="padding:5px;" src="../misc/iconos/que.png"></td><td>Me dedico a '.$t['Labor'].'</td></tr>';
			}
			if(date("l")=="Saturday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(6).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';		
			}elseif(date("l")=="Friday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(5).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';
			}elseif(date("l")=="Thursday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(4).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';	
			}elseif(date("l")=="Wednesday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(3).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';	
			}elseif(date("l")=="Tuesday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(2).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';	
			}elseif(date("l")=="Monday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(1).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';	
			}elseif(date("l")=="Sunday"){
				echo'<tr><td><img style="padding:5px;" src="../misc/iconos/hora.png"></td><td>'.getIDSemana(7).' - Abierto a las '.$at['HoraAbierta'].' hasta las '.$at['HoraCierre'].'</td></tr>';	
			}else{
				echo'<tr><td>'.date("d").'</td></tr>';
			}		
			echo''.onlineCheck($l['idLogin']).'</table>';
			
            echo'</div></div>';
			echo'<div id="content-header"><div id="header2"><table><tr><td><img style="padding:5px;" src="../misc/iconos/sucursal.png"></td><td>';require_once'fuerza.php';echo'</td></tr></table></div></div></div>';
			require_once 'Admin/Funcion_botones.php';
?>
