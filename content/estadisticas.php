<?php 
    include ('../conn/conexion.php');
?>

<?php
$titulo = "Estadísticas";
include "../templates/headContent.template.php";
?>

<body>
	<?php
	include "../templates/navbarContent.template.php";
	?>

	<select class="menu" id="menu">
		<optgroup label="2022">
			<option value="mascFemCOVID">Casos positivos de COVID por genero Masculinos/Femeninos</option>
			<option value="mascFemTHC">Casos positivos de THC por genero Masculinos/Femeninos </option>
			<option value="ANTPCRCOVID">Casos positivos de COVID por tipo ANTIGENOS/PCR</option>
			<option value="mayMenTHC">Casos positivos de THC por MAYORES y MENORES de edad</option>
			<option value="totalCOVID">Total de casos positivos COVID por meses</option>
			<option value="totalTHC">Total de casos positivos THC por meses</option>
		</optgroup>
        <optgroup label="2023">
			<option value="v2mascFemCOVID">Casos positivos de COVID por genero Masculinos/Femeninos</option>
			<option value="v2mascFemTHC">Casos positivos de THC por genero Masculinos/Femeninos </option>
			<option value="v2ANTPCRCOVID">Casos positivos de COVID por tipo ANTIGENOS/PCR</option>
			<option value="v2mayMenTHC">Casos positivos de THC por MAYORES y MENORES de edad</option>
			<option value="v2totalCOVID">Total de casos positivos COVID por meses</option>
			<option value="v2totalTHC">Total de casos positivos THC por meses</option>
		</optgroup>
	</select>

    <!-- 2022 -->
	<!--Grafica de casos positivos de COVID comparando masculinos y femeninos-->
	<div id="mascFemCOVID" style="display:block" class="graficas">
        <canvas id="chartMascFemCOVID"></canvas>
    </div>
    
	<!--Grafica de casos positivos de THC comparando masculinos y femeninos-->
    <div id="mascFemTHC" style="display:none" class="graficas">
    	<canvas id="chartMascFemTHC"></canvas>
	</div>

   <!--Grafica de casos positivos de COVID comparando tipo de prueba antigenos y PCR-->
   <div id="ANTPCRCOVID" style="display:none" class="graficas">
        <canvas id="chartANTPCRCOVID"></canvas>
    </div>

	<!--Grafica de casos positivos de THC comparando mayores y menores de edad-->
    <div id="mayMenTHC" style="display:none" class="graficas">
        <canvas id="chartMayMenTHC"></canvas>
    </div>

	<!--Grafica de casos positivos de COVID comparando casos totales-->
	<div id="totalCOVID" style="display:none" class="graficas">
        <canvas id="chartTotalCOVID"></canvas>
	</div>
                <!--Grafica de casos positivos de THC comparando casos totales-->
    <div id="totalTHC" style="display:none" class="graficas">
        <canvas id="chartTotalTHC"></canvas>
    </div>

    <!-- 2023 -->
    <!--Grafica de casos positivos de COVID comparando masculinos y femeninos-->
	<div id="v2mascFemCOVID" style="display:none" class="graficas">
        <canvas id="v2chartMascFemCOVID"></canvas>
    </div>
    
	<!--Grafica de casos positivos de THC comparando masculinos y femeninos-->
    <div id="v2mascFemTHC" style="display:none" class="graficas">
    	<canvas id="v2chartMascFemTHC"></canvas>
	</div>

   <!--Grafica de casos positivos de COVID comparando tipo de prueba antigenos y PCR-->
   <div id="v2ANTPCRCOVID" style="display:none" class="graficas">
        <canvas id="v2chartANTPCRCOVID"></canvas>
    </div>

	<!--Grafica de casos positivos de THC comparando mayores y menores de edad-->
    <div id="v2mayMenTHC" style="display:none" class="graficas">
        <canvas id="v2chartMayMenTHC"></canvas>
    </div>

	<!--Grafica de casos positivos de COVID comparando casos totales-->
	<div id="v2totalCOVID" style="display:none" class="graficas">
        <canvas id="v2chartTotalCOVID"></canvas>
	</div>
                <!--Grafica de casos positivos de THC comparando casos totales-->
    <div id="v2totalTHC" style="display:none" class="graficas">
        <canvas id="v2chartTotalTHC"></canvas>
    </div>

	<!-- Construccion de la grafica de casos positivos de COVID comparando masculinos y femeninos -->
	<script>
		var menu = document.getElementById("menu");

		// Obtener los elementos que queremos mostrar y ocultar
		var mascFemCOVID = document.getElementById("mascFemCOVID");
		var mascFemTHC = document.getElementById("mascFemTHC");
		var ANTPCRCOVID = document.getElementById("ANTPCRCOVID");
		var mayMenTHC = document.getElementById("mayMenTHC");
		var totalCOVID = document.getElementById("totalCOVID");
		var totalTHC = document.getElementById("totalTHC");
        var v2mascFemCOVID = document.getElementById("v2mascFemCOVID");
		var v2mascFemTHC = document.getElementById("v2mascFemTHC");
		var v2ANTPCRCOVID = document.getElementById("v2ANTPCRCOVID");
		var v2mayMenTHC = document.getElementById("v2mayMenTHC");
		var v2totalCOVID = document.getElementById("v2totalCOVID");
		var v2totalTHC = document.getElementById("v2totalTHC");

		// Agregar un evento de cambio al menú desplegable
		menu.addEventListener("change", function() {
		// Ocultar todos los elementos
		mascFemCOVID.style.display = "none";
		mascFemTHC.style.display = "none";
		ANTPCRCOVID.style.display = "none";
		mayMenTHC.style.display = "none";
		totalCOVID.style.display = "none";
		totalTHC.style.display = "none";
        v2mascFemCOVID.style.display = "none";
		v2mascFemTHC.style.display = "none";
		v2ANTPCRCOVID.style.display = "none";
		v2mayMenTHC.style.display = "none";
		v2totalCOVID.style.display = "none";
		v2totalTHC.style.display = "none";

		// Mostrar el elemento seleccionado
		var selected = menu.value;
		document.getElementById(selected).style.display = "block";
		});

        // 2022
        var ctx= document.getElementById("chartMascFemCOVID").getContext("2d");
        var chartMascFemCOVID= new Chart(ctx,{
            type:"bar",
             data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Maculinos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["masculino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)'
                        ]
                },
                {
                        label:'Femeninos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["femenino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("chartMascFemTHC").getContext("2d");
        var chartMascFemTHC= new Chart(ctx,{
            type:"bar",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Maculinos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["masculino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)'
                        ]
                },
                {
                        label:'Femeninos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["femenino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("chartANTPCRCOVID").getContext("2d");
        var chartANTPCRCOVID = new Chart(ctx,{
            type:"bar",
             data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Antigenos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["antigenos"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)'
                        ]
                },
                {
                        label:'PCR',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["PCR"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("chartMayMenTHC").getContext("2d");
        var chartMayMenTHC = new Chart(ctx,{
            type:"bar",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Mayores',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["mayor"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)'
                        ]
                },
                {
                        label:'Menores',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["menor"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("chartTotalCOVID").getContext("2d");
        var chartTotalCOVID= new Chart(ctx,{
            type:"pie",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["total"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(213, 0, 0,0.9)','rgb(136, 14, 79,0.9)','rgb(123, 31, 162,0.9)','rgb(49, 27, 146,0.9)','rgb(83, 109, 254,0.9)','rgb(0, 121, 107,0.9)','rgb(104, 159, 56,0.9)','rgb(238, 255, 65,0.9)','rgb(245, 127, 23,0.9)','rgb(93, 64, 55,0.9)','rgb(97, 97, 97,0.9)','rgb(0,0,0,0.9)'
                        ]
                }]
            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: "none"
                            }
                    }]
                }
            }
        });
		
		//Construccion de la grafica de casos positivos de THC comparando casos totales
        var ctx= document.getElementById("chartTotalTHC").getContext("2d");
        var chartTotalTHC= new Chart(ctx,{
            type:"pie",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2022";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2022";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["total"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(213, 0, 0,0.9)','rgb(136, 14, 79,0.9)','rgb(123, 31, 162,0.9)','rgb(49, 27, 146,0.9)','rgb(83, 109, 254,0.9)','rgb(0, 121, 107,0.9)','rgb(104, 159, 56,0.9)','rgb(238, 255, 65,0.9)','rgb(245, 127, 23,0.9)','rgb(93, 64, 55,0.9)','rgb(97, 97, 97,0.9)','rgb(0,0,0,0.9)'
                        ]
                }]
            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: "none"
                            }
                    }]
                }
            }
        });

         // 2023
         var ctx= document.getElementById("v2chartMascFemCOVID").getContext("2d");
        var chartMascFemCOVID= new Chart(ctx,{
            type:"bar",
             data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Maculinos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["masculino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)'
                        ]
                },
                {
                        label:'Femeninos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["femenino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("v2chartMascFemTHC").getContext("2d");
        var chartMascFemTHC= new Chart(ctx,{
            type:"bar",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Maculinos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["masculino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)','rgb(82, 88, 255,0.9)'
                        ]
                },
                {
                        label:'Femeninos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["femenino"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)','rgb(255, 82, 118,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("v2chartANTPCRCOVID").getContext("2d");
        var chartANTPCRCOVID = new Chart(ctx,{
            type:"bar",
             data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Antigenos',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["antigenos"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)','rgb(234, 49, 49,0.9)'
                        ]
                },
                {
                        label:'PCR',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["PCR"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)','rgb(49, 234, 94,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("v2chartMayMenTHC").getContext("2d");
        var chartMayMenTHC = new Chart(ctx,{
            type:"bar",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        label:'Mayores',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["mayor"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)','rgb(77,34,97,0.9)'
                        ]
                },
                {
                        label:'Menores',
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["menor"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)','rgb(231,132,18,0.9)'
                        ]
                }
                ]

            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16,
					fontStyle: "bold"
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: 1,
								fontStyle: "bold"
                            }
                    }],
                    xAxes: [{
                            ticks: {
                                fontColor: "black",
                                fontSize: 14,
                                beginAtZero: true,
                                stepSize: 1,
								fontStyle: "bold"
                    }
                }]
                }
            }
        });

		var ctx= document.getElementById("v2chartTotalCOVID").getContext("2d");
        var chartTotalCOVID= new Chart(ctx,{
            type:"pie",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivoscovid2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["total"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(213, 0, 0,0.9)','rgb(136, 14, 79,0.9)','rgb(123, 31, 162,0.9)','rgb(49, 27, 146,0.9)','rgb(83, 109, 254,0.9)','rgb(0, 121, 107,0.9)','rgb(104, 159, 56,0.9)','rgb(238, 255, 65,0.9)','rgb(245, 127, 23,0.9)','rgb(93, 64, 55,0.9)','rgb(97, 97, 97,0.9)','rgb(0,0,0,0.9)'
                        ]
                }]
            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: "none"
                            }
                    }]
                }
            }
        });
		
		//Construccion de la grafica de casos positivos de THC comparando casos totales
        var ctx= document.getElementById("v2chartTotalTHC").getContext("2d");
        var chartTotalTHC= new Chart(ctx,{
            type:"pie",
            data:{
                labels:[
                <?php  
                $sql = "SELECT * FROM positivoscovid2023";
                $resultado = mysqli_query($conectar, $sql);
                while($registros = mysqli_fetch_array($resultado)){

                    ?>
                    '<?php echo $registros["mes"] ?>',
                    <?php
                }
                ?>
                ],
                datasets:[{
                        data:[
                        <?php  
                        $sql = "SELECT * FROM positivosthc2023";
                        $resultado = mysqli_query($conectar, $sql);
                        while($registros = mysqli_fetch_array($resultado)){

                        ?>
                        '<?php echo $registros["total"] ?>',
                        <?php
                }
                ?>
                        ],
                        backgroundColor:[
                            'rgb(213, 0, 0,0.9)','rgb(136, 14, 79,0.9)','rgb(123, 31, 162,0.9)','rgb(49, 27, 146,0.9)','rgb(83, 109, 254,0.9)','rgb(0, 121, 107,0.9)','rgb(104, 159, 56,0.9)','rgb(238, 255, 65,0.9)','rgb(245, 127, 23,0.9)','rgb(93, 64, 55,0.9)','rgb(97, 97, 97,0.9)','rgb(0,0,0,0.9)'
                        ]
                }]
            },
            options:{
                legend: {
                labels: {
                    fontColor: "black",
                    fontSize: 16
                }
            },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true,
                                fontColor: "black",
                                fontSize: 14,
                                stepSize: "none"
                            }
                    }]
                }
            }
        });
    </script>

	<?php
	include "../templates/scriptsContent.template.php";
	?>
</body>
</html>