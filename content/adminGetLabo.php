<?php
$titulo = "Administración";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarAdmin.template.php";
	?>

    <div class="buscadorLabo">
        <label for="num_registros">Mostrar</label>
        <select name="num_registros" id="num_registros">
           <option value="10">10</option>
           <option value="25">25</option>
           <option value="50">50</option>
        </select>
        <label for="num_registros">registros</label>

        <form action="" method="post">
            <label for="campo">Buscar por Nombre o ID:</label>
            <input type="text" name="campo" id="campo" type="text">
        </form>
    </div>

    <div class="tablaLabo table-responsive">
    <table class="table table-bordered table-sm">
        <thead class="table-active">
            <th>ID del laboratorista</th>
            <th>Nombre</th>
            <th>Fecha de nacimiento</th>
            <th>Genero</th>
            <th>Domicilio</th>
            <th>Nacionalidad</th>
            <th>Teléfono</th>
            <th>CURP</th>
            <th>RFC</th>
            <th>NSS</th>
            <th>Usuario</th>
            <th>Clave</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </thead>

            <tbody id="tbodyContent">
            </tbody>
    </table>

    <div class="row sas">
        <div class="col-6">
            <label id="totalReg"></label>
        </div>

        <div class="col-6 listaPaginacion" id="nav-paginacion"></div>
    </div>
    </div>

    <?php
	include "eliminarModalLabo.php";
	?>

    <?php
	include "editarModalLabo.php";
	?>

    <script>
        // muestra la tabla laboratorista
        let paginaActual = 1;

        getData(paginaActual);

        document.getElementById("campo").addEventListener("keyup", function(){
            getData(1)
        }, false);
        document.getElementById("num_registros").addEventListener("change", function(){
            getData(paginaActual)
        }, false);

        function getData(pagina){
            let input = document.getElementById("campo").value;
            let num_registros = document.getElementById("num_registros").value;
            let content = document.getElementById("tbodyContent");

            if(pagina != null){
                paginaActual = pagina
            }

            let url = "buscarLabo.php";
            let formData = new FormData();
            formData.append('campo', input);
            formData.append('registros', num_registros);
            formData.append('pagina', paginaActual);

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                tbodyContent.innerHTML = data.data
                document.getElementById("totalReg").innerHTML = 'Mostrando ' + data.totalFiltro + ' de' +  data.totalRegistros + ' registros'
                document.getElementById("nav-paginacion").innerHTML = data.paginacion
            }).catch(err => console.log(err))
        }
    </script>

    <script>
	 // edita los registros con el modal
	 let editaModal = document.getElementById("editaModal");
     let eliminaModal = document.getElementById("eliminaModal");

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

			let inputId = editaModal.querySelector('.modal-body #id')
			let inputNombre = editaModal.querySelector('.modal-body #nombre')
			let inputFechaNacimiento = editaModal.querySelector('.modal-body #fechaNacimiento')
			let inputGenero = editaModal.querySelector('.modal-body #genero')
			let inputDomicilio = editaModal.querySelector('.modal-body #domicilio')
			let inputNacionalidad = editaModal.querySelector('.modal-body #nacionalidad')
			let inputTelefono = editaModal.querySelector('.modal-body #telefono')
			let inputCURP = editaModal.querySelector('.modal-body #CURP')
			let inputRFC = editaModal.querySelector('.modal-body #RFC')
			let inputNSS = editaModal.querySelector('.modal-body #NSS')
			let inputNombreUsuario = editaModal.querySelector('.modal-body #nombreUsuario')
			let inputClave = editaModal.querySelector('.modal-body #clave')

			let url2 = "getURLs/getLaboratorista.php";
			let formDataLabo = new FormData();
			formDataLabo.append('id', id);

			fetch(url2, {
				method: "POST",
				body: formDataLabo

			}).then(response => response.json())
			.then(data => {
				inputId.value = data.idLaboratorista
				inputNombre.value = data.nombre
				inputFechaNacimiento.value = data.fechaNacimiento
				inputGenero.value = data.genero
				inputDomicilio.value = data.domicilio
				inputNacionalidad.value = data.nacionalidad
				inputTelefono.value = data.telefono
				inputCURP.value = data.CURP
				inputRFC.value = data.RFC
				inputNSS.value = data.NSS
				inputNombreUsuario.value = data.usuario
				inputClave.value = data.clave

			}).catch(err => console.log(err))
        })

        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            eliminaModal.querySelector('.modal-footer #id').value = id
        })
    </script>

    <?php
        error_reporting(0);

        //Indica que utilizaremos la conexion con la base de datos creada en conexion.php
        include ('../conn/conexion.php');

        if (isset($_POST['EditarLabo'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $nombre = strtoupper($nombre);
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $genero = $_POST['genero'];
        $genero = strtoupper($genero);
        $domicilio = $_POST['domicilio'];
        $domicilio = strtoupper($domicilio);
        $nacionalidad = $_POST['nacionalidad'];
        $nacionalidad = strtoupper($nacionalidad);
        $telefono = $_POST['telefono'];
        $CURP = $_POST['CURP'];
        $CURP = strtoupper($CURP);
        $RFC = $_POST['RFC'];
        $RFC = strtoupper($RFC);
        $NSS = $_POST['NSS'];
        $NSS = strtoupper($NSS);
        $usuario = $_POST['nombreUsuario'];
        $clave = $_POST['clave'];

        $sql = "UPDATE laboratorista SET idLaboratorista = $id, nombre = '$nombre', fechaNacimiento = '$fechaNacimiento', genero = '$genero', domicilio = '$domicilio', nacionalidad = '$nacionalidad', telefono = $telefono, CURP = '$CURP', RFC = '$RFC', NSS = $NSS, usuario = '$usuario', clave = '$clave' WHERE idLaboratorista = $id";
        if ($conectar->query($sql) === TRUE) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registros actualizados correctamente'
                })
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Algo salió mal',
                text: 'Ocurrio un error al momento de guardar lo datos. Verifica que los datos a modificar son correctos.'
                })
                </script>";
        }
        }

        if (isset($_POST['EliminarLabo'])) {
            $id = $_POST['id'];
    
            $sql = "DELETE FROM laboratorista WHERE idLaboratorista = $id";
            if ($conectar->query($sql) === TRUE) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Registros eliminado correctamente'
                    })
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Algo salió mal',
                    text: 'Ocurrio un error inesperado. Vuelve a intentarlo mas tarde.'
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