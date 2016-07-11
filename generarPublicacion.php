<?php 
$tamañoMaximo=2500; //-->Establecemos el tamaño maximo del archivo
session_start();
include "conexion.php"; 
$titulo=$_POST['titulo'];
$estado=$_POST['estado'];
$descripcion=$_POST['descripcion'];
$tipo=$_POST['tipo'];
$nombre_archivo=basename($_FILES['uploadedfile']['name']);



						//Agregamos la noticia a la Base de Datos



	$time = time();

	$tiempo = date("y-m-d-(H.i.s)", $time);
								
								
	$target_path = "imagenes/portadas/" . $tiempo;
	$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
	$target_path = $bodytag = str_replace(" ", "-", $target_path);
	
	//Aca es la URL desde el INDEX, esta es la que vamos a guardar en la BD
	$directorio = "imagenes/portadas/" . $tiempo;
	$directorio = $directorio . basename($_FILES['uploadedfile']['name']);
	$directorio = $bodytag = str_replace(" ", "-", $directorio);
	
	$tamañoArchivo =  $_FILES['uploadedfile']['size'];
	$tamañoArchivo = $tamañoArchivo / 1024;
	$extensionArchivo = strtolower(substr($target_path, -3));
	

	

	


			if ($tamañoArchivo >$tamañoMaximo) //Nos aseguramos que el archivo no supere el tamaño maximo establecido
			{
			$error= "<p>No es posible subir archivos de mas de $tamañoMaximo KB</p>";
			header ("Location: errores.php?errores=$error");
			exit();
			}

			if (false==($extensionArchivo == 'jpg')) //Nos aseguramos que el archivo no supere el tamaño maximo establecido
			{
			$error= "<p>Solo es posible subir imagenes JPG</p>";
			header ("Location: errores.php?errores=$error");
			exit();
			}
	

			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			

			
			
			//Guardamos en la tabla de imagen la url de la portada
			$sql="INSERT INTO imagen (descripcion,url)
			VALUES ('$nombre_archivo', '$directorio')";
			$result=mysql_query($sql, $conexion);
			
			//Guardamos la publicacion en la base de datos
			$sql="INSERT INTO publicacion (nombre,descripcion,estado, tipo_publicacion, usuario_id, imagen_id)
			VALUES ('$titulo', '$descripcion', '$estado', '$tipo', '$_SESSION[id]', (SELECT id_imagen FROM imagen ORDER BY id_imagen DESC LIMIT 1))";
			//echo $sql;
			//exit (0);
			$result=mysql_query($sql, $conexion);
			



			
				//header ("Location: index.php");
			}
			else{
			
			echo "Ha ocurrido un error, trate de nuevo!";
		
			}
			


								

								
								
							

					
				
										
				
			
			
					
					
?> 