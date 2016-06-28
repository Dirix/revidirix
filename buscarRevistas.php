<?php
	include "conexion.php";
	include "lib-validarRol.php"; 
	session_start();
	validarContenidista(); //Verificamos que sea contenidista
	
	if (isset($_GET["busqueda"]))
    $busqueda = $_GET["busqueda"];
	else
	$busqueda = "";

	if (isset($_GET["tipo"]))
    $tipo = $_GET["tipo"];
	else
	$tipo = "";



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
					//Si es administrador mostramos el panel de administracion
					if(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'administrador'){
					include "lib-menuAdmin.php";	

					}
					
									//Si es administrador mostramos el panel de administracion
					if(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'contenidista'){
					include "lib-menuContenidista.php";	

					}

					//Si es cliente mostramos el panel de cliente
					if(isset($_SESSION['cliente'])){
					include "lib-menuCliente.php";	

					}
		
		?>
	
	
	
	
	
		<!--Aca mostramos todos los usuarios-->
		
	    <div class='col-xs-9'>
	
			<div class='panel panel-default'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
						
							<?php

							include "lib-funciones.php";
							
							if ($tipo=='pendientes') //Si son revistas pendientes hacemos esta consulta
							$sql="select id_publicacion, p.nombre titulo, u.nombre nombre, apellido, login from publicacion p join usuario u on p.usuario_id = u.id_usuario where p.estado like 'borrador' and p.nombre like '%$busqueda%'";
							elseif ($tipo=='cerrado') //Si son revistas pendientes hacemos esta consulta
							$sql="select id_publicacion, p.nombre titulo, u.nombre nombre, apellido, login from publicacion p join usuario u on p.usuario_id = u.id_usuario where p.estado like 'publicado' and p.nombre like '%$busqueda%'";
							else{
							echo("error");
							exit (0);
							}
							$res = consultar($sql); //Realizamos la consulta
							$resultado_consulta=$res[0]; //Guardamos la tabla correspondiente a la consulta
							$codigo_de_pagina=$res[1]; //Guardamos el codigo para administrar el paginado
							
							
							
							
							//iniciamos tabla
							echo "
							
							<table class='table table-hover'>
							<tbody>
							
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search' action='verRevistas.php' method='get'>
									<h4>Buscar Cliente
										<div class='form-group'>
											<input type='hidden' class='form-control' placeholder='tipo' name='tipo' value='pendientes'>
											<input type='text' class='form-control' placeholder='Buscar' name='busqueda'>
										</div>
										<button type='submit' class='btn btn-default'>Buscar</button> </h4>
									</form>
								</td>

							</tr>

							  <tr>
								<td class='danger'><h4>ID</h4></td>
								<td class='danger'><h4>Titulo</h4></td>
								<td class='danger'><h4>Usuario</h4></td>
								<td class='danger'><h4>Apellido</h4></td>
								<td class='danger'><h4>#</h4></td>
								<td class='danger'><h4>#</h4></td>
							  </tr>
							
							
							";
							

							while ($row = mysql_fetch_array($resultado_consulta)) {
								//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";
								
								echo "
								


								  <tr>
									<td class='active'>$row[id_publicacion]</td>
									<td class='active'>$row[titulo]</td>
									<td class='active'>$row[login]</td>
									<td class='active'>$row[apellido], $row[nombre]</td>
									<td class='active'><a href=#>Ver<a></td>
									<td class='active'><a href=eliminar.php?eliminar=publicacion&codigo=$row[id_publicacion]>Eliminar<a></td>
								  </tr>
								
								
								";
							
							}
							
							//cerramos tabla
							echo "
							
							</tbody>
							</table>
							
							";
							
							echo '<p>';
							
							ejecutarCodigo($codigo_de_pagina);


							

							?>
														
														
														
														
														
														

						</ul>
			  
				</div>
			</div>		
		</div>
	




	
</div>
		
	


		
		
  
	</body>
	
</html>