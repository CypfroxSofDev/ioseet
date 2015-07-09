<?php
$UploadDirectory	= '../misc/portadaperfil/'; //Upload Directory, ends with slash & make sure folder exist

// replace with your mysql database details
include("../config/prop.php");

$u = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
$user = mysql_fetch_array($u);

if (!@file_exists($UploadDirectory)) {
	die("Make sure Upload directory exist!");
}


if($_POST)
{	
	
	if(!isset($_FILES['mFile']))
	{
		//required variables are empty
		die("<div id='divisor3'>Casilla de la imagen vacia.</div>");
	}


	
	if($_FILES['mFile']['error'])
	{
		//File upload error encountered
		die(upload_errors($_FILES['mFile']['error']));
	}

	$FileName			= strtolower($_FILES['mFile']['name']); //uploaded file name
	$FileTitle			= $_SESSION['nick']; // file title
	$ImageExt			= substr($FileName, strrpos($FileName, '.')); //file extension
	$FileType			= $_FILES['mFile']['type']; //file type
	$FileSize			= $_FILES['mFile']["size"]; //file size
	$RandNumber   		= rand(0, 9999999999); //Random number to make each filename unique.
	$uploaded_date		= date("Y-m-d H:i:s");

	switch(strtolower($FileType))
	{
		//allowed file types
                case 'image/jpeg':
                case 'image/png':
                        break;
		default:
			die('Archivo No valido'); //output error
	}
  
	//File Title will be used as new File name
	$NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
	$NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
        $Dir = $NewFileName;
        //Rename and save uploded file to destination folder.
        if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName )){
	

		//connect & insert file record in database
		
	        @mysql_query("UPDATE `DisenoFD` SET `portada`='$Dir' WHERE `idEmpresa`='".$user['idEmpresa']."'");
		
               $gn = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	                        $n = mysql_fetch_array($gn);
                echo'<div id="tboxizqmin">
                <div id="content-header"><div id="header1"><div id="h1">Resultado</div></div></div><div id="texto1">
		        <img src="../misc/portadaperfil/'.$n['portada'].'" style="width:490px;">
                </div></div>';
		

  }else{
   		die('Error subiendo el archivo');
   }

}
?>