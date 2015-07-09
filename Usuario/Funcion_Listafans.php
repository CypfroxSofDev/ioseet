<?php
if(isset($_GET['nick'])){
$nick = mysql_real_escape_string($_GET['nick']);
require_once '../Categorias/paginacion.php';
$paging = new PHPPaging;       
        $paging->agregarConsulta("SELECT * FROM `fuerzaEmpresa` WHERE `idEmpresa`='".getID($nick)."' ORDER BY `idfuerzaEmpresa` DESC");        
        $paging->ejecutar();  
	    while($t= $paging->fetchResultado()) {
		$gn = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$t['idSuscriptor']."'") or die(mysql_error());
		$n = mysql_fetch_array($gn);
		$diseno = mysql_query("SELECT * FROM `DisenoFD` WHERE `idEmpresa`='".$n['idEmpresa']."'") or die(mysql_error());
		$d = mysql_fetch_array($diseno);
								$ubicacion = mysql_query("SELECT * FROM `Ubicacion` WHERE `idEmpresa`='".$n['idEmpresa']."'") or die(mysql_error());
						$ub = mysql_fetch_array($ubicacion);
						$pais = mysql_query("SELECT * FROM `Ciudad` WHERE `idCiudad`='".$ub['idCiudad']."'") or die(mysql_error());
						$ct = mysql_fetch_array($pais);
echo"
<div style='padding:4px 2px 2px 4px; font-size:14px;'>
<table>

<td valign='top'><a href='".$n['nick']."'><div id='bordep'><img src='../misc/fotosperfil/".$d['foto']."' width='100' height='100' style='border-radius:2px;'></div></a></td>
<td><a href='".$n['nick']."'>".$n['nombre']."</a><br>".$ct['nombreCiudad']."<br><b>Lineas de atencion</b><br>".$n['telefono']." - ".$n['celular']."</td>
</table>
</div><div id='bbottom'></div>";
}
	echo '<center>';
	echo ' '.$paging->fetchNavegacion();
    echo '</center>';
}
?>