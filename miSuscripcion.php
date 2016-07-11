<?php
	include "conexion.php";
	include "lib-validarRol.php"; 
	session_start();
	login(); //Verificamos que este logueado
	



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
							
							//Consultamos nuestras suscripciones
							$sql="SELECT *
							FROM suscripcion s join cliente c on s.cliente_id=c.id_cliente
							WHERE cliente_id = $_SESSION[id]
							"
							;
							



							$res = consultar($sql); //Realizamos la consulta
							$resultado_consulta=$res[0]; //Guardamos la tabla correspondiente a la consulta
							$codigo_de_pagina=$res[1]; //Guardamos el codigo para administrar el paginado
							
							
							
							
							//iniciamos tabla
							echo "
							
							<table class='table table-hover'>
							<tbody>
							
							<tr>

								<td class='active' colspan='7'>
								
									<form class='busqueda navbar-left' role='search' action='solicitarCompraSuscripcion.php' method='get'>
									<h4>Suscribirse
										<div class='form-group'>
											<input type='hidden' class='form-control' placeholder='tipo' name='id_usuario' value=$_SESSION[id]>

										
											<SELECT NAME='suscripcion' class='form-control' placeholder='tiempo'>    
										   <OPTION VALUE='1'>1 Mes (100$)</OPTION> 
										   <OPTION VALUE='3'>3 Meses (300$)</OPTION> 
										   <OPTION VALUE='6'>6 Meses (550$)</OPTION>
										   <OPTION VALUE='12'>12 Meses (1000$)</OPTION>
										   <OPTION VALUE='24'>24 Meses (1600$)</OPTION> 
											</SELECT> 
										
										</div>
										<button type='submit' class='btn btn-success btn-lg'>Comprar</button> </h4>
									</form>
								</td>

							</tr>

							  <tr>

								<td class='danger'><h4>ID</h4></td>
								<td class='danger'><h4>Inicio</h4></td>
								<td class='danger'><h4>Fin</h4></td>
								<td class='danger'><h4>Estado</h4></td>
							  </tr>
							
							
							";
							

							while ($row = mysql_fetch_array($resultado_consulta)) {
								//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";
								
						
								if (compararFecha($row['inicio'], $row['fin']))
								$estado='Suscripcion activa';
								else
								$estado='Suscripcion finalizada';
								
								
								echo "
								


								  <tr>
									<td class='active'>$row[id_suscripcion]</td>
									<td class='active'>$row[inicio]</td>
									<td class='active'>$row[fin]</td>
									<td class='active'>$estado</td>
								  </tr>
								
								
								";
							
							}
							
							//cerramos tabla
							echo "
							
							</tbody>
							</table>
							
							";
							
							echo '<p></p>';
							
							ejecutarCodigo($codigo_de_pagina);


							

							?>
														
														
														
														
														
														

						</ul>
			  
				</div>
			</div>		
		</div>
	




	
</div>
		
	


		
		
  
	</body>
	
</html>