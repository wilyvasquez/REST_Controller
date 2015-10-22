<?= form_open('/cursos/recibirDatos')  ?>
<?php
	$nombre = array(
		'name' =>'nombre' ,
		'placeholder' => 'Escribe tu nombre'
	);

	$videos = array(
		'name' =>'videos' ,
		'placeholder' => 'Escribe tu video'
	);
?>
<?= form_label('Nombre:','nombre')?>
<?= form_input($nombre)?>
<br>
<?= form_label('Numero videos:','videos')?>
<?= form_input($videos)?>
<br>
<?= form_submit('','subir curso')  ?>
<?= form_close() ?>
</body>
</html>