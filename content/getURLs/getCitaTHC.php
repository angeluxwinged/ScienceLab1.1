<?php
	error_reporting(0);

	//Indica que utilizaremos la conexion con la base de datos creada en conexion.php
	include ('../../conn/conexion.php');

    $id = $conectar->real_escape_string($_POST['id']);

    $sql = "SELECT * FROM citathc WHERE idCitaTHC = $id LIMIT 1";
    $resultado = $conectar->query($sql);
    $rows = $resultado->num_rows;

    $citaTHC = [];

    if($rows > 0){
        $citaTHC = $resultado->fetch_array();
    }

    echo json_encode($citaTHC, JSON_UNESCAPED_UNICODE);

?>