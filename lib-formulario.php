<?php
//$error_usuario=null;
//if(!empty($_GET['error_usuario']))
//$error_usuario=$_GET['error_usuario'];

//$error_usuario=$_GET['error_usuario'];

echo "
<form class='form-horizontal' action='crearUsuario.php' method='post'>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Usuario: </label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' id='inputEmail' placeholder='Nombre de usuario' name='usuario'>
			
        </div>



    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Nombre:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Nombre' name='nombre'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Apellido:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='Apellido' name='apellido'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>DNI:</label>
        <div class='col-xs-9'>
            <input type='text' class='form-control' placeholder='DNI' name='dni'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Email:</label>
        <div class='col-xs-9'>
            <input type='email' class='form-control' id='inputEmail' placeholder='Email' name='mail'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Password:</label>
        <div class='col-xs-9'>
            <input type='password' class='form-control' id='inputPassword' placeholder='Password' name='clave'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Confirmar Password:</label>
        <div class='col-xs-9'>
            <input type='password' class='form-control' placeholder='Confirmar Password'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2' >Telefono:</label>
        <div class='col-xs-9'>
            <input type='tel' class='form-control' placeholder='Telefono' name='telefono'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2' >F. Nacimiento</label>
        <div class='col-xs-9'>
            <input type='tel' class='form-control' placeholder='Fecha' name='fecha'>
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-2'>Direccion:</label>
        <div class='col-xs-9'>
            <textarea rows='3' class='form-control' placeholder='Direccion' name='direccion'></textarea>
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
</form>

";
