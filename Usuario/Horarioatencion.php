<?php
echo'<div id="tboxdermin">
			<div id="content-header"><div id="header1"><div id="h1">Horario de atención</div></div></div>
            <div id="texto1"><table>';

			while($at = mysql_fetch_array($horario)){
            echo'<tr><td><b>'.getIDSemana($at['idDiaSemana']).'</b></td><td>: '.$at['HoraAbierta'].' - '.$at['HoraCierre'].'</td></tr>';
			}
			echo'</table></div>
			</div>';
			?>