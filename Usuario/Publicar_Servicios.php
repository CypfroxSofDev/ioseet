<?php

include("../config/prop.php");
 
$u = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
$user = mysql_fetch_array($u);

if($_POST) {	

if(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1) {
		die("<div id='divisor3'>La Casilla no puede estar vacia</a>");
	}
	if(!isset($_POST['mTitulo']) || strlen($_POST['mTitulo'])<1) {
		die("<div id='divisor3'>La Casilla no puede estar vacia</a>");
	}


	

		$mTitulo			= limpiarString($_POST['mTitulo']);
		$comment			= limpiarString($_POST['mPubli']);
		$FileTitle			= $_SESSION['nick']; 
		$RandNumber   		= rand(0, 9999999999);
		$date		= date("m-d-y g:i A");
 
         @mysql_query("INSERT INTO `Servicios` (`idEmpresa`,`detallesServicio`,`nombreServicio`) VALUES ('".$_SESSION['id']."','".$comment."','".$mTitulo."')") or die(mysql_error());	        
		die('<div id="divisor3">Tu nuevo producto se ha  agregado , Visualizalo refrescando la web <a style="color:#fff" onclick="window.location.reload()" href="#">Refrescar</a>.</div>'); 
				
					}else{
					
   		die('Error subiendo el archivo');
   }
				
function upload_errors($err_code) {
	switch ($err_code) { 
        case UPLOAD_ERR_INI_SIZE: 
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
        case UPLOAD_ERR_FORM_SIZE: 
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
        case UPLOAD_ERR_PARTIAL: 
            return 'The uploaded file was only partially uploaded'; 
        case UPLOAD_ERR_NO_FILE: 
            return 'No file was uploaded'; 
        case UPLOAD_ERR_NO_TMP_DIR: 
            return 'Missing a temporary folder'; 
        case UPLOAD_ERR_CANT_WRITE: 
            return 'Failed to write file to disk'; 
        case UPLOAD_ERR_EXTENSION: 
            return 'File upload stopped by extension'; 
        default: 
            return 'Unknown upload error'; 
    } 
} 
?>