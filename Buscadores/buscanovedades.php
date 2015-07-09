<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

require_once '../css/fancy.php';

echo'<title>Buscar</title>';

echo'</head>	

<div class="arriba">';

require_once '../Plugins/arriba.php';

echo'</div>

<div class="turabox">';

echo"<div id='tboxizqmin'>";
                        
    echo'

	<div id="content-header">
	
	<div id="header1">
	
	<div id="h1">
	
	<table>
	
	<td><a href=@novedades>Noticias</a></td>
	
	<td id="mobilebar"><form method="GET" action="@busca"><input id="barrabuscarnovedades" type="text" name="novedad"></td>
	
    <td><input id="barrabtn" type="submit" value="Buscar"></td></form></td></div>
	
    </table>
	
	</div></div></div>';

		                if($_GET['novedad']){

			            $anuncio = mysql_real_escape_string($_GET['novedad']);
												
                        $gi = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `descripcionAnuncio` LIKE '%".$anuncio."%' OR `fechaAnuncio` LIKE '%".$anuncio."%' ORDER BY `idAnuncio`") or die(mysql_error());
			            while($i = mysql_fetch_array($gi)){ 
						$empresa = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$i['idAnuncio']."'") or die(mysql_error());
						$e = mysql_fetch_array($empresa);
						$login = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$e['idEmpresa']."'") or die(mysql_error());
						$l = mysql_fetch_array($login);
						$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$l['idEmpresa']."'") or die(mysql_error());
						$d = mysql_fetch_array($diseno); 
 echo'
				
				<div id="divisor">
                <table>
					<tr>
						<td valign="top" id="bordep">
							<a href="'.$l['nick'].'"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:5px;"></a><div><center><br>'.verificadoCheck(getID($l['nick'])).'</center></div>
						</td>
						<td valign="top" id="mtextnovedades"><a href='.$l['nick'].' style="float:left;"><b>'.$l['nombre'].'</b></a>';
							if($i['adicionAnuncio'] == ""){	
							}else{
							echo '<div class="spoiler"><input id="buttonvermas" style="float:right;" type="button" onclick="showSpoiler(this);" value="Ver imagen" /><div class="inner" style="display:none;">
										<div id="borderp"><a id="single_2" href="'.$i['adicionAnuncio'].'"><img src="'.$i['adicionAnuncio'].'" id="imagennovedades"></a></div>
											</div></div>';
							}
							echo'
							<br><div id="date"><b>['.$i['fechaAnuncio'].']</b></div>
							<div id="publicacionnovedades">';
							echo mensionar($i['descripcionAnuncio']);
							
							echo'
							</div></td></table></div>
							<div id="bbottom"></div>';
                        
					}  			  
			}
echo"</div>";

require_once '../Plugins/publicidadROYAL.php';

require_once '../Plugins/pie.php';

echo'</div>';
?>

<script>
	function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
</script>
