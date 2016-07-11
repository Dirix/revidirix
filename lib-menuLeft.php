<?php			

					
			if (isset($_SESSION['usuario']))
				
				{
					//Si es administrador mostramos el panel de administracion
					if($_SESSION['rol'] == 'administrador'){
					include "lib-menuAdmin.php";	
					}
					//Si es contenidista mostramos el panel de contenidista
					if($_SESSION['rol'] == 'contenidista'){
					include "lib-menuContenidista.php";	

					}
					
					
					
					
					
				}
				

				

					
					//Si es cliente mostramos el panel de cliente
					if(isset($_SESSION['cliente'])){
					include "lib-menuCliente.php";	

					}
					



		
		?>

