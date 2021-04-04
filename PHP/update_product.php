<?php
	session_start();
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	else if($_SESSION['privilegio']==1)
	{
		die(header('Location:index2.php'));
	}
	include('conexDB.php');	
	include('cabecera.php');
	@$id_animales=$_POST['id_animales'];
	$query="SELECT * FROM ANIMALES WHERE id_animales=".$id_animales."";
	//echo "<br>".$query;
	$resultado=mysql_query($query);

	$num=mysql_affected_rows();
	if($num==0){
		echo'<script>alert("ERROR AL MODIFICAR LA TABLA DE ANIMALES. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
		exit();
	}
	$fila=mysql_fetch_array($resultado);	
	if($_POST['descripcion']) {
		$fila['descripcion']=$_POST['descripcion'];
	}
	if($_POST['tipo_animal']) {
		$fila['tipo_animal']=$_POST['tipo_animal'];
	}
	if($_POST['tipo_producto']) {
		$fila['tipo_producto']=$_POST['tipo_producto'];
	}
	if($_POST['imagen_ruta']) {
		$fila['imagen_ruta']=$_POST['imagen_ruta'];
	}
	if($_POST['limite_producto']) {
		$fila['limite_producto']=$_POST['limite_producto'];
	}
	if($_POST['precio']) {
		$fila['precio']=$_POST['precio'];
	}
	//Estos if, son para coger el elemento modificado que ha introducido el usuario, para que si el usuario no quiere modificar un parametro, se queda tal cual.
	
	@$descripcion=$fila['descripcion'];
	@$tipo_animal=$fila['tipo_animal'];
	@$tipo_producto=$fila['tipo_producto'];
	@$imagen_ruta=$fila['imagen_ruta'];
	@$limite_producto=$fila['limite_producto'];
	@$precio=$fila['precio'];
		
		
	$descripcion=trim($descripcion);
	$tipo_animal=trim($tipo_animal);
	$tipo_producto=trim($tipo_producto);
	$imagen_ruta=trim($imagen_ruta);
	$limite_producto=trim($limite_producto);
	$precio=trim($precio);
	$id_animales=trim($id_animales);

	
	$descripcion=addslashes($descripcion);
	$tipo_animal=addslashes($tipo_animal);
	$tipo_producto=addslashes($tipo_producto);
	$imagen_ruta=addslashes($imagen_ruta);
	$limite_producto=addslashes($limite_producto);
	$id_animales=addslashes($id_animales);
	$precio=addslashes($precio);
	$query="UPDATE ANIMALES SET descripcion='".$descripcion."',tipo_animal='".$tipo_animal."',tipo_producto='".$tipo_producto."',imagen_ruta='".$imagen_ruta."',limite_producto=".$limite_producto.",precio=".$precio." WHERE id_animales='".$id_animales."'";
	//echo "<br>".$query."<br>";
	$resultado=mysql_query($query);
	
	if($resultado){
		echo'<br><h1 class="mensajeusuario">&#161Producto modificado!</h1><br>';	//&#161 es ¡
	}
	else {
		echo '<script>alert("ERROR AL MODIFICAR EL PRODUCTO, POR FAVOR INTENTELO DE NUEVO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
	}	
	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	
	include('pie.php');
?>