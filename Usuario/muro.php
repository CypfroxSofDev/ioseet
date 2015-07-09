<?php			
                echo'<div id="muro"></div><div id="muroi"></div><div id="productosa"></div><div id="serviciosa"></div>';  
				require_once 'Categorias/paginacion.php';
				$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idAnuncio` DESC");        
				$paging->ejecutar();  
				$gc = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idAnuncio`") or die(mysql_error());
				if(mysql_num_rows($gc) <= 0){
				echo'<div id="divisor3">No existe ninguna publicación en el momento, por favor verifíca más tarde</div>';
				}else{
				while($c= $paging->fetchResultado()) {
						$gy = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `idAnuncio`='".$c['idAnuncio']."'") or die(mysql_error());
						$y = mysql_fetch_array($gy); 
						$r = mysql_fetch_array($gc); 
                echo"	
                <div id='divisor'><table><tr>
				
				<td valign='top'><img src='misc/fotosperfil/".$d['foto']."' id='fotoanuncio'>";

				if(isset($_SESSION['id'])){
				if($_SESSION['nick'] == "$nick"){
				echo'<form method="POST" action="Admin/Funcion_borrar_publicacion.php?id='.$c['idAnuncio'].'"><input id="buttonborrar" type="submit" name="borrar" value="Borrar"></form>';
				}else{
				if(isset($_SESSION['admin'])){
				echo'<form method="POST" action="Admin/Funcion_borrar_publicacion.php?id='.$c['idAnuncio'].'"><input id="buttonborrar" type="submit" name="eliminar" value="Spam"></form>';
						}else{
					}
				}
				}else{
				}



                               echo'	
						<td valign="top" id="bordep">
							
						</td>
						<td valign="top" id="mtextnovedades"><div style="float:left;"><b>'.$t['nombre'].'</b></div>';
							if($y['adicionAnuncio'] == ""){	
							}else{
							echo '<div class="spoiler"><input id="buttonvermas" style="float:right;" type="button" onclick="showSpoiler(this);" value="Ver imagen" /><div class="inner" style="display:none;">
										<div id="borderp"><a id="single_2" href="'.$y['adicionAnuncio'].'"><img src="'.$y['adicionAnuncio'].'" id="imagennovedades"></a></div>
											</div></div>';
							}
							echo'
							<br><div id="date"><b>['.$y['fechaAnuncio'].']</b></div>
							<div id="publicacionnovedades">';
							echo mensionar($y['descripcionAnuncio']);
							
							echo'</div>
					
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
				
?>
<script type="text/javascript" src="css/js/jquery.form.js"></script>
<script>
$(document).ready(function()
{
    $('#Comentar').on('submit', function(e)
    {
        e.preventDefault();
        $('#publicar').attr('disabled', '');
        //show uploading message
        $("#muro").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#muro',
	   success:  afterSuccess
 
        });
    });
});
$(document).ready(function()
{
    $('#imgs').on('submit', function(d)
    {
        d.preventDefault();
        $('#publicars').attr('disabled', '');
        //show uploading message
        $("#muroi").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#muroi',
	   success:  afterSuccess
 
        });
    });
});
function afterSuccess()
{
    $('#Comentar').resetForm();
    $('#publicar').removeAttr('disabled');
    $('#imgs').resetForm();
    $('#publicars').removeAttr('disabled');

}

</script>		