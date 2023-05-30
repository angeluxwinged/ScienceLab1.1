<?php
$titulo = "Consultar Resultados";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarContent.template.php";
	?>

	<form class="formularios" method="POST">
		<h3 style="margin: 20px 0">Consultar resultados THC</h3>
		<label>Consulte información de sus resultados introduciendo el número que le ha sido proporcionado por el laboratorio</label>
			<div class="formImg">
			<img src="../images/form.png" width="120px">
			</div>
			<div class="inputInfo">
				<input type="text" name="escConsultaTHC" style="text-align: center" pattern="\d+">
			</div>
			<div class="enviarCita">
				<input type="submit" name="buscConsultaTHC" value="Consultar">
			</div>
	</form>

	<?php
	include "../templates/scriptsContent.template.php";
	?>

	<!-- La inclusion del archivo obtenerResultados.php -->
	<?php 
	include("obtenerResultados.php");
	?>
</body>
</html>