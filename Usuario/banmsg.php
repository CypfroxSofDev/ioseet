<?php
	    if(isset($_GET['nick'])){
                $nick = mysql_real_escape_string($_GET['nick']);
				$gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				$t = mysql_fetch_array($gt);
				
		                        echo'
								<title>'.$t['nombre'].'</title>   						
                                <body bgcolor="#fafafa">
		                        </head>
		                        </body>
                                <div id="tboxizqmin">';
								
				                $gp = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
				                $p = mysql_fetch_array($gp);
                              
								echo"
								<div id='content-header'><div id='header1'><div id='h1'>".banCheck(getID($nick))."No existe o esta bloqueado</div></div></div>
								<div id='texto1'>";
								
                                echo'				                                                                                                                        
								</div>
								<div id="content-header"><div id="header2">Razones por la cual te aparece este mensaje <br><br>-Usuario bloqueado por infringir los Términos de Uso y Condiciones <br>-Perfil no existente</div></div>
								</div>';
								require_once 'Plugins/publicidadVIP.php';
								require_once 'Admin/Funcion_botones.php';
								require_once 'Plugins/publicidadREGB.php';
								
				
}
?>	