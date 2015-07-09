<?php
include("../config/prop.php");
if($_SESSION['id']){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$query = mysql_query("UPDATE `Login` SET `sitelogged` = '".$loggedtime."' WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
	session_destroy();
	echo"<script  language='javascript'>window.location='../@inicio'</script>";  
}
?>
