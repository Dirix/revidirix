<?php
					
function validarAdministrador(){ 


include "conexion.php"; 
					
	//Si no es administrador lo redireccionamos a la pantalla de error
	if(!(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'administrador')){
	$error="<p>Usted no tiene permiso para ingresar a esta seccion</p>";
	header ("Location: errores.php?errores=$error");

	}

	
}

function validarContenidista(){ 


include "conexion.php"; 
					
	//Si no es contenidista lo redireccionamos a la pantalla de error
	if(!(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'contenidista')){
	$error="<p>Usted no tiene permiso para ingresar a esta seccion</p>";
	header ("Location: errores.php?errores=$error");

	}

	
}


?>