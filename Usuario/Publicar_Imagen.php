<?php
$UploadDirectory	= '../misc/publiimgs/';

include("../config/prop.php");
 
$u = mysql_query("SELECT * FROM `Empresa` WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
$user = mysql_fetch_array($u);

function getIDI($string){
	$a = mysql_query("SELECT * FROM `Empresa` WHERE `nick`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['idEmpresa'];
}

if (!@file_exists($UploadDirectory)) {
	die("Make sure Upload directory exist!");
}

if($_POST) {
	if(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1) {
		die("<div id='divisor3'>El espacio del texto no contiene caracteres</div>");
	}
    if(!isset($_FILES['mFile'])) {
	
		 $comment			= limpiarString($_POST['mPubli']);
	
		 $u = mysql_query("INSERT INTO `AnuncioFreemium` (`descripcionAnuncio`) VALUES ('".$comment."')") or die(mysql_error());		 
         @mysql_query("INSERT INTO `AnuncioEmpresa` (`idEmpresa`,`idAnuncio`,`idGremio`) VALUES ('".$_SESSION['idEmpresa']."','".$u['idAnuncio']."','".$_SESSION['idGremio']."')") or die(mysql_error());
         $gn = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' ORDER BY `idAnuncio` DESC LIMIT 1") or die(mysql_error());
         $c = mysql_fetch_array($gn);
		 $ge = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `idAnuncio`='".$c['idAnuncio']."' ORDER BY `idAnuncio` DESC LIMIT 1") or die(mysql_error());
         $e = mysql_fetch_array($ge);
         $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$c['idEmpresa']."'") or die(mysql_error());
	     $t = mysql_fetch_array($gt);
		 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
		 $d = mysql_fetch_array($diseno);
				echo'
				<div id="publicacion
				<div id="divisor">
				<table>
				<td valign="top"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:5px;"></a></td><td valign="top"><b><div id="mtext">'.$t['nombre'].'</b></div>
				';
                echo mensionar($e['descripcionAnuncio']);
                echo'<div id="bbottom"></div>';
	
	}elseif(!isset($_POST['mPubli']) || strlen($_POST['mPubli'])<1) {
		die("<div id='divisor3'>El espacio del texto no contiene caracteres</div>");
	}else{
	
		$FileName			= strtolower($_FILES['mFile']['name']); 
		$comment			= limpiarString($_POST['mPubli']);
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
			$Dir = $UploadDirectory.''.$NewFileName;
			if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName )){
			
				 $u = mysql_query("INSERT INTO `AnuncioFreemium` (`descripcionAnuncio`,`adicionAnuncio`) VALUES ('".$comment."','".$Dir."')") or die(mysql_error());		 
				 @mysql_query("INSERT INTO `AnuncioEmpresa` (`idEmpresa`,`idAnuncio`,`idGremio`) VALUES ('".$_SESSION['idEmpresa']."','".$u['idAnuncio']."','".$_SESSION['idGremio']."')") or die(mysql_error());
				 $gn = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."' ORDER BY `idAnuncio` DESC LIMIT 1") or die(mysql_error());
				 $c = mysql_fetch_array($gn);
				 $ge = mysql_query("SELECT * FROM `AnuncioFreemium` WHERE `idAnuncio`='".$c['idAnuncio']."' ORDER BY `idAnuncio` DESC LIMIT 1") or die(mysql_error());
				 $e = mysql_fetch_array($ge);
				 $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$c['idEmpresa']."'") or die(mysql_error());
				 $t = mysql_fetch_array($gt);
				 $diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$t['idEmpresa']."'") or die(mysql_error());
				 $d = mysql_fetch_array($diseno);
						echo'
								<div id="divisor">
                <table>
						<td valign="top" id="bordep"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:5px;"></a></td><td valign="top"><b><div id="mtext">'.$t['nombre'].'</b></div>
						';
						if($e['adicionAnuncio'] == ""){	
									}else{
									echo '<div class="spoiler"><input id="buttonvermas" style="float:right;" type="button" onclick="showSpoiler(this);" value="Ver imagen" /><div class="inner" style="display:none;">
												<div id="borderp"><a id="single_2" href="'.$e['adicionAnuncio'].'"><img src="'.$e['adicionAnuncio'].'" width="410" height="270"></a></div>
													</div></div>';
									}
						echo'<div id="publicacion">';echo mensionar($e['descripcionAnuncio']);echo'</div>';

				}else{
					die('Error subiendo el archivo');
			   }
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