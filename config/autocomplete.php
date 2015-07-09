<?php 
include('prop.php');
require_once '../Categorias/paginacion.php';
$search = $_POST['nombre'];
						$paging = new PHPPaging;
						$paging->agregarConsulta("SELECT idEmpresa, labor, propietario, nombre, nick, idLogin FROM Empresa WHERE nombre like '%".$search."%' OR labor like '%".$search."%' OR propietario like '%".$search."%' ORDER BY nombre DESC");
						$paging->ejecutar();  
						while($row_services = $paging->fetchResultado()) {
$query_services2 = mysql_query("SELECT idLogin, idPerfil, activo FROM Login WHERE idLogin='".$row_services['idLogin']."'");
$lp = mysql_fetch_array($query_services2);
$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$row_services['idEmpresa']."'") or die(mysql_error());
$d = mysql_fetch_array($diseno);
	if($lp['idPerfil'] >= "2"){
	}elseif($lp['activo'] =="1"){
	}else{
    echo '<div class="suggest-element"><table><tr><td><a href="'.$row_services['nick'].'"><img src="misc/fotosperfil/'.$d['foto'].'" width="50" height="50" style="border-radius:2px; border:1px solid #e6e6e6;"></a></td><td><a style="padding:3px;" href="'.$row_services['nick'].'">'.utf8_encode($row_services['nombre']).'</a></td></tr></div>';
	}
}
 ?>