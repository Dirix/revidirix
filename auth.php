
<?php 

session_start();
$usuario=strtolower($_POST['usuario']);
$clave=$_POST['clave'];



verificarRol($usuario, $clave);

verificarCliente($usuario, $clave);

//Si llegamos aca es que hubo un error de autenticacion									
$link="<p><a href=login.php>Volver al menu de login</a></p>";
$error="Usuario y/o clave incorrecta";
$error= $error . $link;
header ("Location: errores.php?errores=$error");
			
			
			
			

//Esta funcion sirve para verificar el rol de un usuario
function verificarRol($nombre_usuario, $clave_usuario){ 

include "conexion.php"; 

			$consulta="
			select * from usuario u join rol r on u.rol = r.id_rol
			where u.login = '$nombre_usuario'
			
			";
			
			$result=mysql_query($consulta, $conexion) or die (mysql_error());

			//existe el usuario
			if (mysql_num_rows($result)>0)
				{
					 while ($row=@mysql_fetch_array($result)) 
					{ 
						if ($nombre_usuario==$row['login'] && $clave_usuario==$row['clave'])
						{
						$_SESSION["usuario"] = $row['login'];
						$_SESSION["clave"] = $row['clave'];
						$_SESSION["nombre"] = $row['nombre'];
						$_SESSION["apellido"] = $row['apellido'];
						$_SESSION["mail"] = $row['correo'];
						$_SESSION["dni"] = $row['dni'];
						$_SESSION["direccion"] = $row['domicilio'];
						$_SESSION["rol"] =	$row['descripcion'];				
						header ("Location: index.php");		//Logueamos y enviamos al index	
						exit(); //Terminamos el proceso
						}
					
					
					} 
					
				
				}
				
}


//Verificamos si el cliente existe

function verificarCliente($nombre_usuario, $clave_usuario){ 

include "conexion.php"; 

			$sql="select * from cliente where login='$nombre_usuario'";
			$result=mysql_query($sql, $conexion) or die (mysql_error());

			//Verificamos que exista el usuario
			if (mysql_num_rows($result)>0)
				{			

					
					
					 while ($row=@mysql_fetch_array($result)) 
					{ 
						if ($nombre_usuario==$row['login'] && $clave_usuario==$row['clave'])
						{
						$_SESSION["usuario"] = $row['login'];
						$_SESSION["clave"] = $row['clave'];
						$_SESSION["nombre"] = $row['nombre'];
						$_SESSION["apellido"] = $row['apellido'];
						$_SESSION["mail"] = $row['correo'];
						$_SESSION["dni"] = $row['dni'];
						$_SESSION["telefono"] = $row['telefono'];
						$_SESSION["direccion"] = $row['direccion'];
						$_SESSION["genero"] = $row['genero'];
						$_SESSION["fecha_nacimiento"] = $row['fecha_nacimiento'];
						$_SESSION["rol"] =	'usuario';				
						header ("Location: index.php");		//Logueamos y enviamos al index	
						exit(); //Terminamos el proceso
						}
						
					
					} 
					
				}
				
}
					
					
?> 