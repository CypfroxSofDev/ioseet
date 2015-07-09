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
		
		<div id="content-header"><div id="header1"><div id="h1"><a href="@editar">Contacto</a>&nbsp;&nbsp;&nbsp;<a href="@editexto">Eslogan</a>&nbsp;&nbsp;&nbsp;<a href="@editstream">Streams</a>&nbsp;&nbsp;&nbsp;Horario&nbsp;&nbsp;&nbsp;</div></div></div>
		
		<div id="texto1">';
	if(isset($_SESSION['id'])){
	    if(!isset($_POST['modify'])){
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);
		$query2 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."'") or die(mysql_error()); 
        $row2 = mysql_fetch_array($query2);
		$horario1 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='1'") or die(mysql_error()); 
        $h1 = mysql_fetch_array($horario1);
		$horario2 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='2'") or die(mysql_error()); 
        $h2 = mysql_fetch_array($horario2);
		$horario3 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='3'") or die(mysql_error()); 
        $h3 = mysql_fetch_array($horario3);
		$horario4 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='4'") or die(mysql_error()); 
        $h4 = mysql_fetch_array($horario4);
		$horario5 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='5'") or die(mysql_error()); 
        $h5 = mysql_fetch_array($horario5);
		$horario6 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='6'") or die(mysql_error()); 
        $h6 = mysql_fetch_array($horario6);
		$horario7 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$row['idEmpresa']."' AND `idDiaSemana`='7'") or die(mysql_error()); 
        $h7 = mysql_fetch_array($horario7);
		
		echo '
		<form method="POST" enctype="multipart/form-data">
		<table>';
		echo'<tr><td><b>'.getIDSemana($h1['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta" value="'.$h1['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre" value="'.$h1['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h2['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta1" value="'.$h2['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre1" value="'.$h2['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h3['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta2" value="'.$h3['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre2" value="'.$h3['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h4['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta3" value="'.$h4['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre3" value="'.$h4['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h5['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta4" value="'.$h5['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre4" value="'.$h5['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h6['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta5" value="'.$h6['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre5" value="'.$h6['HoraCierre'].'"></td></tr>';
		echo'<tr><td><b>'.getIDSemana($h7['idDiaSemana']).'</b></td><td> Abierto desde las <input id="horario" type="text" name="abierta6" value="'.$h7['HoraAbierta'].'"></td><td> Hasta las &nbsp;<input id="horario" type="text" name="cierre6" value="'.$h7['HoraCierre'].'"></td></tr>';
		
        echo'<tr><td></td><td><input id="lbutton" type="submit" name="modify" value="Guardar Cambios"></td></tr>
		    </table></form>';
				}else{
		$query = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error()); 
        $row = mysql_fetch_array($query);
		$horario1 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='1'") or die(mysql_error()); 
        $h1 = mysql_fetch_array($horario1);
		$horario2 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='2'") or die(mysql_error()); 
        $h2 = mysql_fetch_array($horario2);
		$horario3 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='3'") or die(mysql_error()); 
        $h3 = mysql_fetch_array($horario3);
		$horario4 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='4'") or die(mysql_error()); 
        $h4 = mysql_fetch_array($horario4);
		$horario5 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='5'") or die(mysql_error()); 
        $h5 = mysql_fetch_array($horario5);
		$horario6 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='6'") or die(mysql_error()); 
        $h6 = mysql_fetch_array($horario6);
		$horario7 = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idDiaSemana`='7'") or die(mysql_error()); 
        $h7 = mysql_fetch_array($horario7);
		
		$abierta = limpiarString(mysql_real_escape_string($_POST['abierta']));
		$abierta1 = limpiarString(mysql_real_escape_string($_POST['abierta1']));
		$abierta2 = limpiarString(mysql_real_escape_string($_POST['abierta2']));
		$abierta3 = limpiarString(mysql_real_escape_string($_POST['abierta3']));
		$abierta4 = limpiarString(mysql_real_escape_string($_POST['abierta4']));
		$abierta5 = limpiarString(mysql_real_escape_string($_POST['abierta5']));
		$abierta6 = limpiarString(mysql_real_escape_string($_POST['abierta6']));
		$cierre = limpiarString(mysql_real_escape_string($_POST['cierre'])); 
		$cierre1 = limpiarString(mysql_real_escape_string($_POST['cierre1']));
		$cierre2 = limpiarString(mysql_real_escape_string($_POST['cierre2']));
		$cierre3 = limpiarString(mysql_real_escape_string($_POST['cierre3']));
		$cierre4 = limpiarString(mysql_real_escape_string($_POST['cierre4']));
		$cierre5 = limpiarString(mysql_real_escape_string($_POST['cierre5']));
		$cierre6 = limpiarString(mysql_real_escape_string($_POST['cierre6']));
		
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta."',`HoraCierre`='".$cierre."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h1['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta1."',`HoraCierre`='".$cierre1."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h2['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta2."',`HoraCierre`='".$cierre2."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h3['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta3."',`HoraCierre`='".$cierre3."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h4['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta4."',`HoraCierre`='".$cierre4."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h5['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta5."',`HoraCierre`='".$cierre5."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h6['idDiaSemana']."'") or die(mysql_error());
		@mysql_query("UPDATE `HorarioAtencion` SET `HoraAbierta`='".$abierta6."',`HoraCierre`='".$cierre6."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' AND `idDiaSemana`='".$h7['idDiaSemana']."'") or die(mysql_error());
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