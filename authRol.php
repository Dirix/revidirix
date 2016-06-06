
<?php 

function verificarRol($nombre_usuario){ 

			
		
	
			$consulta="
			select * from usuario u join rol r on u.id = r.id
			where u.login = '$nombre_usuario'
			
			";
			
			$resultado=mysql_query($consulta, $conexion) or die (mysql_error());

			//existe el usuario
			if (mysql_num_rows($resultado)>0)
				{
				

					
					
					 while ($row=@mysql_fetch_array($result)) 
					{ 
						if ($usuario==$row['login'] && $clave==$row['clave'])
						{
						$_SESSION["usuario"] = $row['login'];
						$_SESSION["clave"] = $row['clave'];
						$_SESSION["nombre"] = $row['nombre'];
						$_SESSION["apellido"] = $row['apellido'];
						$_SESSION["mail"] = $row['correo'];
						$_SESSION["dni"] = $row['dni'];
						$_SESSION["direccion"] = $row['domicilio'];
						$_SESSION["rol"] =	'descripcion';				
						header ("Location: index.php");		//Logueamos y enviamos al index	
						exit();
						}
					
					
					} 
					
				
				}
										
				
			
			
					
					
?> 