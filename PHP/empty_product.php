<?php

	session_start();
	/*Comprobamos que el usuario esta logueado*/
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	
	
	include('cabecera.php');
	
	include('conexDB.php');
	
	/*Obtenemos el id del producto que queremos borrar del carro*/
	$id_eliminar=$_GET['id_eliminar'];
	
	/*Eliminamos ese producto del carro*/
	unset($_SESSION['carrito'][$id_eliminar]);
	
	/*En caso de que no se haya  borrado el producto*/
	if(isset($_SESSION['carrito'][$id_eliminar]))
	{
		echo '<H1 STYLE="text-aling:center">ERROR AL ELIMINAR EL PRODUCTO.</H1>';
	}
	/*Si se ha borrado*/
	else
	{
		echo '<script>window.location="carritoCompra.php"</script>';
	
	}
	
	
	
	include('pie.php');
?>