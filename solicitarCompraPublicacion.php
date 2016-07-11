

<?php 
session_start();

include "conexion.php"; 
include "lib-funcionesValidacion.php";
include "mercadoPago/comprar.php";
include "lib-comprarPublicacion.php";
include "lib-validarRol.php";

login(); //Si no esta logueado lo redireccionamos al menu de login

$id_edicion=$_GET['id_edicion'];



			//Consultamos los datos de la edicion que vamos a cobrar
			$sql="select * from edicion
			where id_edicion=$id_edicion
			";
			

			
			//Ejecutamos la consulta
			$result=mysql_query($sql, $conexion);
			
												
												
			while ($row = mysql_fetch_array($result)) {
								
								
				$edicion=$row['identificacion'];
				$precio=$row['precio'];
							
			}
			
								
								


verificarCompraPublicacion($_SESSION['id'], $id_edicion);//Evitamos comprar dos veces la misma publicacion
comprarPublicacion($_SESSION['id'], $id_edicion); //Compramos la publicacion aunque no haya pagado para testear
comprar($edicion,$precio);//Enviamos los datos a MercadoPago






										
				
			
			
					
					
?> 