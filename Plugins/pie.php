<?php
if(isset($_SESSION['id'])){
$gn = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['id']."'") or die(mysql_error());
$n = mysql_fetch_array($gn);
$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$n['idEmpresa']."'") or die(mysql_error());
$d = mysql_fetch_array($diseno);
echo'<body background="misc/fondoperfil/'.$d['fondo'].'" style="background-attachment: fixed; -webkit-background-size: 100% 100%; -moz-background-size: 100% 100%; -o-background-size: 100% 100%; background-size: 100% 100%;">';
echo'<body bgcolor="#fafafa"></body>';
}else{
echo'<body bgcolor="#fafafa"></body>';
}
?>
<div class="pie">
<br>
<center><span style="padding:5px; color:#272727; font-size: 11px;"><a href="@info">¿Que es Ioseet?</a> - <a href="@info-contacto">Contacto</a> - <a href="@info-TMC">Terminos y Condiciones</a> - Copyrigth To Cypfrox 2015.</span></center>
</div>

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48345052-1', 'www.ioseet.com');
  ga('send', 'pageview');


  </script>
</html>