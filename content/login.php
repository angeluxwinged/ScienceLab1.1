<?php
$titulo = "LogIn";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarContent.template.php";
	?>

    <form class="login" autocomplete="off" name="login" method="post">
				<h3>Acceso de administración</h3>

                <!-- <label class="inputInfo">Usuario administrador:</label> -->
	       		<div class="inputInfo">
	            	<input type="text" id="nombreAdmin" name="nombreAdmin" placeholder="Usuario administrador">
	        	</div>

                <!-- <label class="inputInfo">Contraseña:</label> -->
	       		<div class="inputInfo">
	            	<input type="password" id="claveAdmin" name="claveAdmin" placeholder="Contraseña">
	        	</div>    

		   	<div class="enviarCita">
	    		<input type="submit" name="enviarLogin" value="IDENTIFICARSE">
			</div>

  	</form>

    <?php 
	//Indica que utilizaremos la conexion con la base de datos creada en conexion.php
	include ('../conn/conexion.php');

	//esta condicional se ejecuta cuando el boton submit 'enviarLogin' es oprimido
	if (isset($_POST['enviarLogin'])) {

	//Datos a introducir por el laboratorista
	$nombreAdmin = $_POST['nombreAdmin'];
	$claveAdmin = $_POST['claveAdmin'];

	if (strlen($nombreAdmin) >= 1 && strlen($claveAdmin) >= 1) {

	$consulta = "SELECT * FROM laboratorista";
	$resultado = mysqli_query($conectar, $consulta);
	if($resultado){
		//Introduce los resultados de la consulta en variables
		while($row = $resultado->fetch_array()){
			$usuario = $row['usuario'];
			$clave = $row['clave'];

			if ($usuario == $nombreAdmin && $clave == $claveAdmin) {

				//Redirecciona al usuario a la pagina de administrador
                ?><script>
                var nombreAdmin = "<?php echo $nombreAdmin; ?>";
                localStorage.clear();
                localStorage.setItem("usuarioScienceLab", nombreAdmin);
                location.href ='administracion.php';
                </script>
                <?php
			}
            
	}if ($usuario != $nombreAdmin && $clave != $claveAdmin) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Algo salió mal',
            text: 'Verifica que el usuario o contraseña introducidos son correctos.'
            })
            </script>";
    }
	}}else{//Muestra al usuario un mensaje notificandole que ha habido un error al introducir los datos
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Algo salió mal',
            text: 'Verifica que el usuario o contraseña introducidos son correctos.'
            })
            </script>";
        }
    }
    ?>

	<?php
	include "../templates/scriptsContent.template.php";
	?>
</body>
</html>