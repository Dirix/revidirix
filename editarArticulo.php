<?php 
$tamañoMaximo=2500; //-->Establecemos el tamaño maximo del archivo
session_start();
include "conexion.php"; 
$titulo=$_POST['titulo'];
$subtitulo=$_POST['subtitulo'];
$seccion=$_POST['seccion'];
$contenido=$_POST['contenido'];
$estado=$_POST['estado'];
$id_articulo=$_POST['id_articulo'];

	//Si recibio una imagen, nos encargamos de subirla 
	    if (!$_FILES['uploadedfile']['size']==0)
	{
		$nombre_archivo=basename($_FILES['uploadedfile']['name']);



	//Registramos el dia y hora a fin de asignarla al nombre de la imagen

	$time = time();

	$tiempo = date("y-m-d-(H.i.s)", $time);
								
								
	$target_path = "imagenes/articulos/" . $tiempo; //Indicamos la ruta donde se guarda la imagen
	$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
	$target_path = $bodytag = str_replace(" ", "-", $target_path);
	
	//Aca es la URL desde el INDEX, esta es la que vamos a guardar en la BD
	$directorio = "imagenes/articulos/" . $tiempo;
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
			

			
			
			
			//Guardamos en la tabla de imagen la url del articulo
			$sql="INSERT INTO imagen (descripcion,url)
			VALUES ('$nombre_archivo', '$directorio')";
			$result=mysql_query($sql, $conexion);
			
			//Guardamos la publicacion en la base de datos
			//$sql="INSERT INTO articulo (titulo, subtitulo, texto, estado, pie, izquierda, derecha, seccion_id, fecha_creacion, usuario_id ,cabecera)
			//VALUES ('$titulo', '$subtitulo', '$contenido', '$estado', 7, 7,7,'$seccion', '$tiempo', '$_SESSION[id]', (SELECT id_imagen FROM imagen ORDER BY id_imagen DESC LIMIT 1))";
			//echo $sql;
			//exit (0);
			//$result=mysql_query($sql, $conexion);
			
			
			//Actualizamos la imagen en la tabla de imagenes
			$sql="UPDATE articulo
			SET cabecera=(SELECT id_imagen FROM imagen ORDER BY id_imagen DESC LIMIT 1)
			where id_articulo=$id_articulo";
			$result=mysql_query($sql, $conexion);
			
			
			//Actualizamos la imagen en el articulo
			$sql="UPDATE articulo
			SET cabecera=(SELECT id_imagen FROM imagen ORDER BY id_imagen DESC LIMIT 1)
			where id_articulo=$id_articulo";
			
			$result=mysql_query($sql, $conexion);
		

			



			
				//header ("Location: index.php");
			}

			
	}

					


			//Actualizamos los datos del articulo
			$sql="UPDATE articulo
			SET titulo='$titulo', subtitulo='$subtitulo', estado='$estado', seccion_id='$seccion', texto='$contenido'
			where id_articulo=$id_articulo
			
			";
			
			$result=mysql_query($sql, $conexion);
			

								
								
							

					
				
										
				
			
			
					
					
?> 