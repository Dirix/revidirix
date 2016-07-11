
<?php 








	//Compramos la publicacion
	function comprarPublicacion($cliente,$edicion){
		include "conexion.php"; 
			$time = time();

	$tiempo = date("y-m-d-(H.i.s)", $time);
		
			$sql="INSERT INTO compra (fecha, edicion_id, cliente_id)
			VALUES ('$tiempo', $edicion, $cliente)";
			
			$result=mysql_query($sql, $conexion);
			}
			
	//Evitamos que el Cliente compre dos veces la misma edicion
	function verificarCompraPublicacion($cliente,$edicion){
		include "conexion.php"; 

			$sql="select * from compra
			where cliente_id=$cliente and $edicion=edicion_id
			";
			$result=mysql_query($sql, $conexion) or die (mysql_error());
			if (mysql_num_rows($result)>0)
			{

			$error="<p>Ya has comprado esta edicion</p>";
			header ("Location: errores.php?errores=$error");
				
				exit();				
			}
			

			}
			

			
	//Compramos la suscripcion
	function comprarSuscripcion($cliente,$fin){
		include "conexion.php"; 
			$time = time();

	$tiempo = date("y-m-d-(H.i.s)", $time);
	$inicio_suscripcion = $tiempo;
	$fecha = date('Y-m-j');
	$nuevafecha = strtotime ( '+' . $fin . 'month' , strtotime ( $fecha ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

			$sql="INSERT INTO suscripcion (inicio, fin, cliente_id)
			VALUES ('$inicio_suscripcion', '$nuevafecha', '$cliente')";
			

			$result=mysql_query($sql, $conexion);
			}
			
	//Evitamos que el Cliente compre dos veces la misma edicion
	
	//No esta habilitado
	function verificarCompraSuscripcion($cliente){
		include "conexion.php"; 

			$sql="select * from suscripcion
			where cliente_id=$cliente
			";
			$result=mysql_query($sql, $conexion) or die (mysql_error());
			if (mysql_num_rows($result)>0)
			{
			
				
				$error="<p>Ya tienes una suscripcion activa</p>";
				header ("Location: errores.php?errores=$error");
				
				exit();				
			}
			

			}
		
					
?> 