<?php

					$gf = mysql_query("SELECT * FROM `fuerzaEmpresa` WHERE `idEmpresa`='".getID($nick)."' AND `idSuscriptor`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
					$f = mysql_fetch_array($gf);
					if($n['nick'] == "$nick"){  
							echo'<a href="@fans_'.$nick.'">Ver sucursales</a>';
							}else{
								if($f['verificado'] == '1'){
											echo'<form method="POST" action="Usuario/fans.php?nick='.$nick.'"><input id="buttonborrar" type="submit" name="nofan" value="Quitar de Sucursales"></form>';
										}else{
											echo'<form method="POST" action="Usuario/fans.php?nick='.$nick.'"><input id="buttonborrar" type="submit" name="fan" value="Agregarme a Sucursales"></form>';
								}
							}
?>