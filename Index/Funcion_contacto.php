<?php


				echo'
					<div id="tboxizq">
						<div id="content-header"><div id="header1"><div id="h1">Informacion</div></div></div>
							';
							if(@$_GET['pagina']=="comprarpublicidad"){
							echo'
							
							<div id="divisorinfo"><h8>�Como comprar Ioseet Ads?</h8><br>
							
							Para comprar Ioseet Ads es muy f�cil lo �nico que tienes que hacer es estar conectado en la cuenta de tu empresa registrada en Ioseet y a continuaci�n te aparecer� un bot�n abajo de este texto indicando que ya puedes comprar.<br><br>';

                              							  echo"<a href=\"javascript:void(0);\" onclick=\"window.open('http://www.Ioseet.com/@payu', 'popup', 'left=385, top=20, width=812, height=720, toolbar=0, resizable=1')\"><input id='button1' type='button' value='Comprar puntos Ioseet(1Punto = a $1000COP)'></a>
							<br><br><b>Otra forma de comprar</b><br><br>
							Puedes acercarte a las oficcinas de venta de Cypfrox donde podras obtener los puntos mediante un accesor de ventas y tu nombre de usuario dictado correctamente.
							
							</div>";
							}elseif(@$_GET['pagina']=="contacto"){
							echo'		 
							<div id="divisorinfo"><h8>Contacto</h8>
							<div id="date">Telefonos</div><br>
							Movistar<br>
							3177787188<br>
							3168470412<br>
							3178861147<br>
							3178862872<br><br>
							 
							<div id="date">Correos</div><br>
							Gmail: Ioseetcorp@gmail.com<br>
							 
							
							</div>';
							}elseif(@$_GET['pagina']=="comousarIoseet"){
							echo'		 
							<div id="divisorinfo">
							</div>';
							}elseif(@$_GET['pagina']=="usuarios"){
							echo'		 
							<div id="divisorinfo">';
							$gc = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`") or die(mysql_error());      
							$cs = mysql_num_rows($gc);
							echo'
							<center><br>Empresas registradas en Ioseet
							<div id="contador_izq">'.$cs.'</div></center>
							</div>';
							}elseif(@$_GET['pagina']=="queesIoseetads"){
							echo'		 
							<div id="divisorinfo">
							</div>';
							}elseif(@$_GET['pagina']=="TMC"){
							echo'		 
							<div id="divisorinfo">
							</div>';
							}elseif(@$_GET['pagina']=="FAQs"){
							echo'	
							<div id="divisorinfo"><h8>FAQ�S</h8><br>	 							
							<br>-	<b>�Cu�les son las formas de pago?</b><br>
							Los pagos se realizar�n mediante tarjetas de cr�dito por Paypal, PayBycash, Pin v�lida y consignaciones en cuentas de ahorro.<br>
							<br>-	<b>�C�mo es el procedimiento para la suspensi�n del perfil?</b><br>
							El perfil propio no podr� eliminarse, solo se podr� suspender la cuenta para evitar la clonaci�n del perfil y/o la informaci�n que exista de la cuenta. Pero si en lugar de esto, la cuenta es ajena, se proceder� a hacer una verificaci�n de infracci�n de T�rminos de Uso y Condiciones, pruebas en fotos y se proceder� a suspender la cuenta.<br>
							<br>-	<b>�C�mo es el procedimiento para reactivar mi cuenta?</b><br>
							El usuario deber� realizar una solicitud al correo especificado en la zona de contacto. Nuestro equipo realizar� una verificaci�n de la legalidad de la solicitud y se proceder� a un tribunal, donde se informar� si se puede o no reactivar la cuenta.<br>
							<br>-	<b>�Qu� dominios soportan los servidores?</b><br>
							No manejamos subdominios. Se maneja: www.Ioseet.com.<br>
							<br>-	<b>�Ioseet� me ofrece soporte?</b><br>
							Ofrecemos el soporte como un servicio para cada empresa.<br>
							<br>-	<b>�Puedo actualizar mi perfil cada vez que quiera?</b><br>
							La actualizaci�n de tu perfil depender� si usted lo cree necesario o considera que ya es hora de darle una nueva imagen al perfil de la empresa.<br>
							<br>-	<b>�Qu� lenguajes soporta Ioseet�?</b><br>
							Manejamos: <br>
							�	HTML5.<br>
							�	PHP 5.4.<br>
							�	Java Script.<br>
							�	Jquery.<br>
							�	Mysql.<br>
							<br>-	<b>�C�mo puedo obtener las estad�sticas de las visitas en mi perfil?</b><br>
							Las estad�sticas se sit�an en la parte inferior del logo o la imagen del perfil de la empresa y ser�n p�blicas.<br>
							</div>';
							}else{
							echo'
							
							
							
							<div id="divisorinfo"><h8>�Que es Ioseet?</h8><br>
							Ioseet es la manera de lograr que tu negocio llegue a mas personas,
							Nacimos por la necesidad de conectar al publico con los diferentes tipos de establecimiento encontrados en las diferentes ciudades y paises del mundo.</br></br>

							<h8>�Como lo Hacemos?</h8></br>
							informando al cliente, creando un perfil detallado para los establecimientos o micro empresas que se alojen en nuestro sistema.<br><br>

                                                        <h8>�Acerca de?</h8></br>
							Ioseet, fue creado por un grupo de programadores de la ciudad de buenaventura, el grupo se denomina "Ioseet�".<br><br>
                                                        <b>El grupo esta conformado por:</b><br>
                                                         Yean Fabricio Casta�o (Fundador, Programador de c�digo)<br><br>
                                                         
                                                         <b>Colaboradores</b><br>
                                                          Mario Alberto Riascos (Ambientalista)<br>
                                                          Paula Andrea Garc�a Garc�a (Redactora de texto)<br>
                                                          Jarol Eusse Acevedo (Finanzas y ventas) <br>
                                                          Ana Maria Garc�a Garc�a (Agente y secretaria) <br>
                                                          
                                                       </div>';
							}
							echo'</table></div>';
							
					
				
                			
?>			