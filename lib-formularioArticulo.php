<?php
    
    include "conexion.php";
	
	$id_edicion = $_GET["id_edicion"];



    
    //Si recibimos algun parametro por GET significa que se va a editar un articulo
    if (isset($_GET["id_articulo"])){
        $id_articulo = $_GET["id_articulo"];

        $sql = "select * from articulo a join seccion s on a.seccion_id = s.id_seccion join imagen i on a.cabecera = i.id_imagen
            where $id_articulo=a.id_articulo";


            
            $result=mysql_query($sql, $conexion) or die (mysql_error());

            if (mysql_num_rows($result)>0)
                {
                     while ($row=@mysql_fetch_array($result)) 
                    { 
						
                        $titulo = $row['titulo'];
						$subtitulo = $row['subtitulo'];
                        $contenido = $row['texto']; //contenido del articulo
						$estado = $row['estado']; //estado del articulo
						$seccion = $row['nombre']; //nombre de la seccion
                        $imagen = $row['url'];
                        //$imagen = ""; //Por el momento no mostramos la imagen cargada
                  
                    
                    } 
                    
                
                }
    //Si no recibimos ningun parametro significa que estamos creando un articulo    
    }else{

                        $titulo = $_GET["titulo"];
						$subtitulo = "";
                        $contenido = ""; //contenido del articulo
						$estado = ""; //estado del articulo
						$seccion = ""; //nombre de la seccion
						
    }

echo "

<script type='text/javascript'>
bkLib.onDomLoaded(function() {
	new nicEditor().panelInstance('area1');
	new nicEditor({fullPanel : true}).panelInstance('area2');
	new nicEditor({iconsPath : 'imagenes/gif/nicEditorIcons.gif'}).panelInstance('area3');
	new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
	new nicEditor({maxHeight : 100}).panelInstance('area5');s
});
</script>


    <div class='form-group'>
        <label class='control-label col-xs-2'>Titulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='titulo' value='$titulo'>
        </div>
    </div>
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Subtitulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='subtitulo' value='$subtitulo'>
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
        <label class='control-label col-xs-2'>Estado:</label>
        <div class='col-xs-9'>
		<select class='form-control' name='estado' id='tipo'>
			<option value='borrador'>Borrador</option>
			<option value='listo'>Listo para publicar</option>
		</select>
        </div>
    </div>

        <div class='form-group'>
        <label class='control-label col-xs-2'>Seccion:</label>
        <div class='col-xs-9'>
        <select class='form-control' name='seccion' id='seccion'>";







                  $sql = "select s.nombre seccion, s.id_seccion id from edicion e join seccion s on s.edicion_id = e.id_edicion
              where $id_edicion=e.id_edicion";


            
            $result=mysql_query($sql, $conexion) or die (mysql_error());

   
                     while ($row=@mysql_fetch_array($result)) 
                    { 
					
					//Verificamos que seccion tenia asignado el articulo
					if($row[seccion]==$seccion)
					$seleccionado='selected';
					else
					$seleccionado='';
                    
                    echo "<option value=$row[id] $seleccionado>$row[seccion]</option>"; //Mostramos en el select las secciones de la publicacion
                    
                    } 



        echo " 
        </select>
        </div>
    </div>
	

	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Contenido:</label>
        <div class='col-xs-9'>
            <textarea rows='10' class='form-control' placeholder='Descripcion' name='contenido' id='area1' >$contenido</textarea>
        </div>
    </div>

    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <input type='submit' class='btn btn-primary' value='Aceptar'>
            <input type='reset' class='btn btn-default' value='Limpiar'>
        </div>
    </div>    


	
";

    if($estado=='listo'){

        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '1'</script>";


    }else {
        
        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '0'</script>";

    }

	

	

	
?>
