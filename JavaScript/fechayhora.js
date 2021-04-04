window.onload = setTimeout("fechayhora();",1000);
/*Funcion encargada de obtener la fecha y hora para posteriormente mostrarla en la web*/
function fechayhora(){
	
	var fecha=new Date();
	
	var meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var dias=new Array('Domingo,','Lunes,','Martes,','Miercoles,','Jueves,','Viernes,','Sábado,');
	
	var dia=fecha.getDay();
	
	if(fecha.getHours()<10){
		var hora = "0" + fecha.getHours(); //Para que las horas de un solo digito aparezcan con un 0 delante.
		}
	else 
		hora = fecha.getHours();
		
	if(fecha.getMinutes()<10){
		var minutos = "0" + fecha.getMinutes();
	}
	else
		minutos = fecha.getMinutes();
	
	if(fecha.getSeconds()<10){
		var segundos = "0" + fecha.getSeconds();
	}
	else
		segundos = fecha.getSeconds();
	
	var mes=fecha.getMonth();
	/*Finalmente se genera la cadena de caracteres que va dar formato a la fecha y hora.*/
    var fechaFinal=dias[dia]+" "+fecha.getDate()+" de "+meses[mes]+" de "+fecha.getFullYear()+". "+hora+":"+minutos+":"+segundos;
	document.getElementById("fecha").innerHTML = fechaFinal;
	setTimeout("fechayhora();",1000);//se actualiza cada 1000ms, 1s 
}
