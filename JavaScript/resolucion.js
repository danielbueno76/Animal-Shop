window.onload = setTimeout("resolution();",1000);
var inicio=true;
/*Esta función se encarga de obtener la resolucion de la ventana del navegador*/
function resolution(){
	var infResolucion="Resoluci\u00F3n:" + document.documentElement.clientWidth + "x" + document.documentElement.clientHeight;
	document.getElementById("resolucion").innerHTML=infResolucion;
	inicio=false;
	setTimeout("resolution();",1000);
	
}

