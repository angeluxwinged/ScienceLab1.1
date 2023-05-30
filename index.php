<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>ScienceLab</title>
</head>

<body>
<div class="bgNav">
	<nav class="navbar navbar-dark navbar-expand-lg">
		<div class="container-fluid">
			<!-- icon -->
			<a class="navbar-brand" href="index.php">
				<img src="images/logo.png" width="30px">
				ScienceLab
			</a>

			<!-- collapse button menu -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElements" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>

	  		<!-- collapse elements -->
	  		<div class="collapse navbar-collapse" id="collapseElements">
	  			<ul class="navbar-nav me-auto">
				  	<li class="nav-item dropdown">
	  					<a class="nav-link dropdown-toggle" role="button" href="agendarCita.php" href="agendarCita2.php" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Agendar Cita</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="content/agendarCita.php">Agendar Cita COVID</a>
							<a class="dropdown-item" href="content/agendarCita2.php">Agendar Cita THC</a>
						</div>
	  				</li>

	  				<li class="nav-item dropdown">
	  					<a class="nav-link consultarResultados consultarResultados2 dropdown-toggle" role="button" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Consultar Resultados</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="content/consultarResultados.php">Consultar Resultados COVID</a>
							<a class="dropdown-item" href="content/consultarResultados2.php">Consultar Resultados THC</a>
						</div>
	  				</li>

	  				<li class="nav-item">
	  					<a class="nav-link" href="content/estadisticas.php">Estadísticas</a>
	  				</li>
	  			</ul>
				
				<div class="admin">
				<a href="content/login.php">
					<img src="images/admin.png" width="20px">
				</a>
				</div>
	  		</div>
		</div>
	</nav>
</div>

	<div class="indexContent">
		<div>
			<h2>ScienceLab es un laboratorio especializado en pruebas de antígenos para la detección de COVID-19 y pruebas de tetrahidrocannabinol (THC)</h2>
			<p>Agenda una cita via telefonica o por WhatsApp a nuestro número <span style="font-size: 18px">612-123-4567</span> o mediante la página web dando click en el botón de abajo</p>
			<form action="content/agendarCita.php">
			<input type="submit" name="botonAgendarCita" value="AGENDAR CITA">
			</form>	
		</div>
		<img src="images/laboo.png" width="570px">
	</div>
	

	
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>