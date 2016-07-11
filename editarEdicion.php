<?php 

session_start();
include "conexion.php"; 
$titulo=$_POST['identificacion'];
$pais=$_POST['pais'];
$precio=$_POST['precio'];
$estado=$_POST['estado'];
$id_edicion=$_POST['id_edicion'];

	


			//Actualizamos los datos de la edicion
			$sql="UPDATE edicion
			SET identificacion='$titulo', pais='$pais', precio='$precio', estado='$estado'
			where id_edicion=$id_edicion
			
			";
			
			$result=mysql_query($sql, $conexion);
			
			
			

								
								
							

					
				
										
				
			
			
					
					
?> 