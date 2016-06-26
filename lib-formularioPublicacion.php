<?php



echo "


    <div class='form-group'>
        <label class='control-label col-xs-2'>Titulo:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Titulo de publicacion' name='titulo'>
        </div>
    </div>
	
	    <div class='form-group'>
        <label class='control-label col-xs-2'>Tipo:</label>
        <div class='col-xs-9'>
		<select class='form-control' name='tipo'>
			<option value='revista'>Revista</option>
			<option value='diario'>Diario</option>
		</select>
        </div>
    </div>
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Seleccionar Imagen:</label>
        <div class='col-xs-9'>
            <input class='form-control' name='uploadedfile' placeholder='Seleccionar Imagen' type='file' />
        </div>
    </div>	
	
    <div class='form-group'>
        <label class='control-label col-xs-2'>Descripcion:</label>
        <div class='col-xs-9'>
            <textarea rows='7' class='form-control' placeholder='Descripcion' name='descripcion'></textarea>
        </div>
    </div>


	

    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <input type='submit' class='btn btn-primary' value='Aceptar'>
            <input type='reset' class='btn btn-default' value='Limpiar'>
        </div>
    </div>    
	



";

	

	

	
?>
