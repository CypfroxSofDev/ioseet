<?php
require_once '../config/prop.php';
if(isset($_SESSION['id'])){
	if(isset($_SESSION['nick'])){
		if(isset($_GET['id'])){
				if($_POST['borrar']){
				eliminarSer(@$_GET['id']);	
				}
			}
	if(isset($_SESSION['admin'])){
		if(isset($_GET['id'])){
				if($_POST['eliminar']){
				eliminarSeradmin(@$_GET['id']);	
				}
			}
	}else{
		echo'Error 504. Página no existente';
}
	}else{
		echo'No puedes eliminar esta publicación';
}
	}else{
		echo'Error 504. Página no existente';
		}

?>