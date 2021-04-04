/*Función  encargada de restablecer los campos de usuarios */
function restablecerusuario(numLetras){
	if(confirm("¿Desea borrar todos los campos del formulario?"))
	{
		document.formulario.reset();
	}
}