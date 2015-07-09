<?php
if(isset($_SESSION['id'])){
				if(isset($_GET['nick'])){
						$nick = mysql_real_escape_string($_GET['nick']);
						
				        $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				        $t = mysql_fetch_array($gt);
						$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`='".$t['idGremio']."'") or die(mysql_error());
						$g = mysql_fetch_array($gremio);
						$ubicacion = mysql_query("SELECT * FROM `Ubicacion` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
						$ub = mysql_fetch_array($ubicacion);
						$pais = mysql_query("SELECT * FROM `Ciudad` WHERE `idCiudad`='".$ub['idCiudad']."'") or die(mysql_error());
						$ct = mysql_fetch_array($pais);
						$gn = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
						$n = mysql_fetch_array($gn);
                        $chlogin = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".getIDLogin($nick)."'") or die(mysql_error());
				        $chl = mysql_fetch_array($chlogin);
						$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
						$d = mysql_fetch_array($diseno);
						$gc = mysql_query("SELECT * FROM `fuerzaEmpresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());     
						$mge = mysql_query("SELECT * FROM `Mensajeria` WHERE `Destino_idEmpresa`='".$_SESSION['id']."' AND `visto`='0'") or die(mysql_error());     						
                        $gi = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idAnuncio` ASC") or die(mysql_error());
	                    $ci = mysql_num_rows($gi);
						$cs = mysql_num_rows($gc);
						$mg = mysql_num_rows($mge);
						
						echo'<meta name="description" content="'.$d['slogan'].', Usando la plataforma empresarial Ioseet."/>';
						
						if($chl['activo'] == '0'){
		                echo'<title>'.$t['nombre'].' - '.$ct['nombreCiudad'].'</title>
		                <body background="misc/fondoperfil/'.$d['fondo'].'" style="background-attachment: fixed; background-repeat:no-repeat; -webkit-background-size: 100% 100%; -moz-background-size: 100% 100%; -o-background-size: 100% 100%; background-size: 100% 100%;">
						<body bgcolor="#fafafa"></body>';
		                echo'</head></body>';
						
                        echo'<div id="tboxizqmin">';
                                                          
                        echo"
						<div id='content-header'><div id='header1'><div id='h1'>".verificadoCheck(getID($nick))."".banCheck(getID($nick))." ".$t['nombre']."</div></div></div>";
						
			            echo"<div style=\"background-image: url('misc/portadaperfil/".$d['portada']."'); no-repeat center center fixed;\" id='portada'>";

                        echo'
						<table>
						<td valign="top"><a id="single_2" href="misc/fotosperfil/'.$d['foto'].'" title="Logo">
						<div style="margin:30px 0 20px 12px; "><div style="border:1px solid #efefef; background:#fff; padding:2px; border-radius:5px 0 0 5px;"><img src="misc/fotosperfil/'.$d['foto'].'" id="fotoperfil" alt="Logo"></div></a>';
						if($n['nick'] == "$nick"){  
						echo'<br><a href="@foto"><table><tr><td><img src="misc/iconos/image.png"></td><td>Subir Logo</td><td></tr></table></a>';
						}else{
						}
						echo'</div>						
                        <td valign="top"><div style="margin:30px 0 20px 0;"><div id="h4"><h7>'.$d['slogan'].'</br>';
						echo'
						</h7></div></div></td></table></div>';
						
						if($n['nick'] == "$nick"){  
						echo'<div id="content-header"><div id="header2">Anuncios : '.$ci.' | <a href="@fans_'.$nick.'">Sucursales: '.$cs.'</a><a href="@mensajes"><input style="float:right;" id="buttonborrar" type="submit" value="Ver Mensajes('.$mg.')"></a></div></div></div>';
						}else{
						echo'<div id="content-header"><div id="header2">Anuncios : '.$ci.' | <a href="@fans_'.$nick.'">Sucursales: '.$cs.'</a><a href="@enviarmensaje-'.$nick.'"><input style="float:right;" id="buttonborrar" type="submit" value="Enviar Mensaje"></a></div></div></div>';
						}
                        require_once'Usuario/pinfo.php';
						
                        require_once'Usuario/tv.php';
						
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

                        echo'<div id="tboxizq">';
						
                        if(@$n['nick'] == "$nick"){  
						
                        echo'<div id="content-header"><div id="header1"><div id="h1"><a href="'.$nick.'"><input id="buttonanuncios-left" type="submit" value="Anuncios"></a><a href="'.$nick.'@productos"><input id="buttonanuncios" type="submit" value="Productos"></a><a href="'.$nick.'@servicios"><input id="buttonanuncios-right" type="submit" value="Servicios"></a></div></div></div>';
						
                        }else{ 
						
                        echo'<div id="content-header"><div id="header1"><div id="h1"><a href="'.$nick.'"><input id="buttonanuncios-left" type="submit" value="Anuncios"></a><a href="'.$nick.'@productos"><input id="buttonanuncios" type="submit" value="Productos"></a><a href="'.$nick.'@servicios"><input id="buttonanuncios-right" type="submit" value="Servicios"></a></div></div></div>';

                        }
						
                        echo'<div id="texto1">';
						
						/**--------Paginas----**/
                        
						if(@$_GET['pagina']=="productos"){
						
						include('Usuario/Funcion_Productos.php');
						
						}elseif(@$_GET['pagina']=="servicios"){
						
						include('Usuario/Funcion_Servicios.php');
						
						}else{
						
						include('Usuario/muro.php');
						}
						
						echo'</div></div>';
						
						if(isset($_SESSION['id'])){
						require_once 'Usuario/publicar.php';
						}else{
						require_once 'Plugins/publicidadROYAL.php';
						}
						}else{
						require_once 'Usuario/banmsg.php';
						}
						
						}else{
						die('Este usuario no exite');
						}
						}else{
						$nick = mysql_real_escape_string($_GET['nick']);    
						$chlogin2 = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".getIDLogin($nick)."'") or die(mysql_error());
				        $chl2 = mysql_fetch_array($chlogin2);
						if($chl2['activo'] == '0'){
                        require_once 'Usuario/loguser.php';
						}else{
						require_once 'Usuario/banmsg.php';
                                                }
						
			}
?>	