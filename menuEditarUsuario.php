<?php
	include "conexion.php"; 		
	include "lib-validarRol.php"; 
	session_start();
	validarAdministrador(); //Verificamos que sea administrador
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



						
							<!-- Insertamos el formulario de edicion de usuario-->
							<form class='form-horizontal' action='editarUsuario.php' method='post'>
							
							
							
							<?php
							

							
							$nro=$_GET['nro'];
							//Texto oculto por medio del cual enviamos el id por post
							echo "<input type='hidden' name='id' value=$nro />";
							
							$consulta="
							select * from usuario
							where id_usuario=$nro
							
							";
							
							$result=mysql_query($consulta, $conexion) or die (mysql_error());

							//existe el usuario
							if (mysql_num_rows($result)>0)
								{
									 while ($row=@mysql_fetch_array($result)) 
									{ 

										$usuario= $row['login'];
										$clave = $row['clave'];
										$nombre = $row['nombre'];
										$apellido = $row['apellido'];
										$mail = $row['correo'];
										$dni = $row['dni'];
										$telefono = $row['telefono'];
										$direccion = $row['direccion'];			
										$fecha = $row['fecha_nacimiento'];	
										$sexo = $row['genero'];	
									
									
									} 
									
								
								}
							
							
															
							include "lib-formulario.php";
															
							?>

							</form>				
														
														
														
														
														

						</ul>
			  
				</div>
			</div>		
		</div>
	




	
</div>
		
	


		
		
  
	</body>
	
</html>