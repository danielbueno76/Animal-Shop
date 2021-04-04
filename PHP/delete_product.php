<?php
	session_start();
	/*Comprobamos que el usuario esta conectado*/
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php')); //Si no esta logueado, vuelve a la pagina principal
	}
	/*Comprobamos permisos de administrador*/
	else if($_SESSION['privilegio']==1)
	{
		die(header('Location:index2.php'));  //Si el usuario no tiene privilegios de administrador, vuelve a la pagina principal adaptada para un usuario logueado
	}
	
	include('conexDB.php');	
	include('cabecera.php');
	@$id_animales=$_GET['id_animales'];

	$query="DELETE FROM ANIMALES WHERE id_animales=".$id_animales."";
	$resultado=mysql_query($query);
	
	$num=mysql_affected_rows();
	/*En caso de que no haya entrada para ese producto en la tabla*/
	if($num==0){
		echo'<script>alert("NO SE HA ENCONTRADO NINGUN DATO PARA BORRAR");window.history.back();</script>';
	}
	else if(!$resultado){
		echo'<script>alert("ERROR AL BORRAR LA FILA. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
	}
	else {
		echo'<br><h1 class="mensajeusuario">&#161<Producto borrado!</h1><br>'; //mostramos un mensaje diciendo que todo ha salido bien.
	}
	
	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>'; //Este enlace sirve para volver a la pagina de administracion
	include('pie.php');
?>