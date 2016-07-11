<?php
    
    include "conexion.php";


    
    //Si recibimos algun parametro por GET significa que se va a editar una publicacion
    if (isset($_GET["id_publicacion"])){
        $id_publicacion = $_GET["id_publicacion"];

        $sql = "select p.nombre titulo, p.descripcion descripcion, i.url, p.tipo_publicacion, p.estado from publicacion p join imagen i on p.imagen_id = i.id_imagen
            where $id_publicacion=p.id_publicacion";


            
            $result=mysql_query($sql, $conexion) or die (mysql_error());

            if (mysql_num_rows($result)>0)
                {
                     while ($row=@mysql_fetch_array($result)) 
                    { 

                        $titulo = $row['titulo'];
                        $contenido = $row['descripcion'];
                        $imagen = $row['url'];
                        $tipo = $row['tipo_publicacion'];
						$estado = $row['estado'];
                    
                    } 
                    
                
                }
    //Si no recibimos ningun parametro significa que estamos creando una publicacion    
    }else{

    $titulo = "";
    $contenido = "";
	$estado = "";
    $tipo = "";
    }

echo "


    <div class='form-group'>
        <label class='control-label col-xs-2'>Titulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='titulo' value='$titulo'>
        </div>
    </div>
	
        ";

        if (isset($imagen)){

            echo "
        <label class='control-label col-xs-2'>Imagen:</label>
                <div class='form-group'>
        <div class='col-xs-9'>
        <img class='reducido' src='$imagen'>
        </div>
    </div> ";

        }

        echo "

    <div class='form-group'>
        <label class='control-label col-xs-2'>Seleccionar Imagen:</label>
        <div class='col-xs-9'>
            <input class='form-control' name='uploadedfile' placeholder='Seleccionar Imagen' type='file' />
        </div>
    </div>			
		
	<div class='form-group'>
        <label class='control-label col-xs-2'>Tipo:</label>
        <div class='col-xs-9'>
		<select class='form-control' name='tipo' id='tipo'>
			<option value='revista'>Revista</option>
			<option value='diario'>Diario</option>
		</select>
        </div>
    </div>
	
	<div class='form-group'>
        <label class='control-label col-xs-2'>Estado:</label>
        <div class='col-xs-9'>
		<select class='form-control' name='estado' id='estado'>
			<option value='borrador'>Borrador</option>
			<option value='listo'>Listo para publicar</option>
		</select>
        </div>
    </div>
	

	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Descripcion:</label>
        <div class='col-xs-9'>
            <textarea rows='7' class='form-control' placeholder='Descripcion' name='descripcion' >$contenido</textarea>
        </div>
    </div>

    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <input type='submit' class='btn btn-primary' value='Aceptar'>
            <input type='reset' class='btn btn-default' value='Limpiar'>
        </div>
    </div>    


	
";

    if($tipo=='revista'){

        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '0'</script>";


    }else {
        
        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '1'</script>";

    }
	
    if($estado=='borrador'){

        echo "<script type='text/javascript'>document.getElementById('estado').selectedIndex = '0'</script>";


    }else {
        
        echo "<script type='text/javascript'>document.getElementById('estado').selectedIndex = '1'</script>";

    }

	

	

	
?>
