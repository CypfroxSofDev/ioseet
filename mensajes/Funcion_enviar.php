<?php

include("../config/prop.php");

if($_POST) {	

if(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1) {
		die("La Casilla no Puede estar vacia");
	}
	if(!isset($_POST['mEmisor']) || strlen($_POST['mEmisor'])<1) {
		die("La Casilla no Puede estar vacia");
	}

	if(!isset($_POST['mAsunto']) || strlen($_POST['mAsunto'])<1) {
		die("La Casilla no Puede estar vacia");
	}
		if(!isset($_POST['mCorreo']) || strlen($_POST['mCorreo'])<1) {
		die("La Casilla no Puede estar vacia");
	}
	
       
		$mEmisor			= limpiarString($_POST['mEmisor']);
		$mAsunto			= limpiarString($_POST['mAsunto']);
		$mCorreo			= limpiarString($_POST['mCorreo']);
		$mNick				= limpiarString($_POST['mNick']);
		$comment			= limpiarString($_POST['mPubli']);
		$RandNumber   		= rand(0, 9999999999);
		$date		= date("m-d-y g:i A");
 
         @mysql_query("INSERT INTO `Mensajeria` (`Destino_idEmpresa`,`emisor`,`fecha`,`correo`,`asunto`,`mensaje`) VALUES ('".$mNick."','".$mEmisor."','".$date."','".$mCorreo."','".$mAsunto."','".$comment."')") or die(mysql_error());	        
		die('<div id="divisor3">Tu mensaje se envio correctamente.</div>'); 
				
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