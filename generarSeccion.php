<?php
session_start();
?>

<?php 


include "conexion.php"; 
include "lib-funcionesValidacion.php";

$seccion=strtolower($_GET['seccion']);
$descripcion='Sin descripcion';
$id_edicion=$_GET['id_edicion'];


			//Verificamos si la seccion existe
			$sql="select * from edicion e join seccion s on s.edicion_id = e.id_edicion
			where e.id_edicion = $id_edicion and s.nombre = '$seccion'";
			$result=mysql_query($sql, $conexion) or die (mysql_error());
			if (mysql_num_rows($result)>0)
			{

			$error="<p>La seccion ya existe</p>";
			header ("Location: errores.php?errores=$error");
				
				exit();				
			}
			
			
			//Creamos la seccion
			$sql="INSERT INTO seccion (nombre, descripcion, edicion_id, usuario_id)
			VALUES ('$seccion', '$descripcion', $id_edicion, $_SESSION[id])";

			//Guardamos el usuario en la Base de Datos
			$result=mysql_query($sql, $conexion);

			
			header("Location:".$_SERVER['HTTP_REFERER']);   //regresamos
										
				
			
			
					
					
?> 