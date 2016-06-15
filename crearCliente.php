<?php
session_start();
?>

<?php 


include "conexion.php"; 
include "lib-funcionesValidacion.php";

$usuario=strtolower($_POST['usuario']);
$clave=$_POST['clave'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$mail=$_POST['mail'];
$dni=$_POST['dni'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$fecha=$_POST['fecha'];

//Verificamos si selecciono el genero
if (isset($_POST['genderRadios']))
	$genero=$_POST['genderRadios'];
else
	$genero= 'null';

//Primero validamos
validarNuevoUsuario($nombre, $usuario, $clave, $apellido, $mail, $dni, $fecha, $telefono, $genero);

			//Verificamos si el usuario existe
			$sql="select * from cliente where login='$usuario'";
			$result=mysql_query($sql, $conexion) or die (mysql_error());
			if (mysql_num_rows($result)>0)
			{

			header ("Location: registrar.php?error_usuario=El usuario ya existe&error_clave='error de clave'");
				
				exit();				
			}
			
			
			//Creamos usuario
			$sql="INSERT INTO cliente (login,clave,nombre, apellido, correo, dni, telefono, direccion, genero, fecha_nacimiento)
			VALUES ('$usuario', '$clave', '$nombre', '$apellido', '$mail', '$dni', '$telefono', '$direccion', '$genero', '$fecha')";

			//Guardamos el usuario en la Base de Datos
			$result=mysql_query($sql, $conexion);

			
			//Iniciamos la session con los Datos
			
						$_SESSION["usuario"] = $usuario;
						$_SESSION["clave"] = $clave;
						$_SESSION["nombre"] = $nombre;
						$_SESSION["apellido"] = $apellido;
						$_SESSION["mail"] = $mail;
						$_SESSION["dni"] = $dni;
						$_SESSION["telefono"] = $telefono;
						$_SESSION["direccion"] = $direccion;
						$_SESSION["genero"] = $genero;
						$_SESSION["fecha_nacimiento"] = $fecha;
						
						header ("Location: index.php");		//Logueamos y enviamos al index	
										
				
			
			
					
					
?> 