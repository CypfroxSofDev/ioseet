<?php

require_once '../css/w3.php';

echo'<head>';

require_once '../config/prop.php';

require_once '../css/direcion.php';

echo'<title>Buscar</title>';

echo'</head><div class="arriba">';
echo'
<div id="arribabox">
<table>';
echo'
<td id="mobilebar"><form method="GET" action="@buscarp">
<input id="barrabuscar_productos" type="text" name="searchproducto"></td>
<td><input id="barrabtn" type="submit" value="Buscar"></form></td>
</table>
</div>
</div>
<div class="turabox">
<div id="tboxizqmin">';
           if($_GET['searchproducto']){   
		    $name = mysql_real_escape_string($_GET['searchproducto']);
                        echo '<div id="content-header"><div id="header1"><div id="h1">Resultados</div></div></div>';
						require_once '../Categorias/paginacion.php';
						$paging = new PHPPaging;       
						$paging->agregarConsulta("SELECT * FROM `Productos` WHERE `detallesProducto` LIKE '%".$name."%' OR `nombreProducto` LIKE '%".$name."%' OR `precioProducto` LIKE '%".$name."%' ORDER BY RAND()");        
						$paging->ejecutar();  
						while($i= $paging->fetchResultado()) {
						 $empresa = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$i['idEmpresa']."'") or die(mysql_error());
						 $l = mysql_fetch_array($empresa);
						 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$l['idEmpresa']."'") or die(mysql_error());
						 $d = mysql_fetch_array($diseno);
                        echo"
						<div id='divisor4'>
                        <table>
                        <td><div id='bordep'><img src='../misc/productos/".$i['imagenProducto']."' id='imgbuscar'></div>
						</td>
						<td valign='top'>
						<div id='content-header'><div id='h1'><a href='@productos-".$i['idProductos']."'>".$i['nombreProducto']."</a></div></div>
                        <div id='c2'>".$i['detallesProducto']."</div>
						<b>Precio:".$i['precioProducto']."</b>
						</td>
						</table>
						</div>
                        <div id='bbottom'></div>";
						}
                    
						echo '<center>';
						echo ' '.$paging->fetchNavegacion();
						echo '</center>';
						}else{
				echo '<div id="content-header"><div id="header1"><div id="h1">Resultados de productos</div></div></div>';		
				echo "<div id='divisor3'>No se ha realizado ninguna búsqueda, por favor ingresa tu producto a buscar.</div>";
			}

echo"</div>";

echo'</div>';
?>
<script>
$(document).ready(function() {
    $("#barrabuscar_productos").attr("value", "Buscas Productos en Ioseet?");
		
		var text = "Buscas Productos en Ioseet?";
		
		$("#barrabuscar_productos").focus(function() {
		 $(this).addClass("active");
		  if($(this).attr("value") == text) $(this).attr("value", "");
			});
			$("#barrabuscar_productos").blur(function() {
			  $(this).removeClass("active");
			if($(this).attr("value") == "") $(this).attr("value", text);
			
			});
		});
		</script>