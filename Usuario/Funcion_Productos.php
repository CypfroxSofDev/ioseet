<?php			
				echo'<div id="muro"></div><div id="muroi"></div><div id="productosa"></div><div id="serviciosa"></div>'; 
				@$gn = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
				$n = mysql_fetch_array($gn);
				if($n['nick'] == "$nick"){  
				if($n['mute'] == "0"){  
				echo'
				
				<div id="texto1">
				
				<div class="spoiler"><input id="mbutton" type="button" onclick="showSpoiler(this);" value="Agregar producto" /><div class="inner" style="display:none;">
				<br>
				<form action="Usuario/Publicar_Productos.php" method="post" enctype="multipart/form-data" id="Productos">
				<div class="custom-input-file">
				<input type="file" name="mFile">Imagen del producto
				<div class="files">Seleccionar archivo
				</div>
				</div>
				<table><br>
                
				
				<tr><td><input type="text" name="mTitulo" id="titulo_box" maxlength="45" value="Agrega un titulo."></td></tr>
						
			    <tr><td><textarea name="mPubli" id="text_box" maxlength="300">Agrega una descripción.</textarea></td></tr>
						
				<tr><td><input type="text" name="mPrecio" id="precio_box" maxlength="45" value="Agrega un precio."></td></tr>
				
			    <tr><td><br><input id="button1" type="submit" name="producto" value="Anunciar"></td></tr>	
						
                </table></form>    
						
				</div></div></div>
				
				<div id="bbottom"></div>';
				}else{
	
						echo'
						
						<div id="divisor3">¿No puedes publicar? La razón es porque estas silenciado por motivo de infringimientode los Términos de Uso y Condiciones. Esta situación se presentará temporalmente.</div>';
				}
				}

				require_once 'Categorias/paginacion.php';
				$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `Productos` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idProductos` DESC");        
				$paging->ejecutar();  
				$gc = mysql_query("SELECT * FROM `Productos` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idProductos`") or die(mysql_error());
				if(mysql_num_rows($gc) <= 0){
				echo'<div id="divisor3">No existe ningún producto en el momento, por favor verifica más tarde</div>';
				}else{
				while($c= $paging->fetchResultado()) {
						$gy = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$c['idEmpresa']."'") or die(mysql_error());
						$y = mysql_fetch_array($gy); 
						$r = mysql_fetch_array($gc); 
                echo"	
                <div id='divisor'><table>
				
				<td valign='top'><a id='single_2' href='misc/productos/".$c['imagenProducto']."'><img src='misc/productos/".$c['imagenProducto']."' id='fotoproductos'></a>
				<br><a href='@productos-".$c['idProductos']."'><input id='buttonborrar' type='submit' value='Ver mas'></a>
				</td>
				<td valign='top'><div id='mtext'><h8>".$c['nombreProducto']."</h8>";
				echo"<div id='date'>El [".$c['fechaProducto']."]</div></div>";
                echo'<div id="publicacionproductos">';
				
				echo mensionar($c['detallesProducto']);
				
				echo'</div><b>Precio : '.$c['precioProducto'].'</b>';
		
				
				if(isset($_SESSION['id'])){
				if($_SESSION['nick'] == "$nick"){
				echo'<form method="POST" action="Admin/Funcion_borrar_productos.php?id='.$c['idProductos'].'"><input id="buttonborrar" type="submit" name="borrar" value="Borrar"></form>';
                                echo'<form method="POST" action="Admin/Funcion_Agotado.php?id='.$c['idProductos'].'"><input id="buttonborrar" type="submit" name="agotado" value="Agotado"></form>';
				}else{
				if(isset($_SESSION['admin'])){
				echo'<form method="POST" action="Admin/Funcion_borrar_productos.php?id='.$c['idProductos'].'"><input id="buttonborrar" type="submit" name="eliminar" value="Borrar"></form>';
                                echo'<form method="POST" action="Admin/Funcion_Agotado.php?id='.$c['idProductos'].'"><input id="buttonborrar" type="submit" name="agotadoadmin" value="Spam Agotado"></form>';
						}else{
					}
				}
				
				}else{
				
				}
				echo'</td></table></div>
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
$(document).ready(function()
{
    $('#Productos').on('submit', function(f)
    {
        f.preventDefault();
        $('#producto').attr('disabled', '');
        $("#productosa").html('<div style="padding:10px"><img src="misc/images/ajax-loader.gif" alt="Please Wait"/> <span>Publicando...</span></div>');
        $(this).ajaxSubmit({
        target: '#productosa',
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
    $('#Productos').resetForm();
    $('#producto').removeAttr('disabled');
}
</script>