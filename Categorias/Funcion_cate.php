<?php
				include('../Categorias/paginacion.php');
				
echo'<div id="tboxizq">';
    

				if(isset($_GET['tipo'])){
                 $nombreGremio = mysql_real_escape_string($_GET['tipo']);
				 echo'<div id="content-header"><div id="header1"><div id="h1">'.$nombreGremio.'</div></div></div>';
				 $paging = new PHPPaging;       
				 $paging->agregarConsulta("SELECT * FROM `Empresa` WHERE `idGremio`='".getIDGremio($nombreGremio)."' ORDER BY `cantidadVisitas` DESC");        
				 $paging->ejecutar();  
				 while($t= $paging->fetchResultado()) {
				 $login = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$t['idLogin']."'") or die(mysql_error());
				 $lo = mysql_fetch_array($login);
				 $empresa = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
				 $l = mysql_fetch_array($empresa);
				 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$l['idEmpresa']."'") or die(mysql_error());
				 $d = mysql_fetch_array($diseno);
				 if ($lo['idPerfil'] >= "2"){
				}elseif($lo['activo'] =="1"){
				}else{

             
echo'

	<div id="divisor">
			<table>
				<td valign="top">
					<a href="'.$l['nick'].'"><img src="../misc/fotosperfil/'.$d['foto'].'" width="75" height="75" style="border-radius:4px;"></a>
						</td>
							<td valign="top">
								<h8>
									<a href="'.$l['nick'].'">'.$l['nombre'].'</a>
										</h8>
											<div id="textocate">'.$d['slogan'].'</div>
												</td>
													</table>
														</div>
															<div id="bbottom">
																</div>';
														
												}
										}
												echo '<center>';
												echo ' '.$paging->fetchNavegacion();
												echo '</center>';
									}else{
                                
											include("../Plugins/loguser.php");
							}
							
echo'</div>';

?>	
