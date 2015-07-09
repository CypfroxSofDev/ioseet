<?php

$UploadDirectory	= '../misc/publicidad/';

require_once '../config/prop.php';
 
$u = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
$user = mysql_fetch_array($u);

if (!@file_exists($UploadDirectory)) {
	die("Make sure Upload directory exist!");
}

if($_POST)
{	
    if(!isset($_FILES['mFile']))
	{
		die("<div id='divisor3'>Selecciona una imagen referente a tu anuncio que no infriga los Terminos y condiciones.</div>");
	}

if(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1)
	{
		die("<div id='divisor3'>Por favor ingresa un texto a tu anuncio o si no nadie lo podra leer.</div>");
	}
if(!isset($_POST['mTitulo']) || strlen($_POST['mTitulo'])<1)
	{
		die("<div id='divisor3'>Por favor asigna un titulo a tu anuncio</div>");
	}
if(!isset($_POST['mURL']) || strlen($_POST['mURL'])<1)
	{
		die("<div id='divisor3'>La url no puede estar vacia</div>");
	}
	if(!isset($_POST['mNivel']) || strlen($_POST['mNivel'])<1)
	{
		die("<div id='divisor3'>No puedes anunciarte sin seleccionar el nivel de tu anuncio, esto se produce por no tener los puntos suficientes.</div>");
	}


	

    $FileName			= strtolower($_FILES['mFile']['name']); 
	$texto			= limpiarString(mysql_real_escape_string($_POST['mPubli']));
	$titulo			= limpiarString(mysql_real_escape_string($_POST['mTitulo']));
	$url			= mysql_real_escape_string($_POST['mURL']);
	$mNivel			= mysql_real_escape_string($_POST['mNivel']);
    $FileTitle			= $_SESSION['nick']; 
	$ImageExt			= substr($FileName, strrpos($FileName, '.'));
	$FileType			= $_FILES['mFile']['type'];
	$FileSize			= $_FILES['mFile']["size"];
	$RandNumber   		= rand(0, 9999999999);
	$date		= date("m-d-y g:i A");
	
	switch(strtolower($FileType))
	{
                case 'image/jpeg':
                case 'image/png':
                        break;
		default:
			die('Archivo no válido');
	} 
	    $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
	    $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
        $Dir = $NewFileName;
        if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName )){
		
		
		
		 @mysql_query("INSERT INTO `AnuncioPremium` (`tituloAnuncio`,`descripcionAnuncio`,`URL`,`imagenAnuncio`,`TipoPremium`) VALUES ('".$titulo."','".$texto."','".$url."','".$Dir."','".$mNivel."')") or die(mysql_error());		 
		 $o = mysql_query("SELECT idAnuncioPremium FROM `AnuncioPremium` WHERE `idAnuncioPremium` ORDER BY `idAnuncioPremium` DESC") or die(mysql_error());
		 $idpremium = mysql_fetch_array($o);
		 @mysql_query("INSERT INTO `AfiliadosPremium` (`idEmpresa`,`idAnuncioPremium`,`fechaFinal`) VALUES (".$_SESSION['idEmpresa'].",".$idpremium['idAnuncioPremium'].",DATE_ADD(CURRENT_TIMESTAMP(), INTERVAL 7 DAY))") or die(mysql_error());
		
		switch($mNivel){
			case 1: 
				$restopuntos = 30;
			break;
			
			case 2: 
				$restopuntos = 55;
			break;
			
			case 3: 
				$restopuntos = 75;
			break;
		}
		
		 @mysql_query("UPDATE `Empresa` SET `PuntosPremium` = PuntosPremium - '".$restopuntos."' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());		       
		 @mysql_query("UPDATE `Cupos` SET `cantidaCupos` = cantidaCupos - 1 WHERE `idCupos`='".$mNivel."'") or die(mysql_error());	 	
		 		 
         die('<div id="divisor3">Tu anuncio de publicidad ha sido añadida a la base de datos. Refresca la pagina para visualizarlo.</div>');		 
	}else{
   		 die('Error subiendo el archivo.');
   }
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