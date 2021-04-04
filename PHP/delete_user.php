<?php	
	session_start();
	
	if(!$_SESSION['login']) //Comprobamos que el usuario este logueado
	{
		die(header('Location:index.php')); //Si no esta logueado, vuelve a la pagina principal
	}
	else if($_SESSION['privilegio']==1) //Comprobamos los privilegios del usuario
	{
		die(header('Location:index2.php')); //Si el usuario no tiene privilegios de administrador, vuelve a la pagina principal adaptada para un usuario logueado
	}
	
	include('conexDB.php');	
	include('cabecera.php');
	
	@$login=$_GET['login'];

	$query="DELETE FROM USUARIOS WHERE login='".$login."'"; //borramos la entrada/s de usuarios donde coincida el login

	//echo"$query";
	$resultado=mysql_query($query);
	
	$num=mysql_affected_rows();
	//Comprobaciones en caso de errores, y si no, mostramos un mensaje señalando que todo ha ido bien
	if($num==0){
		echo'<script>alert("NO SE HA ENCONTRADO NINGUN DATO PARA BORRAR");window.history.back();</script>';
	}
	else if(!$resultado){
		echo'<script>alert("ERROR AL BORRAR LA FILA. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
	}
	else {
		echo'<br><h1 class="mensajeusuario">&#161Usuario borrado!</h1><br>';
	}
	
	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>'; //Este enlace sirve para volver a la pagina de administracion
	include('pie.php');
?>