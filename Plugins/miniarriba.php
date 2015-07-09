<?php
echo'<center><div id="miniarriba">';

if(isset($_SESSION['id'])){
echo'<a href="@anunciate">Publicar Anuncio</a>';
if(isset($_SESSION['admin'])){
echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="@re290994">Recargar puntos</a>';
echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="@09291994Borrar">Borrar anuncios</a>';
}
echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="various" data-fancybox-type="iframe" href="@buscarp?searchproducto=">Buscar un producto</a>';
echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="@editexto">Editar eslogan</a>';
echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="@log">Salir</a>';
}else{

echo'<a href="@inicio">Conectarse</a>';
}
echo'</div></center>';
?>