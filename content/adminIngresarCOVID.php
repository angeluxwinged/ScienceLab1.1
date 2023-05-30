<?php
$titulo = "Administración";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarAdmin.template.php";
	?>

	<form class="formularios" autocomplete="off" name="ingresarResuCOVID" method="POST">
					<h3>Ingresar resultados COVID</h3>

                    <label class="inputInfo">Número identificador de la cita:</label>
					<div class="inputInfo">
	            	<input type="text" id="idCita" name="idCitaCOVID" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Número identificador del laboratorista:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="idLabo" name="idLaboCOVID" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Nombre completo del paciente:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="nombre" name="nombreCOVID">
	        		</div>

                    <label class="inputInfo">Edad del paciente:</label>
	        		<div class="inputInfo">
	            	<input type="text" id="edad" name="edadCOVID" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Nacionalidad del paciente:</label>
	        		<div class="inputInfo">
			        <input type="text" name="nacionalidadCOVID">
			        </div>

                    <label class="inputInfo">Tipo de prueba:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">ANTIGENOS</label> <input type="radio" name="tipoPruebaCOVID" value="ANTIGENOS">
			        <label class="radioInfo">PCR</label> <input type="radio" name="tipoPruebaCOVID" value="PCR">
			        </div>

                    <label class="inputInfo">Genero del paciente:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">MASCULINO</label> <input type="radio" name="generoCOVID" value="MASCULINO">
			        <label class="radioInfo">FEMENINO</label> <input type="radio" name="generoCOVID" value="FEMENINO">
			        </div>

                    <label class="inputInfo">Día en el que se generó el resultado:</label>
			        <div class="inputInfo">
			        <input type="date" name="fechaCOVID" id="fechaCOVID">
			    	</div>

                    <label class="inputInfo">Hora en la que se generó el resultado:</label>
			    	<div class="inputInfo">
			        <input type="time" name="horaCOVID" >
			    	</div>

                    <label class="inputInfo">Resultado:</label>
			    	<div class="inputInfo">
			        <label class="radioInfo">NEGATIVO</label> <input type="radio" name="resultCOVID" value="NEGATIVO">
			        <label class="radioInfo">POSITIVO</label> <input type="radio" name="resultCOVID" value="POSITIVO">
			        </div>

                    <label class="inputInfo">Nombre completo del laboratorista que realizó la prueba:</label>
			        <div class="inputInfo">
	            	<input type="text" id="nombreLabo" name="nombreLaboCOVID">
	        		</div>

			    	<div class="enviarCita">
			    		<input type="submit" name="enviarResuCOVID" value="Ingersar">
			    	</div>
  		 		</form>

    <script>
        document.getElementById('fechaCOVID').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
    </script>

	<?php
	include "../templates/scriptsContent.template.php";
	?>
    
	<?php 
		include("guardar.php");
	?>
</body>
</html>