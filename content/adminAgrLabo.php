<?php
$titulo = "Administración";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarAdmin.template.php";
	?>

    <form class="formularios" autocomplete="off" name="agregarLabo" method="POST" style="margin-bottom: 65px;">
		<h3>Agregar laboratorista</h3>

        <label class="inputInfo">Nombre completo:</label>
	    <div class="inputInfo">
	        <input type="text" id="nombre" name="nombreLabo">
	    </div>

        <label class="inputInfo">Fecha de nacimiento:</label>
	    <div class="inputInfo">
			<input type="date" name="fechaLabo">
		</div>

        <label class="inputInfo">Genero:</label>
		<div class="inputInfo">    
			<label class="radioInfo">MASCULINO</label> <input type="radio" name="generoLabo" value="MASCULINO">
			<label class="radioInfo">FEMENINO</label> <input type="radio" name="generoLabo" value="FEMENINO">
		</div>

        <label class="inputInfo">Domicilio:</label>
		<div class="inputInfo">
			<input type="text" name="domicilioLabo">
		</div>

        <label class="inputInfo">Nacionalidad:</label>
	    <div class="inputInfo">
			<input type="text" name="nacionalidadLabo">
		</div>

        <label class="inputInfo">Teléfono:</label>
		<div class="inputInfo">   
			<input type="text" name="telefonoLabo" pattern="\d+">
		</div>

        <label class="inputInfo">CURP:</label>
		<div class="inputInfo">
            <input type="text" name="CURPLabo">
        </div>

        <label class="inputInfo">RFC:</label>
		<div class="inputInfo">
            <input type="text" name="RFCLabo">
        </div>

        <label class="inputInfo">Número de seguro social:</label>
		<div class="inputInfo">
            <input type="text" name="NSSLabo" pattern="\d+">
        </div>

        <label class="inputInfo">Nombre de usuario:</label>
		<div class="inputInfo">
            <input type="text" name="usuarioLabo" style="text-transform: none">
		</div>

        <label class="inputInfo">Clave de acceso:</label>
		<div class="inputInfo">
            <input type="text" name="claveLabo" style="text-transform: none">
		</div>

		<div class="enviarCita">
            <input type="submit" name="enviarAgregarLabo" value="Ingresar">
		</div>
			    	
	</form>   

	<?php
	include "../templates/scriptsContent.template.php";
	?>
    
	<?php 
		include("guardar.php");
	?>
</body>
</html>