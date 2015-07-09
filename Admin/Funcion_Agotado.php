<?php
require_once '../config/prop.php';
if(isset($_SESSION['id'])){
	if(isset($_SESSION['nick'])){
		if(isset($_GET['id'])){
				if($_POST['agotado']){
				Agotado(@$_GET['id']);	
				}
			}
	if(isset($_SESSION['admin'])){
		if(isset($_GET['id'])){
				if($_POST['agotadoadmin']){
				AgotadoAdmin(@$_GET['id']);	
				}
			}
	}else{
		echo'Error 504. Pagina no existente';
}
	}else{
		echo'No puedes eliminar esta publicación';
}
	}else{
		echo'Error 504. Pagina no existente';
		}

?>