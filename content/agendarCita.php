<?php
$titulo = "Agendar Cita";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarContent.template.php";
	?>

<form class="formularios" autocomplete="off" name="citaCOVID" method="post">
				<h3>Agendar cita para prueba COVID</h3>

              <label class="inputInfo">Nombre completo:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="nombre" name="nombreCOVID">
	        		</div>

              <label class="inputInfo">Edad:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="edad" name="edadCOVID" pattern="\d+">
	        		</div>

              <label class="inputInfo">Genero:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">MASCULINO</label> <input type="radio" name="generoCOVID" value="MASCULINO">
			        <label class="radioInfo">FEMENINO</label> <input type="radio" name="generoCOVID" value="FEMENINO">
			        </div>

              <label class="inputInfo">Domicilio:</label>
			        <div class="inputInfo">
			        <input type="text" name="domicilioCOVID">
			        </div>

              <label class="inputInfo">Nacionalidad:</label>
			        <div class="inputInfo">
			        <input type="text" name="nacionalidadCOVID">
			        </div>

              <label class="inputInfo">Teléfono:</label>
			        <div class="inputInfo">
			        <input type="text" name="telefonoCOVID" pattern="\d+">
			        </div>

              <label class="inputInfo">Tipo de prueba:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">ANTIGENOS</label> <input type="radio" name="tipoPruebaCOVID" value="ANTIGENOS">
			        <label class="radioInfo">PCR</label> <input type="radio" name="tipoPruebaCOVID" value="PCR">
			        </div>

              <label class="inputInfo">Día de la cita:</label>
			        <div class="inputInfo">
			        <input type="date" name="fechaCOVID" id="date">
			    	</div>

            <label class="inputInfo">Hora de la cita:</label>
			    	<div class="inputInfo">
			        <select id="horaCOVID" name="horaCOVID">
			        	<option disabled selected>Selecciona hora</option>
			        	<optgroup label="Primer turno">
			        		<option value="07:00:00">7 a.m.</option>
			        		<option value="08:00:00">8 a.m.</option>
			        		<option value="09:00:00">9 a.m.</option>
			        		<option value="10:00:00">10 a.m.</option>
			        		<option value="11:00:00">11 a.m.</option>
			        		<option value="12:00:00">12 p.m.</option>
			        		<option value="13:00:00">1 p.m.</option>
			        	</optgroup>
			        	<optgroup label="Segundo turno">
			        		<option value="15:00:00">3 p.m.</option>
			        		<option value="16:00:00">4 p.m.</option>
			        		<option value="17:00:00">5 p.m.</option>
			        		<option value="18:00:00">6 p.m.</option>
			        		<option value="19:00:00">7 p.m.</option>
			        		<option value="20:00:00">8 p.m.</option>
			        		<option value="21:00:00">9 p.m.</option>
			        	</optgroup>
			        </select>
			    	</div>

			    	<div class="enviarCita">
			    		<input type="submit" name="enviarCOVID" value="Agendar cita">
			    	</div>

  		 		</form>

	<?php
	include "../templates/scriptsContent.template.php";
	?>

	<?php 
		include("guardar.php");
	?>

	<script>
	// Alerta de horario no disponible para agendar cita COVID
	var fechas_ocupadas = <?php echo json_encode($fechas_ocupadas); ?>;
	var fecha_input = document.getElementById("date");
	var select = document.getElementById("horaCOVID");
	var fecha_iso;

	fecha_input.min = new Date().toISOString().split("T")[0];
	fecha_input.max = "2023-12-31";

	fecha_input.addEventListener("input", function() {
    select.querySelectorAll('option').forEach(option => {
        option.disabled = false; // Habilitar todas las opciones
    });
    
    var fecha_seleccionada = new Date(this.value);
    fecha_iso = fecha_seleccionada.toISOString().slice(0, 10);
    
    fechas_ocupadas.forEach(fecha_ocupada => {
        if (fecha_ocupada.includes(fecha_iso)) {
            var hora_ocupada = fecha_ocupada.split(" ")[1];
            select.querySelectorAll('option').forEach(option => {
                if (option.value === hora_ocupada) {
                    option.disabled = true;
					}
				});
			}
		});
	});
	</script>
</body>
</html>