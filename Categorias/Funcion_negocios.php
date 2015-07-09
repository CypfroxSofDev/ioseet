<?php

echo'
<div id="tboxizq">
<div id="content-header"><div id="header1"><div id="h1">
<table>
	<td>Categorias</td>
	<td id="mobilebar"><form method="GET" action="@buscare"><input id="barrabuscarnovedades" type="text" name="categoria"></td>
    <td><input id="barrabtn" type="submit" value="Buscar"></td></form></td></div>
    </table>
</div></div></div>';

require_once 'paginacion.php';
require_once 'paginacionmini.php';
$paging = new PHPPaging;       
        $paging->agregarConsulta("SELECT * FROM `Gremio` WHERE `idGremio` ORDER BY `idGremio` ASC");        
        $paging->ejecutar();  
	      while($n= $paging->fetchResultado()) {

echo'

<table>
<tr><td style="padding:10px;" valign="top"><a href="@-'.$n['nombreGremio'].'"><h8>'.$n['nombreGremio'].'</h8></a></td></tr>
<tr><td><div id="content-'.$n['nombreGremio'].'" class="content"><ul>';

$paging1 = new PHPPagingmini;
		  $paging1->agregarConsulta("SELECT * FROM `Empresa` WHERE `idGremio`='".getIDGremio($n['nombreGremio'])."' ORDER BY `cantidadVisitas` DESC");        
				 $paging1->ejecutar();  
				 while($t= $paging1->fetchResultado()) {
				$login = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$t['idLogin']."'") or die(mysql_error());
				 $lo = mysql_fetch_array($login);
				 $empresa = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
				 $l = mysql_fetch_array($empresa);
				 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$l['idEmpresa']."'") or die(mysql_error());
				 $d = mysql_fetch_array($diseno);
				 if ($lo['idPerfil'] >= "2"){
				}elseif($lo['activo'] =="1"){ 
				}else{
					echo'<li><a href="'.$l['nick'].'"><img src="../misc/fotosperfil/'.$d['foto'].'" width="75" height="75"></a></li>';
					}
				}
				 



echo'</ul></div>
		</td></tr></table>';

	}
?>
</div>

	<!-- Google CDN jQuery with fallback to local -->
	<script src="css/js/jquery.min110.js"></script>
	<script>window.jQuery || document.write('<script src="../js/minified/jquery-1.11.0.min.js"><\/script>')</script>
	
	<!-- plugin script -->
	<script src="css/js/jquery.mThumbnailScroller.js"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				
				$("#content-Independiente").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Radios").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Televisoras").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Agencias").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Agropecuarios").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Alimentos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Alquileres").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Apuestas").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Armas").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Asesorias").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Bancos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Bazares").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Combustibles").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Comercio_Exterior").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Construccion").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Cosmeticos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Decoraciones").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Deportes").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Distribuidoras").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Entretenimiento").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Eventos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Fundaciones").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Gubernamentales").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Hogar").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Hospedaje").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Libros").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Miscelaneas").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Nautico").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Oficinas").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Publicidad").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Prestamos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Salud").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Santerismo").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Seguridad").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Servicios").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Servicios-Para-Adultos").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Tecnologia").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Telecomunicaciones").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Vestir").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Viveros").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Comidas").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
				
				$("#content-Otros").mThumbnailScroller({
					axis:"yx",
					type:"hover-precise"
				});
			});
		})(jQuery);
	</script>
	