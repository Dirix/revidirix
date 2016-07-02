<?php








function validarNuevoUsuario($validar_nombre, $validar_usuario, $validar_clave, $validar_apellido, $validar_correo, $validar_dni, $validar_fecha, $validar_telefono, $validar_genero){ 
	$link="<p><a href=http://localhost/revista/registrar.php>Volver al formulario</a></p>";
	$error = "";
	$error = validarNombre($validar_nombre);
	$error = $error . validarUsuario($validar_usuario);
	$error = $error . validarClave($validar_clave);
	$error = $error . validarApellido($validar_apellido);
	$error = $error . validarCorreo($validar_correo);
	$error = $error . validarDni($validar_dni);
	$error = $error . validarFecha($validar_fecha);
	$error = $error . validarTelefono($validar_telefono);
	$error = $error . validarGenero($validar_genero);

	if ($error){
		$error= $error . $link;
		header ("Location: errores.php?errores=$error");
		exit(0);
		}
	
	}


function validarUsuario($cadena){ 


	$errorParcial="";

	if (strlen($cadena)<5)
	$errorParcial="$errorParcial <p>El Usuario debe tener como minimo 5 letras</p>";

	if (strlen($cadena)>12)
	$errorParcial="$errorParcial <p>El Usuario debe tener como maximo 12 letras</p>";

		if ($errorParcial)
			return $errorParcial;
		else
			return;
			

	}	
	

function validarClave($cadena){ 


	$errorParcial="";

	if (strlen($cadena)<5)
	$errorParcial="$errorParcial <p>La clave debe tener como minimo 5 letras</p>";

	if (strlen($cadena)>12)
	$errorParcial="$errorParcial <p>La clave debe tener como maximo 12 letras</p>";

		if ($errorParcial)
			return $errorParcial;
		else
			return;
			

	}	


function validarNombre($cadena){ 

	$errorParcial="";

	if (!validarLetras($cadena))
	$errorParcial= "<p>El nombre no puede tener numeros ni caracteres especiales</p>";

	if (strlen($cadena)<5)
	$errorParcial="$errorParcial <p>El nombre debe tener como minimo 5 letras</p>";

	if (strlen($cadena)>10)
	$errorParcial="$errorParcial <p>El nombre debe tener como maximo 10 letras</p>";

		if ($errorParcial)
			return $errorParcial;
		else
			return;
			

	}
	


function validarGenero($cadena){ 
	$permitidos = "mf"; 
	for ($i=0; $i<strlen($cadena); $i++){ 
	if (strpos($permitidos, substr($cadena,$i,1))===false){ 
	//no es valido; 
	return "<p>El genero seleccionado es incorrecto</p>";; 
	} 
	}  
	//Validamos correctamente
	return;
}

function validarApellido($cadena){ 

	$errorParcial="";

	if (!validarLetras($cadena))
	$errorParcial= "<p>El nombre no puede tener numeros ni caracteres especiales</p>";

	if (strlen($cadena)<5)
	$errorParcial="$errorParcial <p>El nombre debe tener como minimo 5 letras</p>";

	if (strlen($cadena)>10)
	$errorParcial="$errorParcial <p>El nombre debe tener como maximo 10 letras</p>";

		if ($errorParcial)
			return $errorParcial;
		else
			return;

	}

	

function validarDni($cadena){ 
	if (strlen($cadena) <> 8)
	return "<p>El numero de DNI debe ser de 8 digitos</p>";
	if (!validarNumeros($cadena))
	return "<p>El DNI solo puede contener numeros</p>";
	}
	
function validarTelefono($cadena){ 
	if (strlen($cadena) < 7)
	return "<p>Numero de telefono incorrecto</p>";
	if (!validarNumeros($cadena))
	return "<p>El numero de telefono solo puede contener numeros</p>";
	}

function validarCorreo($cadena){ 
	if (!filter_var($cadena, FILTER_VALIDATE_EMAIL))
	return "<p>La direccion de correo ingresada es invalida.</p>";
	}

function validarFecha($cadena){ 
	$cadenaFecha= explode("-", $cadena); 
	If (count($cadenaFecha)<>3)  
	return "<p>La fecha ingresada es invalida.</p>";
	elseif (strlen($cadenaFecha[0]) <> 4 || strlen($cadenaFecha[1]) <> 2 || strlen($cadenaFecha[2]) <> 2 )
	return "<p>La fecha ingresada es invalida.</p>";
	}

	
function validarLetras($cadena){ 
$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ "; 
for ($i=0; $i<strlen($cadena); $i++){ 
if (strpos($permitidos, substr($cadena,$i,1))===false){ 
//no es valido; 
return false; 
} 
}  
//Validamos correctamente
return true;
}

function validarNumeros($cadena){ 
$permitidosNumeros = "1234567890"; 
for ($i=0; $i<strlen($cadena); $i++){ 
if (strpos($permitidosNumeros, substr($cadena,$i,1))===false){ 
//no es valido; 
return false; 
} 
}  
//Validamos correctamente
return true;
}

?>

