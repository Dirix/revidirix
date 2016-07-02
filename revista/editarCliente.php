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
$id=$_POST['id'];

//Verificamos si selecciono el genero
if (isset($_POST['genderRadios']))
	$genero=$_POST['genderRadios'];
else
	$genero= 'null';

//Primero validamos
validarNuevoUsuario($nombre, 'Omitir', $clave, $apellido, $mail, $dni, $fecha, $telefono, $genero);


			
			
			//Editamos usuario
			$sql="
			UPDATE cliente 
			SET nombre='$nombre', apellido='$apellido', dni=$dni, correo='$mail', telefono=$telefono, direccion='$direccion', fecha_nacimiento='$fecha', genero='$genero'
			WHERE id_cliente=$id
			";
			

			
			//Guardamos el usuario en la Base de Datos
			$result=mysql_query($sql, $conexion);

						
						header ("Location: index.php");		//Logueamos y enviamos al index	
										
				
			
			
					
					
?> 