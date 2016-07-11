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

	//El administrador deberia tener acceso a todo
	if(!(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'administrador')){			
			//Si no es contenidista lo redireccionamos a la pantalla de error
			if(!(isset($_SESSION['usuario']) && $_SESSION['rol'] == 'contenidista')){
			$error="<p>Usted no tiene permiso para ingresar a esta seccion</p>";
			header ("Location: errores.php?errores=$error");

			}

		}
	
}

function login(){ 


include "conexion.php"; 
					
	//Si no esta logueado redireccionamos al login
	if(!isset($_SESSION['usuario']))
	header ("Location: login.php");

	

	
}


?>