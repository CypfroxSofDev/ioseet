<?php
if(isset($_SESSION['id'])){
				echo"<script  language='javascript'>window.location='".getNick($_SESSION['id'])."'</script>"; 
				}else{

				if(@$_GET['pagina']=="superanuncio"){
				
					echo"<div id='tboxizqsanuncio'>
					<div id='content-header'><div id='header1'><div id='h1'>
					<table>
					<td><img src='../misc/iconos/bullhorn.png'></td>
						<td valign='top'>Super Anuncio<div id='date'><a href='@info-comprarpublicidad'>Comprar Ioseet Ads</a></td>
						</table>
						</div></div></div>";
						
						$limit = 1;
						$gt = mysql_query("SELECT * FROM `AnuncioPremium` WHERE `TipoPremium`='4' ORDER BY RAND()") or die(mysql_error());
						while($n = mysql_fetch_array($gt) AND $limit <= 1){
						$limit ++;
						echo"
						<a href='".$n['URL']."'><div style='width:100%; height:100%'>
						<table>
						<td><div id='bordep'><img src='misc/publicidad/".$n['imagenAnuncio']."' width='100%' height='310'><br><br><h1>".$n['tituloAnuncio']."</h1>
						<div id='textoads'><h8>".$n['descripcionAnuncio']."</h8></div></div></td>
						</table>
						</div></a>
						<div id='bbottom'></div><br>
						<div id='bbottom'></div>";
						
					}
					echo"</div>";
					
				}else{
				
				echo'
					<div id="tboxizqindex">
							<div id="divisor"><div id="imgindex">
							<table>
							 <td valign="top"><a href="Ioseet"><img src="misc/images/Ioseetlogo.png" id="imgindexparameter"></a><a href="Ioseet"></a></div>
							</table>
							</div>
							</div>
							</div>';
				}
				}
					
				
                			
?>
				