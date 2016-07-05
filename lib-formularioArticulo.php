<?php
    
    include "conexion.php";
	$titulo = $_GET["titulo"];
	$id_publicacion = $_GET["id_publicacion"];



    
    //Si recibimos algun parametro por GET significa que se va a editar un articulo
    if (isset($_GET["id_articulo"])){
        $id_publicacion = $_GET["id_articulo"];

        $sql = "select p.nombre titulo, p.descripcion descripcion, i.url, p.tipo_publicacion from publicacion p join imagen i on p.imagen_id = i.id_imagen
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
                  
                    
                    } 
                    
                
                }
    //Si no recibimos ningun parametro significa que estamos creando una publicacion    
    }else{

    $subtitulo = "";
    $contenido = "";

    $tipo = "";
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
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='titulo' value=$titulo>
        </div>
    </div>
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Subtitulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='subtitulo' value=$subtitulo>
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







                  $sql = "select s.nombre seccion, s.id_seccion id from publicacion p join seccion s on s.publicacion_id = p.id_publicacion
              where $id_publicacion=p.id_publicacion";


            
            $result=mysql_query($sql, $conexion) or die (mysql_error());

   
                     while ($row=@mysql_fetch_array($result)) 
                    { 

                    
                    echo "<option value=$row[id]>$row[seccion]</option>";
                    
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

    if($tipo=='revista'){

        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '0'</script>";


    }else {
        
        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '1'</script>";

    }

	

	

	
?>
