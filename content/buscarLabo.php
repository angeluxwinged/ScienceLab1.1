<?php
	error_reporting(0);

	//Indica que utilizaremos la conexion con la base de datos creada en conexion.php
	include ('../conn/conexion.php');

	$columns = ["idLaboratorista", "nombre", "fechaNacimiento", "genero", "domicilio", "nacionalidad", "telefono", "CURP", "RFC", "NSS", "usuario", "clave"];
	$columnsW = ["idLaboratorista", "nombre"];
	$table = "laboratorista";
	$id = 'idLaboratorista';

	$campo = isset($_POST['campo']) ? $conectar->real_escape_string($_POST['campo']) : null;

	$where = "";

	if($campo != null){
		$where = "WHERE (";

		$cont = count($columnsW);
		for($i=0; $i < $cont; $i++){
			$where .= $columnsW[$i] . " LIKE '%" . $campo . "%' OR ";
		}
		$where = substr_replace($where, "", -3);
		$where .= ")";
	}

	$limit = isset($_POST['registros']) ? $conectar->real_escape_string($_POST['registros']) : 10;
	$pagina = isset($_POST['pagina']) ? $conectar->real_escape_string($_POST['pagina']) : 0;
	if(!$pagina){
		$inicio = 0;
		$pagina = 1;
	}else{
		$inicio = ($pagina - 1) * $limit; 
	}
	$sLimit = "LIMIT $inicio ,  $limit";

	$sql = "SELECT SQL_CALC_FOUND_ROWS ". implode(", ", $columns) . " FROM $table $where $sLimit";
	$resultado = $conectar->query($sql);
	$num_rows = $resultado->num_rows;

	// filtra total de registros
	$sqlFiltro = "SELECT FOUND_ROWS()";
	$restFiltro = $conectar->query($sqlFiltro);
	$row_filtro = $restFiltro->fetch_array();
	$totalFiltro = $row_filtro[0];

		// filtra total de registros
		$sqlTotal = "SELECT count($id) FROM $table ";
		$restTotal = $conectar->query($sqlTotal);
		$row_total = $restTotal->fetch_array();
		$totalRegistros = $row_total[0];

	$output = [];
	$output['totalRegistros'] = $totalRegistros;
	$output['totalFiltro'] = $totalFiltro;
	$output['data'] = '';
	$output['paginacion'] = '';

	if($num_rows > 0){
		while($row = $resultado->fetch_assoc()){
			$output['data'] .= "<tr>";
			$output['data'] .= "<td>".$row["idLaboratorista"]."</td>";
			$output['data'] .= "<td>".$row["nombre"]."</td>";
			$output['data'] .= "<td>".$row["fechaNacimiento"]."</td>";
			$output['data'] .= "<td>".$row["genero"]."</td>";
			$output['data'] .= "<td>".$row["domicilio"]."</td>";
			$output['data'] .= "<td>".$row["nacionalidad"]."</td>";
			$output['data'] .= "<td>".$row["telefono"]."</td>";
			$output['data'] .= "<td>".$row["CURP"]."</td>";
			$output['data'] .= "<td>".$row["RFC"]."</td>";
			$output['data'] .= "<td>".$row["NSS"]."</td>";
			$output['data'] .= "<td>".$row["usuario"]."</td>";
			$output['data'] .= "<td>".$row["clave"]."</td>";
			$output['data'] .= "<td><a style='text-decoration: none; color: #000; border: 1px solid #414141; background-color: #dcbaff;' href='' data-bs-toggle='modal' data-bs-target='#editaModal' data-bs-id='" . $row["idLaboratorista"] . "'>Editar</a></td>";
			$output['data'] .= "<td><a style='text-decoration: none; color: #000; border: 1px solid #414141; background-color: #dc3545;' href='' data-bs-toggle='modal' data-bs-target='#eliminaModal' data-bs-id='" . $row["idLaboratorista"] . "'>Eliminar</a></td>";
			$output['data'] .= "</tr>";
		}
	}else{
		$output['data'] .= "<tr>";
		$output['data'] .= "<td colspan='14'>Sin resultados</td>";
		$output['data'] .= "</tr>";
	}

	if($output['totalRegistros'] > 0){
		$totalPaginas = ceil($output['totalRegistros'] / $limit);

		$output['paginacion'] .= '<nav>';
		$output['paginacion'] .= '<ul class="list-group list-group-horizontal paginacion">';

		$numeroInicio = 1;

		if(($pagina - 4) > 1){
			$numeroInicio = $pagina - 4;
		}

		$numeroFin = $numeroInicio + 9;

		if($numeroFin> $totalPaginas){
			$numeroFin = $totalPaginas;
		}

		for($i = $numeroInicio; $i <= $numeroFin; $i++){
			if($pagina == $i){
				$output['paginacion'] .= '<li class="active list-group-item"><a class="page-link" href="#">' . $i . '</a></li>';
			}else{
				$output['paginacion'] .= '<li class="list-group-item"><a class="page-link" href="#" onClick="getData(' . $i . ')">' . $i . '</a></li>';
			}
		}

		$output['paginacion'] .= '</ul>';
		$output['paginacion'] .= '</nav>';
	}

	echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>