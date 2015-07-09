<?php
	include('../Categorias/paginacion.php');
	
	echo'<div id="tboxizq">

	<div id="content-header">
	
	<div id="header1">
	
	<div id="h1">
	
	<table>
	
	<td><a href=@mensajes>Mensajes</a></td>
	
	<td id="mobilebar"><form method="GET" action="@busca"><input id="barrabuscarnovedades" type="text" name="novedad"></td>
	
    <td><input id="barrabtn" type="submit" value="Buscar"></td></form></td></div>
	
    </table>
	
	</div></div></div>';
	
			if(@$_GET['pagina']=="mensajesvistos"){
			$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `Mensajeria` WHERE `Destino_idEmpresa`='".$_SESSION['id']."' AND `visto`>='1' order by `idMensajeria` DESC");        
				$paging->ejecutar();  
				while($n= $paging->fetchResultado()) {
                $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$n['Destino_idEmpresa']."'") or die(mysql_error());
                $t = mysql_fetch_array($gt); 
			   
                echo'<div id="publicacion">
				
                <div id="divisor">
				
                <table>

	            <td valign="top">
				
				<div id="bordep">
				
				</div></a></td>
				
				<td valign="top">
				
				<a href=@mensajes-'.$n['idMensajeria'].'>
				
				<div id="mtext"><h8>De: '.$n['emisor'].'</h8></a><h3>Asunto: '.$n['asunto'].'</h3><div id="date"> El '.$n['fecha'].'</div></div>';
				
                echo'</td></table>
                </div>
                </div>
                <div id="bbottom"></div>';
		            }
				echo '<center>';
				echo ' '.$paging->fetchNavegacion();
				echo '</center>';
				
			echo'</div>';
			
			}else{
	
               if(isset($_GET['id'])){
               $id = mysql_real_escape_string($_GET['id']);    
			   $row = mysql_query("SELECT * FROM `Mensajeria` WHERE `idMensajeria`='".$id."' order by `idMensajeria` DESC");         
			   $n = mysql_fetch_array($row); 

               $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$n['Destino_idEmpresa']."'") or die(mysql_error());
               $t = mysql_fetch_array($gt); 
			   
                echo'
				
                <div id="divisor">
				
                <table>
				
	            <td valign="top"><a href="'.$t['nick'].'">
				
				<div id="bordep">
				
				</div></td></a>
				
			    <td valign="top">
				
				<div id="mtext"><b><h8>Mensaje de :'.$n['emisor'].'</h8><br><h3>Asunto:'.$n['asunto'].'</h3><h3>Correo:'.$n['correo'].'</h3></b><div id="date">El '.$n['fecha'].'</div></div><br>
                
				<div id="publicacion"><h3>';echo mensionar($n['mensaje']);echo'</h3></div>';
                echo'</td></table> 
                </div>
                <div id="bbottom"></div>';
				$av = mysql_query("UPDATE `Mensajeria` SET `visto` = visto + 1 WHERE `idMensajeria`='".$id."'") or die(mysql_error());
            }else{
				$paging = new PHPPaging;       
				$paging->agregarConsulta("SELECT * FROM `Mensajeria` WHERE `Destino_idEmpresa`='".$_SESSION['id']."' AND `visto`='0' order by `idMensajeria` DESC");        
				$paging->ejecutar();  
				while($n= $paging->fetchResultado()) {
                $gt = mysql_query("SELECT * FROM `Empresa` WHERE `idEmpresa`='".$n['Destino_idEmpresa']."'") or die(mysql_error());
                $t = mysql_fetch_array($gt); 
			   
                echo'<div id="publicacion">
				
                <div id="divisor">
				
                <table>

	            <td valign="top">
				
				<div id="bordep">
				
				</div></a></td>
				
				<td valign="top">
				
				<a href=@mensajes-'.$n['idMensajeria'].'>
				
				<div id="mtext"><h8>De: '.$n['emisor'].'</h8></a><h3>Asunto: '.$n['asunto'].'</h3><div id="date"> El '.$n['fecha'].'</div></div>';
				
                echo'</td></table>
                </div>
                </div>
                <div id="bbottom"></div>';
		            }
				echo '<center>';
				echo ' '.$paging->fetchNavegacion();
				echo '</center>';
            }
			
			
			echo'</div>';
			
		}
                
?>


<script>
	function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
</script>