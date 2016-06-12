<?php
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
	
	        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
		<?php
		//Insertamos el menu de navegacion
		include "lib-menu.php";
		?>
		

		
		
<div class="container">
  <!-- <div class="row"> -->
    <div class="span7 offset5"></div>	
	


	
					<div class='panel panel-default'>
					  <div class='panel-heading'><h2>Registrar<h2></div>

								  <div class='panel-body'>


			 
													  <ul class="list-group">

															<!-- Insertamos el formulario de registracion-->
															<form class='form-horizontal' action='crearUsuario.php' method='post'>
																<?php
															
																include "lib-formulario.php";
															
															?>
															
															</form>
														
	
														

													  </ul>
			  
								  </div>
					</div>		
	<!-- </div> -->
</div>

	</body>
	
</html>