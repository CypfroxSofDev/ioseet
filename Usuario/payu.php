<style type="text/css">
	.centrar {
		position: absolute;
		top:50%;
		left:50%;
		width:300px;
		margin-left:-150px;
		height:150px;
		margin-top:-75px;
		border:1px #e6e6e6 dashed;
		border-radius:2px;
		padding:5px;
                background-color:#ffffff;
                font-size:18px;

	}
	.centrarlogin {
		position: absolute;
		top:50%;
		left:50%;
		width:300px;
		margin-left:-150px;
		height:300px;
		margin-top:-150px;

	}
        #pagarpayu {
               border-bottom:1px #404040 dashed;
               border-top:1px #404040 dashed;
               border-right:transparent;
               border-left:transparent;
               width:100%;
               height:50px;
               font-size:18px;
               padding:3px;
       }
</style>
<?php
echo'<head><title>Compra tus puntos Ioseet - Buenaventura</title></head><body bgcolor="#3298ef">';
require_once '../css/direcion.php';

include("../config/prop.php");
if(isset($_SESSION['id'])){
$gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
				        $t = mysql_fetch_array($gt);
$gn = mysql_query("SELECT * FROM `Login` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
						$n = mysql_fetch_array($gn);
if(!isset($_POST['enviar'])){
						echo'<div class="centrar"><center><h3>Paso 1</h3>
					    <form method="post" action="">
                                             <input id="pagarpayu" maxlength="100" type="text" name="mMonto" value="1">
					    	<span><i>Cantidad de puntos a comprar</i></span>
                                                  <br><input id="button1" name="enviar" type="submit"  value="Enviar para pago" >';
                                                    }else{
                                                    $monto = limpiarString($_POST['mMonto']*1000);
                                                    echo'<form method="post" action="https://stg.gateway.payulatam.com/ppp-web-gateway/">
                                                         <input name="merchantId"    type="hidden"  value="500238">
							  <input name="accountId"     type="hidden"  value="500538" >
							  <input name="ApiKey"     type="hidden"  value="6u39nqhq8ftd0hlvnjfs66eh8c" >
							  <input name="description"   type="hidden"  value="Cantidad de Puntos Ioseet"  >
							  <input name="referenceCode" type="hidden"  value="'.$t['nombre'].'" >
							  <input name="amount"        type="hidden"  value="'.$monto.'">
							  <input name="tax"           type="hidden"  value="0"  >
							  <input name="taxReturnBase" type="hidden"  value="0" >
							  <input name="currency"      type="hidden"  value="COP" >
							  <input name="signature"     type="hidden"  value="be2f083cb3391c84fdf5fd6176801278">
							  <input name="test"          type="hidden"  value="0" >
							  <input name="buyerEmail"    type="hidden"  value="'.$n['correo'].'">
							  <input name="responseUrl"    type="hidden"  value="http://www.Ioseet.com/@respuestapayu" >
							  <input name="confirmationUrl"    type="hidden"  value="http://www.Ioseet.com/@confirmacionpayu" ><br>
                                                          <div class="centrar"><center><h3>Paso 2</h3><br>
                                                          <span><i>$ '.number_format($monto).' COP</i></span><br>
                                                          <span><i>Paga el Monto en pesos colombianos</i></span><br>
                                                          <input id="button1" name="Submit" type="submit"  value="Pagar" >
                                                          </center></div>	
					 	</form></center></div></body>';
						}
}else{
echo'<div class="centrarlogin">';
include("../Plugins/loginrefresh.php");
echo'</div>';
}
?>