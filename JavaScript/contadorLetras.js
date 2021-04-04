/*Función  encargada de restablecer los campos de usuarios y reiniciar el contador
de las letras del mensaje*/
function restablecer(numLetras){
	if(confirm("¿Desea borrar todos los campos del formulario?"))
	{
		setTimeout(contadorLetras(numLetras),1000);
		document.formulario.reset();
	}
}
/*Función encargada de contar cuantas letras contiene el campo mensaje y limitarle
 a un numero específico, en este caso 500*/
function contadorLetras(numLetras){
	if (numLetras.value.length > 500)
		numLetras.value = numLetras.value.substring(0, limite); 
	else 
		document.getElementById("contador").innerHTML= + (500 - numLetras.value.length) + "/500 caracteres."; 
}