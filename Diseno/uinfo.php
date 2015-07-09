<?php
echo'<div id="tboxizqmin">';
     
				$gp = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
				$p = mysql_fetch_array($gp);
				$gm = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	            $m = mysql_fetch_array($gm);

                                echo'
								<div id="content-header"><div id="header1"><div id="h1">'.$p['nombre'].'</div></div></div>
                                <div id="texto1">';
								
			                    echo"<div style=\"background-image: url('misc/portadaperfil/".$m['portada']."');\" id=\"portada\">";
								
                                echo'
								<table>
                                <td  valign="top"><div style="padding:30px 0 30px 0;"><div id="outputm"></div><div id="bordep"></div></div> 
                                <td  valign="top"><div style="padding:30px 0 30px 0;"><div id="h4"><h7>'.$m['slogan'].'</h7></div></div>				                                                                                              
								</td></table></div></div></div>';
					
							require_once '../Usuario/dmenu.php';
?>