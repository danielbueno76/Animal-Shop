/*ComprobarDNI se encarga de verificar que el dni introducido es correcto y existe realmente*/
function comprobarDNI() 
{ 
	dni = document.formulario.DNI.value;
	numero = dni.substr(0,dni.length-1);
    let = dni.substr(dni.length-1,1);
    numero = numero % 23;
    letras='TRWAGMYFPDXBNJZSQVHLCKET';
    letra=letras[numero];
	if (letra!=let.toUpperCase()) {
       alert("Su DNI no es correcto, vuelva introducirlo.");
	   return false;
     }
	else{
	   return true;
     }
}