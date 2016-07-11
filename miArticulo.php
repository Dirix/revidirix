<?php
	include "conexion.php";
	include "lib-validarRol.php"; 
	session_start();
	login(); //Verificamos que este logueado
	
	if (isset($_GET["busqueda"]))
    $busqueda = $_GET["busqueda"];
	else
	$busqueda = "";

	if (isset($_GET["tipo"]))
    $tipo = $_GET["tipo"];
	else
	$tipo = "";

	if (isset($_GET["id_seccion"]))
    $id_seccion = $_GET["id_seccion"];
	else
	$id_seccion = "";

	if (isset($_GET["id_edicion"]))
    $id_edicion = $_GET["id_edicion"];
	else
	$id_edicion = "";

	if (isset($_GET["id_articulo"]))
    $id_articulo = $_GET["id_articulo"];
	else
	$id_articulo = "";


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
	
	
	
	
	
		<!--Aca mostramos todos los usuarios-->
		
	    <div class='col-xs-9'>
	
			<div class='panel panel-default'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
						
							<?php
							

							
							include "lib-funciones.php";
							

							$sql="select a.titulo,a.subtitulo, a.texto,a.cabecera, a.fecha_creacion fecha, id_articulo, s.nombre seccion, i.url, i.descripcion
							from seccion s join edicion e on s.edicion_id = e.id_edicion join compra c on c.edicion_id = e.id_edicion join articulo a on a.seccion_id = s.id_seccion join imagen i on a.cabecera = i.id_imagen
							where c.cliente_id = $_SESSION[id] and a.id_articulo = $id_articulo";

	
							

							$res = consultar($sql); //Realizamos la consulta
							$resultado_consulta=$res[0]; //Guardamos la tabla correspondiente a la consulta
							$codigo_de_pagina=$res[1]; //Guardamos el codigo para administrar el paginado
							
							
							
							

											
											
								while ($row = mysql_fetch_array($resultado_consulta)) {

			
																	//Mostramos el articulo
										echo "

											<div class='row'>   
												<div class='col-md-6 col-md-offset-3'>
												<h2>$row[titulo]</h2>
												<h4>$row[subtitulo]</h4>
												
												<img class='cabecera' src='$row[url]' alt='$row[descripcion]'>	
												<h5>$row[fecha]</h5>
												$row[texto];

												
												</div>
											</div> 
											
											";

							
							}					

							

							?>
														
														
														
														
														
														

						</ul>
			  
				</div>
			</div>		
		</div>
	




	
</div>
		
	


		
		
  
	</body>
	
</html>