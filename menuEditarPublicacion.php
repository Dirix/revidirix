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
	
	$codigo_publicacion = $_REQUEST['id_publicacion']
	
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
							<button type="button" class="btn btn-success btn-lg" id='botongeneral' onclick='mostrarGeneral()'>General</button>
							<button type="button" class="btn btn-primary btn-lg" id='botonediciones' onclick="mostrarEdiciones()">Ediciones</button>

														
														
														

						</ul>
			  
					</div>
			</div>	
	
		</div>	
	

		
		
	
	    <div class='col-xs-9'>
	
			<!-- Visaulizamos publicacion para editar-->
			<div class='panel panel-default' id='general'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Visaulizamos publicacion para editar-->
								<form class='form-horizontal' enctype="multipart/form-data" action='editarPublicacion.php' method='post'>
								<?php
											

								echo "<input type='hidden' name='id_publicacion' value=$_REQUEST[id_publicacion]>";
								
								include "lib-formularioPublicacion.php";
															
								?>
															
								</form>		
														
														
														
														
														

						</ul>
			  
				</div>
			</div>	
			
			
			<!-- Visaulizamos las ediciones-->
			<div class='panel panel-default' id='ediciones'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Visaulizamos las ediciones-->
							<?php
							
								$sql = "select e.id_edicion, e.identificacion, e.precio, e.pais, e.estado estado  from edicion e join publicacion p on e.publicacion_id = p.id_publicacion
								where $id_publicacion=p.id_publicacion";
								$result=mysql_query($sql, $conexion) or die (mysql_error());
	

								//iniciamos tabla
								echo "
								
								<table class='table table-hover'>
								<tbody>
								
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search' action='menuCrearEdicion.php' method='get'>
									<h4>Edicion
										<div class='form-group'>
											<input type='hidden' class='form-control' placeholder='tipo' name='id_publicacion' value=$codigo_publicacion>
											<input type='text' class='form-control' placeholder='Ingrese el nombre de la edicion' name='edicion'>
										</div>
										<button type='submit' class='btn btn-default'>Generar</button></h4>
										
									</form>
									
								
								</td>

							</tr>
								
								

								  <tr>
									<td class='danger'><h4>ID</h4></td>
									<td class='danger'><h4>Edicion</h4></td>
									<td class='danger'><h4>Pais</h4></td>
									<td class='danger'><h4>Precio</h4></td>
									<td class='danger'><h4>Estado</h4></td>
									<td class='danger'><h4>#</h4></td>
									<td class='danger'><h4>#</h4></td>
								  </tr>
								
								
								";
																	

								while ($row = mysql_fetch_array($result)) {
									//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";

									echo "
									


									  <tr>
										<td class='active'>$row[id_edicion]</td>
										<td class='active'>$row[identificacion]</td>
										<td class='active'>$row[pais]</td>
										<td class='active'>$row[precio]$</td>
										<td class='active'>$row[estado]</td>
										<td class='active'><a href=menuEditarEdicion.php?id_edicion=$row[id_edicion]>Ver<a></td>
										<td class='active'><a href=eliminar.php?codigo=$row[id_edicion]&eliminar=edicion>Eliminar<a></td>
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
		document.getElementById('general').style.display = 'block';
		document.getElementById('ediciones').style.display = 'none';
		</script>";


	
	?>


		
		
  
	</body>
	
</html>