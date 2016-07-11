<?php 

session_start();
include "conexion.php"; 
$id_publicacion=$_GET['id_publicacion'];
$accion=$_GET['accion'];

	
	if ($accion=='publicar')
	{
			//Actualizamos los datos de la edicion
			$sql="UPDATE publicacion
			SET estado='publicado'
			where id_publicacion=$id_publicacion
			
			";
			
			$result=mysql_query($sql, $conexion);
			
	}

		if ($accion=='rechazar')
	{
			//Actualizamos los datos de la edicion
			$sql="UPDATE publicacion
			SET estado='listo'
			where id_publicacion=$id_publicacion
			
			";
			
			$result=mysql_query($sql, $conexion);
			
	}
			
			
			

								
								
							

					
				
										
				
			
			
					
					
?> 