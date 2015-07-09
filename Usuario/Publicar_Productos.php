<?php
$UploadDirectory	= '../misc/productos/';

include("../config/prop.php");
 
$u = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
$user = mysql_fetch_array($u);

function getIDI($string){
	$a = mysql_query("SELECT * FROM `Empresa` WHERE `nick`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['id'];
}

if (!@file_exists($UploadDirectory)) {
	die("Make sure Upload directory exist!");
}

if($_POST)
{	
    if(!isset($_FILES['mFile']))
	{
		die("<div id='divisor3'>Archivo Vacio</div>");
	}

if(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1)
	{
		die("<div id='divisor3'>La casilla no puede estar vacia</div>");
	}
if(!isset($_POST['mPrecio']) || strlen($_POST['mPrecio'])<1)
	{
		die("<div id='divisor3'>La casilla no puede estar vacia</div>");
	}
if(!isset($_POST['mTitulo']) || strlen($_POST['mTitulo'])<1)
	{
		die("<div id='divisor3'>La casilla no puede estar vacia</div>");
	}


	

    $FileName			= strtolower($_FILES['mFile']['name']);
	$comment			= limpiarString($_POST['mPubli']);
	$mTitulo			= limpiarString($_POST['mTitulo']);
	$mPrecio			= limpiarString($_POST['mPrecio']);
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
			die('Archivo No valido');
	} 
	    $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
	    $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
        $Dir = $NewFileName;
        if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName )){
		
		
         @mysql_query("INSERT INTO `Productos` (`idEmpresa`,`detallesProducto`,`imagenProducto`,`precioProducto`,`nombreProducto`) VALUES ('".$_SESSION['idEmpresa']."','".$comment."','".$Dir."','".$mPrecio."','".$mTitulo."')") or die(mysql_error());	   
		die('<div id="divisor3">Tu servicio se ah agregado , Visualizalo refrescando la web <a style="color:#fff" onclick="window.location.reload()" href="#">Refrescar</a>.</div>');     	 
	}else{
   		die('Error subiendo el archivo');
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