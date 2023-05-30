<?php
$titulo = "Administración";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarAdmin.template.php";
	?>

	<form class="formularios" autocomplete="off" name="ingresarResuTHC" method="POST">
					<h3>Ingresar resultados THC</h3>

                    <label class="inputInfo">Número identificador de la cita:</label>
					<div class="inputInfo">
	            	<input type="text" id="idCita" name="idCitaTHC" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Número identificador del laboratorista:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="idLabo" name="idLaboTHC" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Nombre completo del paciente:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="nombre" name="nombreTHC">
	        		</div>

                    <label class="inputInfo">Edad del paciente:</label>
	        		<div class="inputInfo">
	            	<input type="text" id="edad" name="edadTHC" pattern="\d+">
	        		</div>

                    <label class="inputInfo">Nacionalidad del paciente:</label>
	        		<div class="inputInfo">
			        <input type="text" name="nacionalidadTHC">
			        </div>

                    <label class="inputInfo">Genero del paciente:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">MASCULINO</label> <input type="radio" name="generoTHC" value="MASCULINO">
			        <label class="radioInfo">FEMENINO</label> <input type="radio" name="generoTHC" value="FEMENINO">
			        </div>

                    <label class="inputInfo">Día en el que se generó el resultado:</label>
			        <div class="inputInfo">
			        <input type="date" name="fechaTHC" id="fechaTHC">
			    	</div>

                    <label class="inputInfo">Hora en la que se generó el resultado:</label>
			    	<div class="inputInfo">
			        <input type="time" name="horaTHC" >
			    	</div>

                    <label class="inputInfo">Resultado:</label>
			    	<div class="inputInfo">
			        <label class="radioInfo">NEGATIVO</label> <input type="radio" name="resultTHC" value="NEGATIVO">
			        <label class="radioInfo">POSITIVO</label> <input type="radio" name="resultTHC" value="POSITIVO">
			        </div>

                    <label class="inputInfo">Nombre completo del laboratorista que realizó la prueba:</label>
			        <div class="inputInfo">
	            	<input type="text" id="nombreLabo" name="nombreLaboTHC">
	        		</div>

			    	<div class="enviarCita">
			    		<input type="submit" name="enviarResuTHC" value="Ingersar">
			    	</div>
  		 		</form>

    <script>
        document.getElementById('fechaTHC').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
    </script>

	<?php
	include "../templates/scriptsContent.template.php";
	?>
    
	<?php 
		include("guardar.php");
	?>
</body>
</html>