<?php
	include "conexion.php"; 		
	session_start();
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
	
					//Si no es administrador lo redireccionamos al login
					if(!(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'administrador')){
					header ("Location: login.php");

					}
	
					//Mostramos el panel de control de administrador
					include "lib-menuAdmin.php";
	?>
	
	
	
	
	
		<!--Aca mostramos todos los usuarios-->
		
	    <div class='col-xs-9'>
	
			<div class='panel panel-default'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
						
							<?php

							include "lib-funciones.php";
							$sql="SELECT id_cliente, login, nombre, apellido, telefono FROM cliente "; //Escribimos la consulta
							$res = consultar($sql); //Realizamos la consulta
							$resultado_consulta=$res[0]; //Guardamos la tabla correspondiente a la consulta
							$codigo_de_pagina=$res[1]; //Guardamos el codigo para administrar el paginado
							
							//iniciamos tabla
							echo "
							
							<table class='table table-hover'>
							<tbody>
							
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search'>
									<h4>Buscar usuario
										<div class='form-group'>
											<input type='text' class='form-control' placeholder='Buscar'>
										</div>
										<button type='submit' class='btn btn-default'>Buscar</button> </h4>
									</form>
								</td>

							</tr>

							  <tr>
								<td class='danger'><h4>#</h4></td>
								<td class='danger'><h4>ID</h4></td>
								<td class='danger'><h4>Usuario</h4></td>
								<td class='danger'><h4>Nombre</h4></td>
								<td class='danger'><h4>Apellido</h4></td>
								<td class='danger'><h4>Telefono</h4></td>
								<td class='danger'><h4></h4></td>
							  </tr>
							
							
							";
							
							while ($row = mysql_fetch_array($resultado_consulta)) {
								//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";
								
								echo "
								


								  <tr>
									<td class='active'><input type='checkbox' name='select' value=$row[id_cliente]></td>
									<td class='active'>$row[id_cliente]</td>
									<td class='active'>$row[login]</td>
									<td class='active'>$row[nombre]</td>
									<td class='active'>$row[apellido]</td>
									<td class='active'>$row[telefono]</td>
									<td class='active'><a href=menuEditarCliente.php?nro=$row[id_cliente]>Editar<a></td>
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