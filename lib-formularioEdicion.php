<?php
    
    include "conexion.php";

	
    
    //Si recibimos algun parametro por GET significa que se va a editar la edicion
    if (isset($_GET["id_edicion"])){
        $id_edicion = $_GET["id_edicion"];

        $sql = "select * from edicion
            where $id_edicion=id_edicion";


            
            $result=mysql_query($sql, $conexion) or die (mysql_error());

            if (mysql_num_rows($result)>0)
                {
                     while ($row=@mysql_fetch_array($result)) 
                    { 

						$identificacion=$row['identificacion'];
                        $fecha = $row['fecha'];
                        $precio = $row['precio'];
                        $estado = $row['estado'];
                        $pais = $row['pais'];
                  
                    
                    } 
                    
                
                }
    //Si no recibimos ningun parametro significa que estamos creando una edicion   
    }else{

						$identificacion="";
                        $fecha ="";
                        $precio ="";
                        $estado ="";
                        $pais ="";
    }

echo "


    <div class='form-group'>
        <label class='control-label col-xs-2'>Titulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de edicion' name='identificacion' value='$identificacion'>
        </div>
    </div>
	
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Precio:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Precio' name='precio' value='$precio'>
        </div>
    </div>  
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Pais:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Pais' name='pais' value='$pais'>
        </div>
    </div>  

	
	    <div class='form-group'>
        <label class='control-label col-xs-2'>Estado:</label>
        <div class='col-xs-9'>
		<select class='form-control' name='estado' id='tipo'>
			<option value='borrador'>Borrador</option>
			<option value='listo'>Lista para publicar</option>
		</select>
        </div>
    </div>
	
    
	

    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <input type='submit' class='btn btn-primary' value='Aceptar'>
            <input type='reset' class='btn btn-default' value='Limpiar'>
        </div>
    </div>    


	
";

    if($estado=='borrador'){

        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '0'</script>";


    }else {
        
        echo "<script type='text/javascript'>document.getElementById('tipo').selectedIndex = '1'</script>";

    }

	

	

	
?>
