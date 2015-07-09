<?php
echo'
<div id="arribabox">
<table>';
if(isset($_SESSION['id'])){
echo'<tr>
<td><a href="'.$_SESSION['nick'].'"><input id="button2" type="button" value="Perfil"></a></td>
<td><a href="@novedades"><input id="button2" type="button" value="Novedades"></a></td>
<td><a href="@negocios"><input id="button2" type="button" value="Empresas"></a></td>
<td>
<form>
<input class="barrabuscar" type="text" id="nombre"></td>
<td></form></td>
</tr>
<tr><td></td><td></td><td></td><td><div id="suggestions"></div></td><td></td></tr>';
}else{
echo'<tr>
<td><a href="@inicio"><input id="button2" type="button" value="Ioseet"></a></td>
<td><a href="@novedades"><input id="button2" type="button" value="Novedades"></a></td>
<td><a href="@negocios"><input id="button2" type="button" value="Empresas"></a></td>
<td>
<form>
<input class="barrabuscar" type="text"id="nombre"></td>
<td></form></td>
</tr>
<tr><td></td><td></td><td></td><td><div id="suggestions"></div></td><td></td></tr>


';
}
echo'
</table>
</div>';
?>
<script>
$(document).ready(function() {
    $(".barrabuscar").attr("value", "Buscas Empresas en Ioseet?");
		
		var text = "Buscas Empresas en Ioseet?";
		
		$(".barrabuscar").focus(function() {
		 $(this).addClass("active");
		  if($(this).attr("value") == text) $(this).attr("value", "");
			});
			$(".barrabuscar").blur(function() {
			  $(this).removeClass("active");
			if($(this).attr("value") == "") $(this).attr("value", text);
			
			});
		});
		</script>