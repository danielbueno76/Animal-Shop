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
	@$descripcion=$_POST['descripcion'];
	@$tipo_animal=$_POST['tipo_animal'];
	@$tipo_producto=$_POST['tipo_producto'];
	@$imagen_ruta=$_POST['imagen_ruta'];
	@$limite_producto=$_POST['limite_producto'];
	@$precio=$_POST['precio'];

	$descripcion=trim($descripcion);
	$tipo_animal=trim($tipo_animal);
	$tipo_producto=trim($tipo_producto);
	$imagen_ruta=trim($imagen_ruta);
	$limite_producto=trim($limite_producto);
	$precio=trim($precio);


	if(!$descripcion || !$tipo_animal || !$tipo_producto || !$imagen_ruta || !$limite_producto || !$precio){
		echo '<script>alert("ERROR AL CREAR EL PRODUCTO, FALTA ALGUN CAMPO. POR FAVOR, VUELVE A INTENTARLO");window.history.back();</script>';
		exit();
	}
	
	$descripcion=addslashes($descripcion);
	$tipo_animal=addslashes($tipo_animal);
	$tipo_producto=addslashes($tipo_producto);
	$imagen_ruta=addslashes($imagen_ruta);
	$limite_producto=addslashes($limite_producto);
	$precio=addslashes($precio);
	

	$query="INSERT INTO ANIMALES VALUES (NULL,'".$descripcion."','".$tipo_animal."','".$tipo_producto."','".$imagen_ruta."',".$limite_producto.",".$precio.")";
	//echo "<br>".$query."<br>";
	$resultado=mysql_query($query);
	
	if($resultado){
		echo'<br><h1 class="mensajeusuario">&#161Producto creado!</h1><br>';	//&#161 es ¡
	}
	else {
		echo '<script>alert("ERROR AL AÑADIR EL PRODUCTO. POR FAVOR, INTENTELO DE NUEVO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
	}
		echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>