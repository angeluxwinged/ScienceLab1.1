<div class="bgNav">
	<nav class="navbar navbar-dark navbar-expand-lg">
		<div class="container-fluid">
			<!-- icon -->
			<a class="navbar-brand" href="administracion.php">
				<img src="../images/logo.png" width="30px">
				Admin ScienceLab
			</a>

			<!-- collapse button menu -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElements" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>

	  		<!-- collapse elements -->
	  		<div class="collapse navbar-collapse" id="collapseElements">
	  			<ul class="navbar-nav w-100">
	  				<li class="nav-item dropdown">
	  					<a class="nav-link agendarCita agendarCita2 dropdown-toggle" role="button" id="navbarDropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="false">Ingresar Resultados</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
							<a class="dropdown-item" href="adminIngresarCOVID.php">Ingresar Resultados COVID</a>
							<a class="dropdown-item" href="adminIngresarTHC.php">Ingresar Resultados THC</a>
						</div>
	  				</li>

					<li class="nav-item dropdown">
	  					<a class="nav-link consultarResultados consultarResultados2 dropdown-toggle" role="button" id="navbarDropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="false">Gestionar Citas</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
							<a class="dropdown-item" href="adminGetCitaCOVID.php">Gestionar Citas COVID</a>
							<a class="dropdown-item" href="adminGetCitaTHC.php">Gestionar Citas THC</a>
						</div>
	  				</li>

					  <li class="nav-item dropdown">
	  					<a class="nav-link consultarResultados consultarResultados2 dropdown-toggle" role="button" id="navbarDropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">Gestionar Laboratoristas</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
							<a class="dropdown-item" href="adminGetLabo.php">Gestionar Laboratoristas</a>
							<a class="dropdown-item" href="adminAgrLabo.php">Agregar Laboratorista</a>
						</div>
	  				</li>

					  <li class="nav-item ms-auto dropdown">
	  					<a class="nav-link consultarResultados consultarResultados2 dropdown-toggle" role="button" id="navbarDropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
							<a class="dropdown-item" href="../index.php" id="cerrarSesion">Cerrar sesión administrador</a>
						</div>
	  			</li>
	  			</ul>
	  		</div>
		</div>
	</nav>
</div>

<script>
	 // Elimina localStorage usuarioScienceLab
	 document.getElementById('cerrarSesion').addEventListener('click', function() {
    localStorage.removeItem('usuarioScienceLab');
  	});

	// Muestra user en el navBar
	var usuarioScienceLab = localStorage.getItem('usuarioScienceLab');
	let usuScienceLab = document.getElementById("navbarDropdownMenuLink2");
	usuScienceLab.innerHTML = usuarioScienceLab;
</script>
