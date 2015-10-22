<?php 
	if($cursos){
	foreach ($cursos->result() as $curso) { ?>
		<ul>
			<li><?= $curso->nombreCurso;  ?></li>
		</ul>
		<?php }
		 }else{
		 	echo "<p>Error en la aplicacion</p>";
		 }
	?>