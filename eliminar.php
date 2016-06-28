<?php
	include "conexion.php";
	include "lib-validarRol.php"; 
	session_start();
	
	//Establecemos que vamos a eliminar
	if (isset($_GET["eliminar"]))
    $eliminar = $_GET["eliminar"];
	else
	$eliminar = "";

	//Indicamos el ID para poder eliminar
	if (isset($_GET["codigo"]))
    $codigo = $_GET["codigo"];
	else
	$codigo = "";

	
	//Eliminamos publicacion
	if ($eliminar=='publicacion')
	{
		
		validarContenidista(); //Verificamos que sea contenidista
		
						///Consulta SQL
						$sql="DELETE FROM publicacion
						where (id_publicacion=$codigo)";
						
						$result=mysql_query($sql, $conexion);

						header("Location:".$_SERVER['HTTP_REFERER']);   //regresamos
		
		
		
		
		
		
		
		
		
		
	}















?>