<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

require_once '../css/fancy.php';

echo'<title>Tendencias</title>';

echo'</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

echo"<div id='tboxizqmin'>";
         
		                if($_GET['hash']){

			            $hash = mysql_real_escape_string($_GET['hash']);		 
    echo'

	<div id="content-header">
	
	<div id="header1">
	
	<div id="h1">#'.$hash.'
	
	
	</div></div></div>';


												
                        $gi = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `descripcionAnuncio` LIKE '%#".$hash."%' ORDER BY `idAnuncio` ASC") or die(mysql_error());
			            while($i = mysql_fetch_array($gi)){ 
						$empresa = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$i['idAnuncio']."'") or die(mysql_error());
						$e = mysql_fetch_array($empresa);
						$login = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$e['idEmpresa']."'") or die(mysql_error());
						$l = mysql_fetch_array($login);
				echo'		
				
				<div id="bbottom"></div>
				
                <div id="publicacion">
				
                <div id="divisor">
				
                <table>
				
	            <td valign="top"><a href="'.getNick($e['idEmpresa']).'">
				
				<div id="bordep">
				
				</div></td></a>
				
			    <td valign="top">
				
				<a href='.$l['nick'].'><div id="mtext"><b>'.$l['nombre'].'</b></a> - El '.$i['fechaAnuncio'].'</div>';
				echo mensionar($i['descripcionAnuncio']);
                echo'</td></table> 
                </div></div>';
                        
					}  			  
			}
echo"</div>";

require_once '../Plugins/publicidadREG.php';

require_once '../Plugins/pie.php';

echo'</div>';
?>
