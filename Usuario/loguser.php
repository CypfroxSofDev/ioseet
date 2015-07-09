<?php
	    if(isset($_GET['nick'])){
                $nick = mysql_real_escape_string($_GET['nick']);
				        $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				        $t = mysql_fetch_array($gt);
						$gn = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".getIDLogin($nick)."'") or die(mysql_error());
						$n = mysql_fetch_array($gn);
						$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`='".$t['idGremio']."'") or die(mysql_error());
						$g = mysql_fetch_array($gremio);
						$horario = mysql_query("SELECT * FROM `HorarioAtencion` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
						$at = mysql_fetch_array($horario);
						$ubicacion = mysql_query("SELECT * FROM `Ubicacion` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
						$ub = mysql_fetch_array($ubicacion);
						$pais = mysql_query("SELECT * FROM `Ciudad` WHERE `idCiudad`='".$ub['idCiudad']."'") or die(mysql_error());
						$ct = mysql_fetch_array($pais);
						$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
						$d = mysql_fetch_array($diseno);
						$gc = mysql_query("SELECT * FROM `fuerzaEmpresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());      						
                        $gi = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idAnuncio` ASC") or die(mysql_error());
	                    $ci = mysql_num_rows($gi);
						$cs = mysql_num_rows($gc);
		                        echo'
								<title>'.$t['nombre'].' - '.$ct['nombreCiudad'].'</title>   
								<meta name="description" content="'.$d['slogan'].', Usando la plataforma empresarial Ioseet."/>
                                <body background="misc/fondoperfil/'.$d['fondo'].'" style="background-attachment: fixed;">								
                                <body bgcolor="#fafafa"></body>
		                        </head>
		                        </body>
                                <div id="tboxizqmin">';
                              
								echo"
								<div id='content-header'><div id='header1'><div id='h1'>".verificadoCheck(getID($nick))."".banCheck(getID($nick))." ".$t['nombre']."</div></div></div>
								<div style=\"background-image: url('misc/portadaperfil/".$d['portada']."');\" id='portada'>
								<table>";
								
                                echo'
                                <td  valign="top"><a id="single_2" href="misc/fotosperfil/'.$d['foto'].'" title="Foto De Perfil"><div style="margin:30px 0 20px 12px; "><div style="border:1px solid #efefef; background:#fff; padding:2px; border-radius:5px 0 0 5px;">
								<img src="misc/fotosperfil/'.$d['foto'].'" id="fotoperfil" alt="Foto De Perfil"/></div></a>
                                <td  valign="top"><div style="margin:30px 0 20px 0;"><div id="h4"><h7>'.$d['slogan'].'</h7></div></div>					                                                                                              
								</td>
								</table>                            
								</div>
								<div id="content-header"><div id="header2"><a href="@fans_'.$nick.'">Sucursales: '.$cs.'</a><a href="@enviarmensaje-'.$nick.'"><input style="float:right;" id="buttonborrar" type="submit" value="Enviar Mensaje"></a></div></div>			
								</div>
								<div id="der">';
								$av = mysql_query("UPDATE `Empresa` SET `cantidadVisitas` = cantidadVisitas + 1 WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
								require_once 'pinfo.php';
								
								echo'</div>
								';
								
								require_once 'tv.php';
								
								if($t['idGremio'] == "2"){
								echo"<div id=\"adminboxizqmin\">";
								echo"<div id=\"content-header\"><div id=\"header1\"><div id=\"h1\"><table><td>Mi Radio</td></table></div></div></div>";
								
								echo"<div id=\"texto1\">";
								echo'<audio controls="controls" style="width:490px"><source src="'.$r['URLStreamRadio'].'" type="audio/mpeg" /></audio>';
								echo"<a href=\"javascript:void(0);\" onclick=\"window.open('".$r['URLStreamRadio']."', 'popup', 'left=390, top=200, width=512, height=341, toolbar=0, resizable=0')\"><center><table><td><img src='../misc/iconos/play.png'></td><td>Abrir emision en otra ventana (opcional)</td></table></center></a>";
											echo"</div>";
											echo"</div>";
								}else{
								
								}
								echo'
								<div id="tboxizq">
								
								<div id="content-header"><div id="header1"><div id="h1"><a href="'.$nick.'"><input id="buttonanuncios-left" type="submit" value="Anuncios"></a><a href="'.$nick.'@productos"><input id="buttonanuncios" type="submit" value="Productos"></a><a href="'.$nick.'@servicios"><input id="buttonanuncios-right" type="submit" value="Servicios"></a></div></div></div>';
								
								if(@$_GET['pagina']=="productos"){
						
								include('Usuario/Funcion_Productos.php');
						
								}elseif(@$_GET['pagina']=="servicios"){
						
								include('Usuario/Funcion_Servicios.php');
						
								}else{
						
								include('Usuario/muro.php');
						
								}
								
								
							    echo'</div>';
}
?>			