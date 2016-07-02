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
	
	
					//Mostramos el panel de control de administrador
					include "lib-menuAdmin.php";
	?>
	
	
	
	
	
		<!--Aca mostramos todos los usuarios-->
		
	    <div class='col-xs-9'>
	
			<div class='panel panel-default'>
				

					<div class='panel-body'>


			 
						<ul class="list-group">



						
							<!-- Insertamos el formulario de creacion de usuario contenidista-->
								<form class='form-horizontal' action='crearUsuario.php' method='post'>
								<?php
															
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