function confirmar()
{
	if(confirm("¿Estas seguro de borrar esta fila de la base de datos?"))
		return true;
	else
		return false;
}