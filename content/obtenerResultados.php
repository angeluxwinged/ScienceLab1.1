<?php 
	//Indica que utilizaremos la conexion con la base de datos creada en conexion.php
	include ('../conn/conexion.php');

	//Obtiene el id de la tabla resultpruebacovid
	$rs = mysqli_query($conectar, "SELECT MAX(idResultPruebaCOVID) AS id FROM resultpruebacovid");
	if ($row = mysqli_fetch_row($rs)) {
	$idCOVID = trim($row[0]);
	}

	//Obtiene el id de la tabla resultpruebacovid
	$rs2 = mysqli_query($conectar, "SELECT MAX(idResultPruebaTHC) AS id FROM resultpruebathc");
	if ($row = mysqli_fetch_row($rs2)) {
	$idTHC = trim($row[0]);
	}

	//Esta condicional se ejecuta cuando el boton submit 'buscConsultaCOVID' es oprimido
	if (isset($_POST['buscConsultaCOVID'])) {

	//Variable id introducido por el usuario
	$idConsultaCOVID = $_POST['escConsultaCOVID'];

	if (strlen($idConsultaCOVID) >= 1 && $idConsultaCOVID <= $idCOVID && $idConsultaCOVID > 0) {

	//Consulta de los datos de la base de datos mediante el id introducido por el usuario
	$consulta = "SELECT * FROM resultpruebacovid WHERE idResultPruebaCOVID = ".$idConsultaCOVID;
	$resultado = mysqli_query($conectar, $consulta);
	if($resultado){
		//Introduce los resultados de la consulta en variables
		while($row = $resultado->fetch_array()){
			$nombre = $row['nombre'];
			$edad = $row['edad'];
			$nacionalidad = $row['nacionalidad'];
			$tipoPrueba = $row['tipoPrueba'];
			$genero = $row['genero'];
			$result = $row['resultado'];
			$laboratoristaNombre = $row['laboratoristaNombre'];

			//Muestra al usuario los datos recolectados en base al id que ha introducido
			echo "<script>
			Swal.fire({
				title: 'Consulta realizada',
				html: 'Paciente: ".$nombre.". <br>Edad: ".$edad." Años. <br>Nacionalidad: ".$nacionalidad.". <br>Tipo de prueba: ".$tipoPrueba.". <br>Genero: ".$genero.". <br>La prueba ha rezultado: ".$result.". <br>Atendido por el laboratorista: ".$laboratoristaNombre.".'
				})
			</script>";			
	}
	}}else{//Muestra al usuario que ha habido un error al introducir el numero proporcionado por el laboratorio
	echo "<script>
	Swal.fire({
		icon: 'error',
		title: 'Algo salió mal',
		text: 'Verifica que has introducido correctamente el número proporcionado por el laboratorio.'
		})
		</script>";
	}	
}



	//Esta condicional se ejecuta cuando el boton submit 'buscConsultaTHC' es oprimido
	if (isset($_POST['buscConsultaTHC'])) {

	//Variable id introducido por el usuario
	$idConsultaTHC = $_POST['escConsultaTHC'];

	if (strlen($idConsultaTHC) >= 1 && $idConsultaTHC <= $idTHC && $idConsultaTHC > 0) {

	//Consulta de los datos de la base de datos mediante el id introducido por el usuario
	$consulta2 = "SELECT * FROM resultpruebathc WHERE idResultPruebaTHC = ".$idConsultaTHC;
	$resultado2 = mysqli_query($conectar, $consulta2);
	if($resultado2){
		//Introduce los resultados de la consulta en variables
		while($row = $resultado2->fetch_array()){
			$nombre = $row['nombre'];
			$edad = $row['edad'];
			$nacionalidad = $row['nacionalidad'];
			$genero = $row['genero'];
			$result = $row['resultado'];
			$laboratoristaNombre = $row['laboratoristaNombre'];

			//Muestra al usuario los datos recolectados en base al id que ha introducido
			echo "<script>
			Swal.fire({
				title: 'Consulta realizada',
				html: 'Paciente: ".$nombre.". <br>Edad: ".$edad." Años. <br>Nacionalidad: ".$nacionalidad.". <br>Genero: ".$genero.". <br>La prueba ha rezultado: ".$result.". <br>Atendido por el laboratorista: ".$laboratoristaNombre.".'
				})
			</script>";
			}
	}}else{//Muestra al usuario que ha habido un error al introducir el numero proporcionado por el laboratorio
	echo "<script>
	Swal.fire({
		icon: 'error',
		title: 'Algo salió mal',
		text: 'Verifica que has introducido correctamente el número proporcionado por el laboratorio.'
		})
		</script>";
	}	
}
 ?>

