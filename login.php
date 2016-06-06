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
		//Insertamos el menu de login
		include "lib-login.php";
		?>	
		</div>

	</body>
	
</html>