<?php
require_once '../config/prop.php';
if(isset($_SESSION['id'])){
	if(isset($_SESSION['admin'])){
		if(isset($_GET['nick'])){
			$nick = mysql_real_escape_string($_GET['nick']);
				if($_POST['verificado']){
		$ve = mysql_query("UPDATE `Empresa` SET `verificado` = verificado + 1 WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
			echo"<script  language='javascript'>window.location='../".$nick."'</script>";  
				}elseif($_POST['noverificado']){
		$ve = mysql_query("UPDATE `Empresa` SET `verificado` = verificado - 1 WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
			echo"<script  language='javascript'>window.location='../".$nick."'</script>";  
			}
		}
	}else{
		echo'Error 504. Página no existente';
}
	}else{
		echo'Error 504. Página no existente';
}
?>