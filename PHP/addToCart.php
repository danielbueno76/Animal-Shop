<?php

	session_start();
	
	/*Comprobamos que el usuario esta logueado*/
	if(!$_SESSION['login']) 
	{
		/*En caso de no estarlo, te envia a index para que lo hagas*/
		die(header('Location:index.php'));
	}
	
	
	include('cabecera.php');
	
	include('conexDB.php');
	
	
	@$cantidad=$_POST['cantidad'];
	@$id_animales=$_GET['id_animales'];
	@$login=$_SESSION['login'];
	@$limiteProducto=$_SESSION['limiteProducto'];
	
	/*Si no existe la variable id_pedido, es decir aun no ha añadido nada a carro, se le crea*/
	if(!$_SESSION['id_pedido']) 
	{
		/*Creamos una variable para el coste total, y la inicializamos a 0*/
		$coste_Total=0;
		
		$fecha=date("Y-m-d H:i:s");
		
		$fecha=trim($fecha);
		
		$fecha=addslashes($fecha);
		
		/*Insertamos una entrada en la tabla pedido para este usuario, de forma que le asignamos un id ya fijo y evitamos problemas 
		de concurrecia con otros usuarios*/
		$query="INSERT INTO pedidos VALUES (NULL,'".$login."', ".$coste_Total.", '".$fecha."')";
		
		$resultado=mysql_query($query);
		/*Comprobar la consulta */ 
		if(!$resultado){
			echo'<script>alert("ERROR AL SELECCIONAR EL PRODUCTO A MOSTRAR. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
			exit();
		}
		/*Seleccionamos todas las lineas de la tabla ordenadas por id_pedido desceniente con el objetivo
		de coger el id del ultimo de los productos de la lista*/
		$query="SELECT * FROM pedidos ORDER BY id_pedido DESC LIMIT 1";
		$resultado=mysql_query($query);
		
		if(!$resultado){
			echo'<script>alert("ERROR AL SELECCIONAR EL PRODUCTO A MOSTRAR. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
			exit();
		}
		
		$fila = mysql_fetch_array($resultado);
		/*creamos la variable session id_pedido asignandole el valor de*/
		$_SESSION['id_pedido']=$fila['id_pedido'];
			
	}
	
	/*Buscamos en la tabal animales el id del animal seleccionado*/
	$query ="SELECT * FROM animales WHERE id_animales=".$id_animales."";
	$resultado=mysql_query($query);
	/*Comprobacion del $query*/
	if(!$resultado){
		echo '<script>alert("ERROR AL ACCEDER A LA TABLA ANIMALES DE LA BASE DE DATOS");window.history.back();</script>';
		exit();
	}
	
	$num=mysql_num_rows($resultado);
	
	/*Si el número de filas con ese id es uno (caso correcto)*/
	if($num==1)
	{
		$fila = mysql_fetch_array($resultado);
		/*Si la cantidad de ese producto es mayor que el numero de unidades, o el numero es 0 o menor(negativo) se muestra un mensaje de error
		y te devuelve a la página anterior*/
		if(($cantidad > $limiteProducto)||($cantidad <= 0))
		{
			echo '<script>alert("ERROR. LA CANTIDAD INTRODUCIDA ES INCORRECTA. POR FAVOR INTRODUZCA UN VALOR ADECUADO");window.history.back();</script>';
			exit();
		}
		/*En caso de ser una cantidad adecuada*/
		else{
			
			/*Si existe la session carrito*/
			if(isset($_SESSION['carrito']))
			{				
				$carrito=$_SESSION['carrito'];
				/*Si existe y tiene una entrada ya creada para el id del producto*/
				if(isset($carrito[$id_animales]))
				{
					$cantidad=$carrito[$id_animales]['cantidad']+$cantidad;
					$_SESSION['carrito'][$id_animales] = array('cantidad'=> $cantidad);
				}
				/*Si no tiene ninguna entrada para ese producto se crea*/
				else
				{
					$_SESSION['carrito'][$id_animales] = array('cantidad'=> $cantidad);
					// $_SESSION['carrito'][$id_animales] = array('cantidad'=> $cantidad);	
				}
			}
			/*Si no existe la session carrito la crea*/
			else
			{				
				$_SESSION['carrito'][$id_animales] = array('cantidad'=> $cantidad);			
				
			}
			
			echo '<H1>PRODUCTO AÑADIDO AL CARRO DE LA COMPRA</H1>';
			
			echo '<script>window.location="carritoCompra.php"</script>';
		}
	}
		
		
	include('pie.php');
?>