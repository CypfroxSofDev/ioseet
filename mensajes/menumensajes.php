<?php

$mge = mysql_query("SELECT * FROM `Mensajeria` WHERE `Destino_idEmpresa`='".$_SESSION['id']."' AND `visto`='0'") or die(mysql_error());  
$mg = mysql_num_rows($mge);
$mga = mysql_query("SELECT * FROM `Mensajeria` WHERE `Destino_idEmpresa`='".$_SESSION['id']."' AND `visto`>='1'") or die(mysql_error());  
$mgt = mysql_num_rows($mga);
echo'

<div id="tboxdermin">

<table>

<div id="minheader">Bandeja</div>

<a href="@mensajes"><div id="minheader">Mandeja de entrada('.$mg.')</div></a>

<a href="@mensajesvistos"><div id="minheader">Mensajes Vistos('.$mgt.')</div></a>

<a href="@contacto-queesIoseetads"><div id="minheader">Enviar un mensaje</div></a>


<div id="minheader"></div>

</table>

</div>';
?>