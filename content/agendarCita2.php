<?php
$titulo = "Agendar Cita";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarContent.template.php";
	?>

<form class="formularios" autocomplete="off" name="citaTHC" method="post">
				<h3>Agendar cita para prueba THC</h3>

              <label class="inputInfo">Nombre completo:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="nombre" name="nombreTHC">
	        		</div>

              <label class="inputInfo">Edad:</label>
	       			<div class="inputInfo">
	            	<input type="text" id="edad" name="edadTHC" pattern="\d+">
	        		</div>

              <label class="inputInfo">Genero:</label>
			        <div class="inputInfo">
			        <label class="radioInfo">MASCULINO</label> <input type="radio" name="generoTHC" value="MASCULINO">
			        <label class="radioInfo">FEMENINO</label> <input type="radio" name="generoTHC" value="FEMENINO">
			        </div>

              <label class="inputInfo">Domicilio:</label>
			        <div class="inputInfo">
			        <input type="text" name="domicilioTHC">
			        </div>

              <label class="inputInfo">Nacionalidad:</label>
			        <div class="inputInfo">
			        <input type="text" name="nacionalidadTHC">
			        </div>

              <label class="inputInfo">Teléfono:</label>
			        <div class="inputInfo">
			        <input type="text" name="telefonoTHC" pattern="\d+">
			        </div>

              <label class="inputInfo">Día de la cita:</label>
			        <div class="inputInfo">
			        <input type="date" name="fechaTHC" id="date2">
			    	</div>

            <label class="inputInfo">Hora de la cita:</label>
			    	<div class="inputInfo">
			        <select id="horaTHC" name="horaTHC">
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
			    		<input type="submit" name="enviarTHC" value="Agendar cita">
			    	</div>

  		 		</form>

	
	<?php
	include "../templates/scriptsContent.template.php";
	?>
	
	<?php 
	include("guardar.php");
	?>

	<script>
	// Alerta de horario no disponible para agendar cita THC
	var fechas_ocupadas2 = <?php echo json_encode($fechas_ocupadas2); ?>;
	var fecha_input2 = document.getElementById("date2");
	var select2 = document.getElementById("horaTHC");
	var fecha_iso2;

	fecha_input2.min = new Date().toISOString().split("T")[0];
	fecha_input2.max = "2023-12-31";

	fecha_input2.addEventListener("input", function() {
    select2.querySelectorAll('option').forEach(option => {
        option.disabled = false; // Habilitar todas las opciones
    });
    
    var fecha_seleccionada2 = new Date(this.value);
    fecha_iso2 = fecha_seleccionada2.toISOString().slice(0, 10);
    
    fechas_ocupadas2.forEach(fecha_ocupada2 => {
        if (fecha_ocupada2.includes(fecha_iso2)) {
            var hora_ocupada2 = fecha_ocupada2.split(" ")[1];
            select2.querySelectorAll('option').forEach(option => {
                if (option.value === hora_ocupada2) {
                    option.disabled = true;
					}
				});
			}
		});
	});
	</script>
</body>
</html>