<?php
echo"<div id='tboxizqmin'>";
           if($_GET['search']){   
		    $name = mysql_real_escape_string($_GET['search']);
                        echo'<div id="content-header"><div id="header1"><div id="h1">Resultados</div></div></div>';
						require_once '../Categorias/paginacion.php';
						$paging = new PHPPaging;
						$paging->agregarConsulta("SELECT * FROM `Empresa` WHERE `nombre` LIKE '%".$name."%' OR `nick` LIKE '%".$name."%' OR `labor` LIKE '%".$name."%' OR `direccion` LIKE '%".$name."%' ORDER BY `cantidadVisitas` DESC");        
						$paging->ejecutar();  
						while($i= $paging->fetchResultado()) {
						 $login = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$i['idLogin']."'") or die(mysql_error());
						 $lo = mysql_fetch_array($login);
						 $empresa = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$i['idEmpresa']."'") or die(mysql_error());
						 $l = mysql_fetch_array($empresa);
						 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$l['idEmpresa']."'") or die(mysql_error());
						 $d = mysql_fetch_array($diseno);
						if($lo['idPerfil'] >= "2"){
						}elseif($lo['activo'] =="1"){
						}else{
                        echo"
						
						<div id='divisor'>
                        <table>
                        <td><div id='bordep'><img src='misc/fotosperfil/".$d['foto']."' id='imgbuscar'></div></td>
						<td valign='top'>
						<a href='".$i['nick']."'>
						<div id='content-header'><div id='h1'>".verificadoCheck(getID($i['nick']))." ".$i['nombre']."</div></div></a>
                        <div id='c2'>".$d['slogan']."</div>
						</td>
						</table>
						</div>
                        <div id='bbottom'></div>";
						}
                    }
						echo '<center>';
						echo ' '.$paging->fetchNavegacion();
						echo '</center>';
						}else{
				echo '<div id="content-header"><div id="header1"><div id="h1">Resultados</div></div></div>';		
				echo "<div id='divisor3'>No se ha ingresado una empresa para buscar, por favor ingresa una empresa para empezar a buscar.</div>";
			}

echo'</div>';
?>