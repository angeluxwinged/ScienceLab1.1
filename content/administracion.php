<?php
$titulo = "Administración";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarAdmin.template.php";
	?>

	<div class="formularios2" name="citaCOVID" method="post">
		<div class="listaForm">
			<a href="adminIngresarCOVID.php">Ingresar Resultados COVID</a>
		</div>
		<div class="listaForm">
			<a href="adminIngresarTHC.php">Ingresar Resultados THC</a>
		</div>
		<div class="listaForm">
			<a href="adminGetCitaCOVID.php">Gestionar Citas COVID</a>
		</div>
		<div class="listaForm">
			<a href="adminGetCitaTHC.php">Gestionar Citas THC</a>
		</div>
		<div class="listaForm">
			<a href="adminGetLabo.php">Gestionar Laboratoristas</a>
		</div>
		<div class="listaForm">
			<a href="adminAgrLabo.php">Agregar Laboratorista</a>
		</div>
	</div>

	<?php
	include "../templates/scriptsContent.template.php";
	?>
    
	<?php 
		include("guardar.php");
	?>
</body>
</html>