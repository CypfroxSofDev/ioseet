<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$database = "ioseet";

/*
 $host = "mysql13.000webhost.com";
$user = "a7110943_ioseet";
$pass = "2080784cypfrox.";
$database = "a7110943_cypfrox";
*/

$conn = mysql_connect($host,$user,$pass);
$db = mysql_select_db($database, $conn) or die(mysql_error());


if(isset($_SESSION['id'])){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$query = mysql_query("UPDATE `Login` SET `sitelogged` = '".$timenow."' WHERE `idLogin`='".$_SESSION['id']."'") or die(mysql_error());
    $retrieve = mysql_query("SELECT * FROM `Login` WHERE `sitelogged` >= '".$loggedtime."'") or die(mysql_error());
	$online = mysql_fetch_array($retrieve);
}

function getOnline(){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$a = mysql_query("SELECT * FROM `Login` WHERE `sitelogged` >= '".$loggedtime."'") or die(mysql_error());
	$b = mysql_num_rows($a);
	return $b;
}
function onlineCheck($string){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$a = mysql_query("SELECT * FROM `Login` WHERE `sitelogged` >= '".$loggedtime."' AND `idLogin`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	if($b['sitelogged'] >= $loggedtime){
		$check = '<tr><td><img style="padding:5px;" src="config/images/online.png" height="11" width="11"></td><td>Activo</td></tr>';
	}else{
		$check = '<tr><td><img style="padding:5px;" src="config/images/offline.png" height="11" width="11"></td><td>Inactivo</td></tr>';
	}
	return $check;
}

function verificadoCheck($string){
	$verificado = 1;
	$noverificado = 0;
	$a = mysql_query("SELECT * FROM `Empresa` WHERE `verificado` >= '1' AND `idEmpresa`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	if($b['verificado'] == $noverificado){
	    $vcheck = '';//<img src="../misc/images/noverificado.png" height="15" width="15" alt="NO Verificado">
	}else{
		$vcheck = '<img src="../misc/images/verificado.png" height="16" width="16" alt="Verificado">';
	}
	return $vcheck;
}

function banCheck($string){
	$ban = 1;
	$noban = 0;
	$a = mysql_query("SELECT * FROM `Login` WHERE `activo` >= '1' AND `idLogin`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	if($b['activo'] == $noban){
	    $bcheck = '';
	}else{
		$bcheck = '<img src="../misc/images/ban.png" height="15" width="15" alt="Bloqueado">';
	}
	return $bcheck;
}

function getNick($string){
	$a = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['nick'];
}

