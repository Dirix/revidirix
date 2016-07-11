<?php




//Esta funcion se encarga de generar el listado y paginado de las consultas, y devolverlo en forma de array
function consultar($cadena){ 







	$consulta=$cadena . " "; // La consulta recibida por parametro
	$numero_paginas=3; //Numero de resultado por pagina
	
	$rs= obtenerPaginas ($consulta, $numero_paginas); //Obtenemos el numero de paginas en un array
	$inicio=$rs[0]; //Guardamos el numero de inicio de la pagina
	$total_de_paginas=$rs[1]; //Guardamos el numero de paginas
	$pagina_actual=$rs[2]; //Guardamos el numero de paginas
	$rs=realizarConsulta($consulta, $inicio, $numero_paginas);
	

	
	$codigo_pagina=paginacion($total_de_paginas, $pagina_actual); //Guardamos en una variable el codigo para generar el menu de paginas

	$array_resultado=[$rs,$codigo_pagina]; //Guardamos todo en un array
	
	return $array_resultado; //Devolvemos el array

}


function obtenerPaginas($cadena, $tamaño){ 


include "conexion.php"; 	

$consulta = $cadena . " ";
$rs_noticias = mysql_query($consulta, $conexion);
$num_total_registros = mysql_num_rows($rs_noticias);
//Si hay registros
$inicio= "";
if ($num_total_registros > 0) {
	

	$TAMANO_PAGINA = $tamaño; //Numero de resultados por pagina
        $pagina = false;

	//examino si hay alguna busqueda ingresada
        if (isset($_GET["busqueda"]))
            $busqueda = $_GET["busqueda"];		
		
	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
	

	}

	
	 if (isset($total_paginas))
	$resultadoArray=[$inicio, $total_paginas, $pagina];
	 else
	$resultadoArray=[0, 0, 0];

	return $resultadoArray;
	
}

function realizarConsulta($consulta_sql, $inicio, $TAMANO_PAGINA){ 
include "conexion.php"; 	


	//Mostramos el resultado de la pagina
	$consulta_sql= $consulta_sql . "ORDER BY nombre DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
	$rs = mysql_query($consulta_sql, $conexion);

	return $rs;
	
	//while ($row = mysql_fetch_array($rs)) {
	//	echo "<a href='#'>Usuario: $row[login] // Nombre: $row[nombre] $row[apellido]</a><br>";
	//}

	// echo '<p>';
	

	}

	
function paginacion($total_paginas, $pagina){
	
	if (isset($_REQUEST["busqueda"]))
    $busqueda = $_REQUEST["busqueda"];
	else
	$busqueda = "";

	if (isset($_REQUEST["tipo"]))
    $tipo = $_REQUEST["tipo"];
	else
	$tipo = "";

include "conexion.php"; 	

$rs="";

	//Menu de Paginacion
	if ($total_paginas > 1) {
		if ($pagina != 1)
			$rs= "<a href=?pagina='$pagina'-1&busqueda=$busqueda&tipo=$tipo></a>";
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				//si muestro el ?ndice de la p?gina actual, no coloco enlace
				$rs = $rs . $pagina;
			else
				//si el indice no corresponde con la p?gina mostrada actualmente,
				//coloco el enlace para ir a esa p?gina
				$rs = $rs . "  <a href=?pagina=$i&busqueda=$busqueda&tipo=$tipo>$i</a>  ";
		}
		if ($pagina != $total_paginas)
			$rs = $rs . "<a href=?pagina='$pagina'+1&busqueda=$busqueda&tipo=$tipo></a>";
	}


return $rs;

}

function ejecutarCodigo($cadena){ 

echo $cadena;

}

function compararFecha($fecha_actual, $fecha_entrada)
{
$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
$fecha_entrada = strtotime($fecha_entrada);
if($fecha_actual > $fecha_entrada){
        return false;
}else{
        return true;
}
	
	
	
	
}
?>