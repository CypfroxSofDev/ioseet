<?php
	include('../Categorias/paginacion.php');
	
	echo'<div id="tboxizq">

	<div id="content-header">
	
	<div id="header1">
	
	<div id="h1">
	
	<table>
	
	<td><a href=@novedades>Noticias</a></td>
	
	<td id="mobilebar"><form method="GET" action="@busca"><input id="barrabuscarnovedades" type="text" name="novedad"></td>
	
    <td><input id="barrabtn" type="submit" value="Buscar"></td></form></td></div>
	
    </table>
	
	</div></div></div>';
	
               if(isset($_GET['tipo'])){
               $tipo = mysql_real_escape_string($_GET['tipo']);
			   $paging = new PHPPaging;       
			   $paging->agregarConsulta("SELECT * FROM `AnuncioEmpresa` WHERE `idGremio`='".getIDGremio($tipo)."' order by `idAnuncio` DESC");        
			   $paging->ejecutar();  
			   while($n= $paging->fetchResultado()) {
               	$anuncio = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `idAnuncio`='".$n['idAnuncio']."'") or die(mysql_error());
                $a = mysql_fetch_array($anuncio);
				$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`='".$n['idGremio']."'") or die(mysql_error());
                $g = mysql_fetch_array($gremio);
                $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$n['idEmpresa']."'") or die(mysql_error());
                $t = mysql_fetch_array($gt); 
				$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
                $d = mysql_fetch_array($diseno); 
			   
                echo'
				
				<div id="divisor">
                <table>
					<tr>
						<td valign="top" id="bordep">
							<a href="'.$t['nick'].'"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:5px;"></a><div><center><br>'.verificadoCheck(getID($t['nick'])).'</center></div>
						</td>
						<td valign="top" id="mtextnovedades"><a href='.$t['nick'].' style="float:left;"><b>'.$t['nombre'].'</b></a>';
							if($a['adicionAnuncio'] == ""){	
							}else{
							echo '<div class="spoiler"><input id="buttonvermas" style="float:right;" type="button" onclick="showSpoiler(this);" value="Ver imagen" /><div class="inner" style="display:none;">
										<div id="borderp"><a id="single_2" href="'.$a['adicionAnuncio'].'"><img src="'.$a['adicionAnuncio'].'" id="imagennovedades"></a></div>
											</div></div>';
							}
							echo'
							<br><div id="date"><b>['.$a['fechaAnuncio'].']</b></div>
							<div id="publicacionnovedades">';
							echo mensionar($a['descripcionAnuncio']);
							
							echo'
							</div></td></table></div>
							<div id="bbottom"></div>';
		        }
				echo '<center>';
				echo ' '.$paging->fetchNavegacion();
				echo '</center>';
				
               }else{
				$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `AnuncioFreemium` WHERE `idAnuncio` ORDER BY `idAnuncio` DESC");        
				$paging->ejecutar();  
				while($n= $paging->fetchResultado()) {
				$anuncio = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$n['idAnuncio']."'") or die(mysql_error());
                $a = mysql_fetch_array($anuncio);
				$gremio = mysql_query("SELECT * FROM `Gremio` WHERE `idGremio`='".$a['idGremio']."'") or die(mysql_error());
                $g = mysql_fetch_array($gremio);
                $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$a['idEmpresa']."'") or die(mysql_error());
                $t = mysql_fetch_array($gt); 
				$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
                $d = mysql_fetch_array($diseno); 
			   
                echo'
				<div id="divisor">
                <table>
					<tr>
						<td valign="top" id="bordep">
							<a href="'.$t['nick'].'"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:5px;"></a><div><center><br>'.verificadoCheck(getID($t['nick'])).'</center></div>
						</td>
						<td valign="top" id="mtextnovedades"><a href='.$t['nick'].' style="float:left;"><b>'.$t['nombre'].'</b></a>';
							if($n['adicionAnuncio'] == ""){	
							}else{
							echo '<div class="spoiler"><input id="buttonvermas" style="float:right;" type="button" onclick="showSpoiler(this);" value="Ver imagen" /><div class="inner" style="display:none;">
										<div id="borderp"><a id="single_2" href="'.$n['adicionAnuncio'].'"><img src="'.$n['adicionAnuncio'].'" id="imagennovedades"></a></div>
											</div></div>';
							}
							echo'
							<br><div id="date"><b>['.$n['fechaAnuncio'].']</b></div>
							<div id="publicacionnovedades">';
							echo mensionar($n['descripcionAnuncio']);
							
							echo'</div>
					
					
					<a href="@novedades-'.$g['nombreGremio'].'">'.$g['nombreGremio'].'</a>
					</td>
					</tr>
					</table>
					</div>
                <div id="bbottom"></div>';
		            }
				echo '<center>';
				echo ' '.$paging->fetchNavegacion();
				echo '</center>';
            }
			
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