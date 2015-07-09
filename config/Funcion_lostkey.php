<div id="tboxizq">
<h2>Â¿Has perdido tu contraseña?</h2>
<?php
if (!isset($_POST["submit"])) {
  ?>
  <div id="divisor">
  <form method="post">
  Correo<br>
  <input type="text" name="correo" id="login"><br><br>
  <input type="submit" name="submit" id="button1" value="Restaurar">
  </form>
  </div>
  <?php 
} else {
	$gp = mysql_query("SELECT * FROM `Login` WHERE `correo`='".$_POST["correo"]."'") or die(mysql_error());
	$p = mysql_fetch_array($gp); 
    $from = "Ioseet <Ioseetcorp@gmail.com>";

$correo = $_POST["correo"];
$clave = $p['password'];
$nick = $p['nick'];
    mail("".$correo.",Recuperacion de Clave , Ioseet Lostkey","Restauracion de clave | Ioseet Lostkey","Un LINK de restauracion de su clave fue enviado, por favor has clic para ser re-direcionado a la web oficial de Ioseet donde podrás hacer efectivo tu cambio de contraseña

http://www.Ioseet.com/@resetkey-".$clave."-".$nick."/","From: ".$from."");
    echo "<div id='divisor3'>Fue Enviado un mail al correo indicado con un link para recuperar tu clave.<br>
								Gracias por usar Ioseet.
			</div>";
  }
?>
</div>
