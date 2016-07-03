function mostrarGeneral()
{
		document.getElementById('general').style.display = 'block';
		document.getElementById('secciones').style.display = 'none';
		document.getElementById('articulos').style.display = 'none';
		document.getElementById('botongeneral').className = 'btn btn-success btn-lg';
		document.getElementById('botonsecciones').className = 'btn btn-primary btn-lg';
		document.getElementById('botonarticulos').className = 'btn btn-primary btn-lg';
		
}

function mostrarSecciones()
{
		document.getElementById('general').style.display = 'none';
		document.getElementById('secciones').style.display = 'block';
		document.getElementById('articulos').style.display = 'none';
		document.getElementById('botongeneral').className = 'btn btn-primary btn-lg';
		document.getElementById('botonsecciones').className = 'btn btn-success btn-lg';
		document.getElementById('botonarticulos').className = 'btn btn-primary btn-lg';
}

function mostrarArticulos()
{
		document.getElementById('general').style.display = 'none';
		document.getElementById('secciones').style.display = 'none';
		document.getElementById('articulos').style.display = 'block';
		document.getElementById('botongeneral').className = 'btn btn-primary btn-lg';
		document.getElementById('botonsecciones').className = 'btn btn-primary btn-lg';
		document.getElementById('botonarticulos').className = 'btn btn-success btn-lg';
}