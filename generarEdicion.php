<?php 
session_start();
include "conexion.php"; 
$titulo=$_POST['identificacion'];
$pais=$_POST['pais'];
$precio=$_POST['precio'];
$estado=$_POST['estado'];
$id_publicacion=$_POST['id_publicacion'];



						//Agregamos la edicion a la Base de Datos



	$time = time();

	$tiempo = date("y-m-d-(H.i.s)", $time);
								

			
			//Guardamos la publicacion en la base de datos
			$sql="INSERT INTO edicion (identificacion, pais, precio, estado, publicacion_id)
			VALUES ('$titulo', '$pais', '$precio','$estado', '$id_publicacion')";
			//echo $sql;
			//exit (0);
			$result=mysql_query($sql, $conexion);
			


echo $sql;
			
				//header ("Location: index.php");
			
			
			


								

								
								
							

					
				
										
				
			
			
					
					
?> 