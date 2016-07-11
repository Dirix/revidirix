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
							
							if ($tipo=='revistas') //Si son revistas pendientes hacemos esta consulta
							$sql="select p.nombre, e.fecha, e.precio, e.identificacion, e.id_edicion
							from publicacion p join edicion e on e.publicacion_id = p.id_publicacion join compra c on c.edicion_id = id_edicion 
							where c.cliente_id = $_SESSION[id] and p.tipo_publicacion like 'revista' and p.nombre like '%$busqueda%'";
							elseif ($tipo=='diarios') //Si son revistas pendientes hacemos esta consulta
							$sql="select p.nombre, e.fecha, e.precio, e.identificacion, e.id_edicion
							from publicacion p join edicion e on e.publicacion_id = p.id_publicacion join compra c on c.edicion_id = id_edicion 
							where c.cliente_id = $_SESSION[id] and p.tipo_publicacion like 'diario' and p.nombre like '%$busqueda%'";
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
								
									<form class='busqueda navbar-left' role='search' action='miRevista.php' method='get'>
									<h4>Buscar Revista
										<div class='form-group'>
											<input type='hidden' class='form-control' placeholder='tipo' name='tipo' value=$_REQUEST[tipo]>
											<input type='text' class='form-control' placeholder='Buscar' name='busqueda'>
										</div>
										<button type='submit' class='btn btn-default'>Buscar</button> </h4>
									</form>
								</td>

							</tr>

							  <tr>

								<td class='danger'><h4>Revista</h4></td>
								<td class='danger'><h4>Edicion</h4></td>
								<td class='danger'><h4>Fecha</h4></td>
								<td class='danger'><h4>#</h4></td>
							  </tr>
							
							
							";
							

							while ($row = mysql_fetch_array($resultado_consulta)) {
								//echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";
								
						
								
								
								echo "
								


								  <tr>
									<td class='active'>$row[nombre]</td>
									<td class='active'>$row[identificacion]</td>
									<td class='active'>$row[fecha]</td>
									<td class='active'><a href=miEdicion.php?id_edicion=$row[id_edicion]>Ver<a></td>
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