function getID($string){
	$a = mysql_query("SELECT * FROM `Empresa` WHERE `nick`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['idEmpresa'];
}

function getIDLogin($string){
	$a = mysql_query("SELECT * FROM `Login` WHERE `nick`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['idLogin'];
}

function getIDGremio($string){
	$a = mysql_query("SELECT * FROM `Gremio` WHERE `nombreGremio`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['idGremio'];
}

function getIDSemana($string){
	$a = mysql_query("SELECT * FROM `DiaSemana` WHERE `idDiaSemana`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['DiaSemana'];
}

	function eliminarP($id){
	$t = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$r = mysql_fetch_array($t);
	$yu = mysql_query("DELETE FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$yu = mysql_query("DELETE FROM `AnuncioFreemium` WHERE `idAnuncio`='".$id."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."'</script>";  
	}
	function eliminarPro($id){
	$t = mysql_query("SELECT * FROM `Productos` WHERE `idProductos`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$yu = mysql_query("DELETE FROM `Productos` WHERE `idProductos`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."@productos'</script>";  
	}
	function eliminarSer($id){
	$t = mysql_query("SELECT * FROM `Servicios` WHERE `idServicios`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$yu = mysql_query("DELETE FROM `Servicios` WHERE `idServicios`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."@servicios'</script>";  
	}

	function eliminarPadmin($id){
	$t = mysql_query("SELECT * FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$id."'") or die(mysql_error());
	$r = mysql_fetch_array($t);
	$yu = mysql_query("DELETE FROM `AnuncioEmpresa` WHERE `idAnuncio`='".$id."'") or die(mysql_error());
	$yu = mysql_query("DELETE FROM `AnuncioFreemium` WHERE `idAnuncio`='".$id."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."'</script>"; 
	}
	function eliminarProadmin($id){
	$t = mysql_query("SELECT * FROM `Productos` WHERE `idProductos`='".$id."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$yu = mysql_query("DELETE FROM `Productos` WHERE `idProductos`='".$id."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."@productos'</script>";  
	}
	function eliminarSeradmin($id){
	$t = mysql_query("SELECT * FROM `Servicios` WHERE `idServicios`='".$id."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$yu = mysql_query("DELETE FROM `Servicios` WHERE `idServicios`='".$id."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($r['idEmpresa'])."@servicios'</script>";   
	}

	function eliminarPUB($id){
	$t = mysql_query("SELECT * FROM `AfiliadosPremium` WHERE `idAnuncioPremium`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$d = mysql_query("DELETE FROM `AfiliadosPremium` WHERE `idAnuncioPremium`='".$id."' AND `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$d = mysql_query("DELETE FROM `AnuncioPremium` WHERE `idAnuncioPremium`='".$id."'") or die(mysql_error()); 
	echo"<script  language='javascript'>window.location='../@anunciate'</script>";  
	}
	
	function eliminarPUBadmin($id){
	$t = mysql_query("SELECT * FROM `AfiliadosPremium` WHERE `idAnuncioPremium`='".$id."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$d = mysql_query("DELETE FROM `AfiliadosPremium` WHERE `idAnuncioPremium`='".$id."'") or die(mysql_error());
	$d = mysql_query("DELETE FROM `AnuncioPremium` WHERE `idAnuncioPremium`='".$id."'") or die(mysql_error()); 
	echo"<script  language='javascript'>window.location='../@09291994Borrar'</script>";  
	}
		
	function restaurarFondo($id){
	$t = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	$r = mysql_fetch_array($t); 
	$yu = mysql_query("UPDATE `DisenoFD` SET `fondo`='NULL' WHERE `idEmpresa`='".$_SESSION['idEmpresa']."'") or die(mysql_error());
	echo"<script  language='javascript'>window.location='../".getNick($_SESSION['idEmpresa'])."'</script>";  
	}
					
function limpiarString($string)
   {
      $string = strip_tags($string);
      $string = htmlentities($string, ENT_QUOTES,'UTF-8');
      return stripslashes($string);  
   } 

function mensionar($text) { 
    preg_match_all ("/[@]+([A-Za-z0-9-_]+)/",$text, $users);
    $mentions  = $users[1]; 
   
    foreach($mentions  as $key => $nick){ 
        $uid = $nick;
        if(!empty($uid)) { 
            $find = '@'.$nick;              
            $replace = '@<a href="'.$uid.'" >'.$nick.'</a> '; 
            $text = str_replace($find, $replace, $text); 
           
        } 
          			  
    } 
     
    preg_match_all('/[#]+([A-Za-z0-9-_]+)/',$text, $hash); 
    $hashtag = $hash[1]; 
     
    foreach($hashtag  as $key => $hash){ 
        $find = '#'.$hash; 
        $replace = '<strong><a href="@tendencias-'.$hash.'">#'.$hash.'<a></strong> '; 
        $text = str_replace($find, $replace, $text); 
    } 

	preg_match_all('/[http]+(.*+)/',$text, $url); 
    $urltag = $url[1]; 
     
    foreach($urltag  as $key => $url){ 
        $find = 'http'.$url; 
        $replace = '<a href=http'.$url.' target=_blank>http'.$url.'</a> '; 
        $text = str_replace($find, $replace, $text); 
    } 
preg_match_all('/[https]+(.*+)/',$text, $url); 
    $urltag2 = $url[1]; 
     
    foreach($urltag  as $key => $url){ 
        $find = 'https'.$url; 
        $replace = '<a href=https'.$url.' target=_blank>https'.$url.'</a> '; 
        $text = str_replace($find, $replace, $text); 
    } 
     
    return $text; 
} 

Class Eliminar{

var $titulonegocios = 'Ioseet - Categorias';
var $titulonovedades = 'Ioseet - Informate';
var $tituloindex = 'Ioseet - Anunciate';
var $titulobuscar = 'Ioseet - Buscar';
var $titulocate = 'Ioseet - Tipos';

function mostrarTitulo($tituloasignado){

}
}

?>