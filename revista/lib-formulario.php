<?php
//$error_usuario=null;
//if(!empty($_GET['error_usuario']))
//$error_usuario=$_GET['error_usuario'];

//$error_usuario=$_GET['error_usuario'];


//Si no estan seteadas las variables, las creamos vacias.
if (!isset($usuario))
$usuario="";
if (!isset($nombre))
$nombre="";
if (!isset($apellido))
$apellido="";
if (!isset($dni))
$dni="";
if (!isset($mail))
$mail="";
if (!isset($clave))
$clave="";
if (!isset($telefono))
$telefono="";
if (!isset($fecha))
$fecha="";
if (!isset($direccion))
$direccion="";
if (!isset($sexo))
$sexo="";



echo "


    <div class='form-group'>
        <label class='control-label col-xs-2'>Usuario: </label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' id='inputEmail' placeholder='Nombre de usuario' name='usuario' value=$usuario>
			
        </div>



    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Nombre:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Nombre' name='nombre' value=$nombre>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Apellido:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Apellido' name='apellido' value=$apellido>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>DNI:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='DNI' name='dni'value=$dni>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Email:</label>
        <div class='col-xs-9'>
            <input type='email' class='form-control' id='inputEmail' placeholder='Email' name='mail' value=$mail>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Password:</label>
        <div class='col-xs-9'>
            <input type='password' class='form-control' id='inputPassword' placeholder='Password' name='clave' value=$clave>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Confirmar Password:</label>
        <div class='col-xs-9'>
            <input type='password' class='form-control' placeholder='Confirmar Password' value=$clave>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2' >Telefono:</label>
        <div class='col-xs-9'>
            <input type='tel' class='form-control' placeholder='Telefono' name='telefono' value=$telefono>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2' >F. Nacimiento</label>
        <div class='col-xs-9'>
            <input type='tel' class='form-control' placeholder='Fecha' name='fecha' id='fecha' value=$fecha>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Direccion:</label>
        <div class='col-xs-9'>
            <textarea rows='3' class='form-control' placeholder='Direccion' name='direccion'>$direccion</textarea>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Genero:</label>
        <div class='col-xs-2'>
            <label class='radio-inline'>
                <input type='radio' name='genderRadios' value='m'> Maculino
            </label>
        </div>
        <div class='col-xs-2'>
            <label class='radio-inline'>
                <input type='radio' name='genderRadios' value='f'> Femenino
            </label>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <label class='checkbox-inline'>
                <input type='checkbox' value='agree'>  Accepto <a href='#'>Terminos y condiciones</a>.
            </label>
        </div>
    </div>
    <br>
    <div class='form-group'>
        <div class='col-xs-offset-3 col-xs-9'>
            <input type='submit' class='btn btn-primary' value='Enviar'>
            <input type='reset' class='btn btn-default' value='Limpiar'>
        </div>
    </div>
	
	

";

	if ($sexo=='m'){
		echo"
		
		<script type='text/javascript'>
		$('input:radio[name=genderRadios]:nth(0)').attr('checked',true);
		</script>
		
		";
	}
	
	elseif ($sexo=='f'){
		echo"
		
		<script type='text/javascript'>
		$('input:radio[name=genderRadios]:nth(1)').attr('checked',true);
		</script>
		
		";
	}
	
	//Si la variable usuario no esta vacia, desactivamos el input correspondiente ya que se trata de una modificar de usuario
	if (strlen($usuario)>4)
	{
			echo"
		
		<script type='text/javascript'>
		$('input:text[name=usuario]').attr('disabled',true);
		</script>
		
		";

	}
	
	
	//Datapicker
	

	
?>
