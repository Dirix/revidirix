
		<nav class="navbar navbar-default" role="navigation">
		  <!-- El logotipo y el icono que despliega el menú se agrupan
			   para mostrarlos mejor en los dispositivos móviles -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Desplegar navegación</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">InfoNete</a>
		  </div>
		 
		  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
			   otro elemento que se pueda ocultar al minimizar la barra -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
					
					  <!-- li class="active"><a href="#">Revista</a></li> -->

					  <li><a href="revistas.php">Revista</a></li>
					  <li><a href="diarios.php">Diario</a></li>
					  <li><a href="#">Contacto</a></li>
					</ul>
				 
					<form class="busqueda navbar-left" role="search" action="" method='get'>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar" name="busqueda">
					  </div>
					  <button type="submit" class="btn btn-default">Buscar</button>
					</form>
					

					

					

					<?php
					
					//Si esta logueado, mostramos el nombre y apellido
					if(isset($_SESSION['usuario'])){
					echo "
					
					<div id='search_box'>

						<div><p class='user'>$_SESSION[apellido], $_SESSION[nombre]</p></div>

						<div class='derecha'><p class='link'><a href='#'>Ver perfil</a> - <a href='cerrarSession.php'>Cerrar Sesion</a></p></div>					

					</div>
					";
										
					}
					
						else{
							
							echo "
							<ul class='nav navbar-nav navbar-right'>
							 <li><a class='log' href='login.php'>Ingresar</a></li>
							<li><a class='log' href='registrarCliente.php'>Registrarse</a></li>
							</ul>
							";
						}
					
					?>


		  </div>
		</nav>
