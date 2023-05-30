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
            <th>ID Cita THC</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Domicilio</th>
            <th>Nacionalidad</th>
            <th>Teléfono</th>
            <th>Fecha de la Cita</th>
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
	include "eliminarModalCitaTHC.php";
	?>

    <?php
	include "editarModalCitaTHC.php";
	?>

    <script>
        // muestra la tabla citaTHC
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

            let url = "buscarCitaTHC.php";
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
			let inputEdad = editaModal.querySelector('.modal-body #edad')
			let inputGenero = editaModal.querySelector('.modal-body #genero')
			let inputDomicilio = editaModal.querySelector('.modal-body #domicilio')
			let inputNacionalidad = editaModal.querySelector('.modal-body #nacionalidad')
			let inputTelefono = editaModal.querySelector('.modal-body #telefono')
			let inputFechaCita = editaModal.querySelector('.modal-body #fechaCita')

			let url2 = "getURLs/getCitaTHC.php";
			let formDataCitaTHC = new FormData();
			formDataCitaTHC.append('id', id);

			fetch(url2, {
				method: "POST",
				body: formDataCitaTHC

			}).then(response => response.json())
			.then(data => {
				inputId.value = data.idCitaTHC
				inputNombre.value = data.nombre
				inputEdad.value = data.edad
				inputGenero.value = data.genero
				inputDomicilio.value = data.domicilio
				inputNacionalidad.value = data.nacionalidad
				inputTelefono.value = data.telefono
				inputFechaCita.value = data.fechaCita

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

        if (isset($_POST['EditarCitaTHC'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $nombre = strtoupper($nombre);
        $edad = $_POST['edad'];
        $genero = $_POST['genero'];
        $genero = strtoupper($genero);
        $domicilio = $_POST['domicilio'];
        $domicilio = strtoupper($domicilio);
        $nacionalidad = $_POST['nacionalidad'];
        $nacionalidad = strtoupper($nacionalidad);
        $telefono = $_POST['telefono'];
        $fechaCita = $_POST['fechaCita'];

        $sql = "UPDATE citaTHC SET idCitaTHC = $id, nombre = '$nombre', edad = '$edad', genero = '$genero', domicilio = '$domicilio', nacionalidad = '$nacionalidad', telefono = $telefono, fechaCita = '$fechaCita' WHERE idCitaTHC = $id";
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

        if (isset($_POST['EliminarCitaTHC'])) {
            $id = $_POST['id'];
    
            $sql = "DELETE FROM citaTHC WHERE idCitaTHC = $id";
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