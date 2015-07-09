
				<?php
require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'
	<title>Editar Informacion</title>


	</head>	
	
	<div class="arriba">';

require_once '../Plugins/arriba.php';

 echo'
		</div>

		<div class="turabox">
		
		<div id="tboxizq">
		
		<div id="content-header"><div id="header1"><div id="h1">Producto</div></div></div>
		
		<div id="texto1">';
		
		if(isset($_GET['id'])){
		$id = mysql_real_escape_string($_GET['id']); 
				$gy = mysql_query("SELECT * FROM `Productos` WHERE `idProductos`='".$id."'") or die(mysql_error());
						$c = mysql_fetch_array($gy); 
                echo"	
                <div id='divisor'><table>
				
				<td valign='top'><a id='single_2' href='misc/productos/".$c['imagenProducto']."'><img src='misc/productos/".$c['imagenProducto']."' id='fotoproductosuni'></a><b>Precio : ".$c['precioProducto']."</b></td>
				<td valign='top'><div id='mtext'><h8>".$c['nombreProducto']."</h8>";
				echo"<div id='date'>El [".$c['fechaProducto']."]</div></div>";
                echo'<div id="publicacionproductosuni">';
				
				echo mensionar($c['detallesProducto']);
				
				echo'</div>';
				
				echo'</td></table></div>';
		}
		
		echo'</div></div>';
		
		require_once '../Plugins/publicidadVIP.php';
		
		require_once '../Plugins/publicidadREG.php';
		
		require_once '../Plugins/pie.php';

		echo'</div>';
?>