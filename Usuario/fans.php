<?php
require_once '../config/prop.php';
if(isset($_SESSION['id'])){
		if(isset($_GET['nick'])){
			$nick = mysql_real_escape_string($_GET['nick']);
				if($_POST['fan']){
		$ve = mysql_query("INSERT INTO `fuerzaEmpresa` (`idEmpresa`,`idSuscriptor`,`verificado`) VALUES ('".getID($nick)."','".$_SESSION['id']."','1')") or die(mysql_error());
			echo"<script  language='javascript'>window.location='../".$nick."'</script>";  
				}
			if($_POST['nofan']){
		$ve = mysql_query("DELETE FROM `fuerzaEmpresa` WHERE `idEmpresa`='".getID($nick)."' AND `idSuscriptor`='".$_SESSION['id']."' AND `verificado`") or die(mysql_error());
			echo"<script  language='javascript'>window.location='../".$nick."'</script>";  
			}
		}
	}else{
		echo"<script  language='javascript'>window.location='@404'</script>";  
}
?>