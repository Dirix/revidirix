

<?php 
session_start();

include "conexion.php"; 
include "lib-funcionesValidacion.php";
include "mercadoPago/comprar.php";
include "lib-comprarPublicacion.php";
include "lib-validarRol.php";

login(); //Si no esta logueado lo redireccionamos al menu de login

$id_cliente=$_GET['id_usuario'];
$suscripcion=$_GET['suscripcion'];
$precio=0;
$tiempo=0;

if ($suscripcion==1)
{
$precio=100;
$tiempo=1;	
}
elseif ($suscripcion==3)
{
$precio=300;
$tiempo=3;	
}
elseif ($suscripcion==6)
{
$precio=550;
$tiempo=6;	
}
elseif ($suscripcion==12)
{
$precio=1000;
$tiempo=12;	
}
elseif ($suscripcion==24)
{
$precio=1600;
$tiempo=24;	
}
else
{
echo "error";
exit(0);	
	
}


$producto="Suscripcion. Cantidad Meses: " . $tiempo;			
								

//verificarCompraSuscripcion($id_cliente);//Evitamos comprar una suscripcion si ya tenemos una activa
comprarSuscripcion($id_cliente, $tiempo); //Compramos la suscripcion aunque no haya pagado para testear
comprar($producto,$precio);//Enviamos los datos a MercadoPago






										
				
			
			
					
					
?> 