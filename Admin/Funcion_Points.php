<?php

require_once '../config/prop.php';
 

if($_POST) {	

if(!isset($_POST['mNick']) || strlen($_POST['mNick'])<1)
	{
		die("<div id='divisor3'>Por favor ingresa el usuario.</div>");
	}
if(!isset($_POST['mPoints']) || strlen($_POST['mPoints'])<1)
	{
		die("<div id='divisor3'>Ingresa la cantidad a recargar.</div>");
	}


	$mNick		= limpiarString(mysql_real_escape_string($_POST['mNick']));
	$mPoints			= limpiarString(mysql_real_escape_string($_POST['mPoints']));
	$date		= date("m-d-y g:i A");
		
		 @mysql_query("UPDATE `Empresa` SET `PuntosPremium` = PuntosPremium + '".$mPoints."' WHERE `nick`='".$mNick."'") or die(mysql_error());			 
			die('<div id="divisor3">La recarga se ha completado satisfactoriamente verifica tu nuevo saldo.</div>');		 
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