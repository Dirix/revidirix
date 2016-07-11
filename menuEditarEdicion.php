<?php
	include "conexion.php"; 		
	include "lib-validarRol.php"; 
	session_start();
	validarContenidista(); //Verificamos que sea contenidista
	    if (isset($_GET["secciones"]))
        $menu = 'secciones';
	    if (isset($_GET["articulos"]))
        $menu = 'articulos';
	    else
        $menu = 'general';
	
	$id_edicion = $_REQUEST['id_edicion']
	
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
	  <script src="js/funciones.js"></script>
	  
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
	
	

	    <div class='col-xs-9'>
	
			<!-- Visaulizamos menu general/secciones/articulos-->
			<div class='panel panel-default'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
			<!-- Visaulizamos menu general/secciones/articulos-->
							<button type="button" class="btn btn-success btn-lg" id='botonedicion' onclick='mostrarEdicion()'>Edicion</button>
							<button type="button" class="btn btn-primary btn-lg" id='botonsecciones' onclick="mostrarSecciones()">Secciones</button>
							<button type="button" class="btn btn-primary btn-lg" id='botonarticulos' onclick="mostrarArticulos()">Articulos</button>							
														
														
														
														

						</ul>
			  
					</div>
			</div>	
	
		</div>	
	

		
		
	
	    <div class='col-xs-9'>
	
			<!-- Visaulizamos edicion para editar-->
			<div class='panel panel-default' id='edicion'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Insertamos el formulario de creacion de ediciones-->
								<form class='form-horizontal' enctype="multipart/form-data" action="editarEdicion.php" method="post">
								<?php
												
								echo "<input type='hidden' name='id_edicion' value=$_REQUEST[id_edicion]>";
								
								include "lib-formularioEdicion.php";
															
								?>
															
								</form>			
														
														
														
														
														

						</ul>
			  
				</div>
			</div>	
			
			
			<!-- Visaulizamos las secciones-->
			<div class='panel panel-default' id='secciones'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Visaulizamos las secciones-->
							<?php
							
								$sql = "select s.descripcion descripcion, s.nombre seccion, id_seccion from edicion e join seccion s on s.edicion_id = e.id_edicion
								where $id_edicion=e.id_edicion";
								$result=mysql_query($sql, $conexion) or die (mysql_error());
	

								//iniciamos tabla
								echo "
								
								<table class='table table-hover'>
								<tbody>
								
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search' action='generarSeccion.php' method='get'>
									<h4>Seccion
										<div class='form-group'>
											<input type='hidden' class='form-control' placeholder='tipo' name='id_edicion' value=$id_edicion>
											<input type='text' class='form-control' placeholder='Ingrese el nombre de la seccion' name='seccion'>
										</div>
										<button type='submit' class='btn btn-default'>Crear</button> </h4>
									</form>
								</td>

							</tr>
								
								

								  <tr>
									<td class='danger'><h4>ID</h4></td>
									<td class='danger'><h4>Seccion</h4></td>
									<td class='danger'><h4>Descripcion</h4></td>
									<td class='danger'><h4>#</h4></td>
									<td class='danger'><h4>#</h4></td>
								  </tr>
								
								
								";
																	

								while ($row = mysql_fetch_array($result)) {
									//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";

									echo "
									


									  <tr>
										<td class='active'>$row[id_seccion]</td>
										<td class='active'>$row[seccion]</td>
										<td class='active'>$row[descripcion]</td>
										<td class='active'><a href=#>Ver<a></td>
										<td class='active'><a href=eliminar.php?codigo=$row[id_seccion]&eliminar=seccion>Eliminar<a></td>
									  </tr>
									
									
									";
								
								}
								
								//cerramos tabla
								echo "
								
								</tbody>
								</table>
								
								";
								
								
															
							?>
															

														
														
														
														
														

						</ul>
			  
				</div>
			</div>

			<!-- Visaulizamos los articulos-->
			<div class='panel panel-default' id='articulos'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Visaulizamos los articulos-->
							<?php
							
								$sql = "select a.id_articulo id, a.titulo titulo, a.estado estado, a.fecha_creacion fecha, s.nombre seccion from publicacion p join edicion e on e.publicacion_id = p.id_publicacion join seccion s on s.edicion_id = e.id_edicion join articulo a on a.seccion_id = s.id_seccion
								where e.id_edicion = $id_edicion";
								$result=mysql_query($sql, $conexion) or die (mysql_error());
	

								//iniciamos tabla
								echo "
								
								<table class='table table-hover'>
								<tbody>
								
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search' action='menuCrearArticulo.php' method='get'>
									<h4>Articulo
										<div class='form-group'>
										<input type='hidden' name='id_edicion' value=$id_edicion />
											<input type='text' class='form-control' placeholder='Ingrese el nombre del articulo' name='titulo'>
										</div>
										<button type='submit' class='btn btn-default'>Crear</button> </h4>
									</form>
								</td>

							</tr>
								
								

								  <tr>
									<td class='danger'><h4>ID</h4></td>
									<td class='danger'><h4>Titulo</h4></td>
									<td class='danger'><h4>Seccion</h4></td>
									<td class='danger'><h4>Estado</h4></td>
									<td class='danger'><h4>Fecha</h4></td>
									<td class='danger'><h4>#</h4></td>
									<td class='danger'><h4>#</h4></td>
								  </tr>
								
								
								";
																	

								while ($row = mysql_fetch_array($result)) {
									//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";

									echo "
									


									  <tr>
										<td class='active'>$row[id]</td>
										<td class='active'>$row[titulo]</td>
										<td class='active'>$row[seccion]</td>
										<td class='active'>$row[estado]</td>
										<td class='active'>$row[fecha]</td>
										<td class='active'><a href=menuEditarArticulo.php?id_edicion=$_REQUEST[id_edicion]&id_articulo=$row[id]>Ver<a></td>
										<td class='active'><a href=eliminar.php?codigo=$row[id]&eliminar=articulo>Eliminar<a></td>
									  </tr>
									
									
									";
								
								}
								
								//cerramos tabla
								echo "
								
								</tbody>
								</table>
								
								";
								
								
															
							?>
															

														
														
														
														
														

						</ul>
			  
				</div>
			</div>	
			
		</div>
	

	




	
</div>
		
	
	
	<?php

		//Vemos el menu general y ocultamos el resto
       
		echo "<script type='text/javascript'>
		document.getElementById('edicion').style.display = 'block';
		document.getElementById('secciones').style.display = 'none';
		document.getElementById('articulos').style.display = 'none';
		</script>";


	
	?>


		
		
  
	</body>
	
</html>