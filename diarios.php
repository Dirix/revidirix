<?php
	include "conexion.php";
	include "lib-funciones.php";
	session_start();
	if (isset($_GET["busqueda"]))
    $busqueda = $_GET["busqueda"];
	else
	$busqueda = "";
?>
<html>
	
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Pagina Revista</title>
	  <link href="css/bootstrap.css" rel="stylesheet">
	  <link href="css/main.css" rel="stylesheet">
	  <link href="css/propios.css" rel="stylesheet">
	  <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php
		//Insertamos el menu de navegacion
		include "lib-menu.php";
		
			?>

<div class="container">

	<?php			

	include "lib-menuLeft.php"; //Cargamos el menu izquierdo dependiendo del tipo de usuario logueado
		
		?>
		
  

						<div class="panel-body">
							<div class="panel2">
                          
										
								<?php
								//Hacemos una consulta a la base de datos para saber todas las publicaciones que hay
									$sql="select id_publicacion, p.descripcion descripcion_publicacion, i.descripcion descripcion_imagen, nombre, tipo_publicacion, url from publicacion p join imagen i on p.imagen_id = i.id_imagen where p.nombre like '%$busqueda%' and p.tipo_publicacion like 'diario' and p.estado like 'publicado'";
									//$sql="SELECT id_cliente, login, nombre, apellido, telefono FROM cliente where login like '%$busqueda%'"; //Escribimos la consulta
									$res = consultar($sql); //Realizamos la consulta
									$resultado_consulta=$res[0]; //Guardamos la tabla correspondiente a la consulta
									$codigo_de_pagina=$res[1]; //Guardamos el codigo para administrar el paginado
										
									while ($row = mysql_fetch_array($resultado_consulta)) {
								
										//Mostramos las publicaciones
										echo "

											<div class='row'>   
												<div class='col-md-6 col-md-offset-3'>
												<h3>$row[nombre]</h3>
												<img class='portada' src='$row[url]' alt='$row[descripcion_imagen]'>	
												
												<p class='portada'>$row[descripcion_publicacion]</p>
												<button class='btn btn-success btn-lg' onClick=location.href='publicacion.php?id_publicacion=$row[id_publicacion]'>Ver diario</button>
												</div>
											</div> 
								
								
								";
							
								}
								
							//Mostramos el menu para cambiar de pagina
							echo "
							

							<div class='row'>   
								<div class='col-md-6 col-md-offset-3'>
								$codigo_de_pagina
								</div>
							</div>
							";

										
										?>
										
       
							</div>      
						</div>


  
  
										
										
</div>



  
	</body>
	
</html>