<?php          
if($t['idGremio'] == "3"){
	$television = mysql_query("SELECT * FROM `URL` WHERE `idEmpresa`='".getID($nick)."'") or die(mysql_error());
	$tv = mysql_fetch_array($television);
echo'<div id="tboxizqmin">
		<div id="content-header"><div id="header1"><div id="h1">Multimedia Stream</div></div></div>';
		if($tv['idStream'] == "1"){
			echo'<div id="texto1">
				<object type="application/x-shockwave-flash" height="340" width="100%" id="live_embed_player_flash" data="http://es-es.twitch.tv/widgets/live_embed_player.swf?channel='.$tv['nombreUrl'].'" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://es-es.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=es-es.twitch.tv&channel='.$tv['nombreUrl'].'&auto_play=false&start_volume=25" /></object>
		</div>';
		}elseif($tv['idStream'] == "2"){
		echo'<div id="texto1">
		<iframe width="100%" height="340" src="//www.youtube.com/embed/'.$tv['nombreUrl'].'" frameborder="0" allowfullscreen></iframe>
	</div>';
           }elseif($tv['idStream'] == "3"){
		echo'<div id="texto1">
		<iframe width="100%" height="340" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/'.$tv['nombreUrl'].'&amp;color=0066cc&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
	</div>';
	}elseif($tv['idStream'] == "4"){
		echo'<div id="texto1">
		<iframe width="100%" height="340" src="http://www.ustream.tv/embed/'.$tv['nombreUrl'].'?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
	</div>';
	}
	echo'</div>';
	}else{
	
}

?>	