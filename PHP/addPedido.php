<?php

	session_start();
	
	/*Se comprueba que el usuario haya iniciado sesion*/
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	
	include('cabecera.php');
	
	include('conexDB.php');
	
	$id_pedido = $_SESSION['id_pedido'];
	$coste_total=$_SESSION['coste_total'];
	$carrito=$_SESSION['carrito'];
	$login=$_SESSION['login'];
	
	$fecha=date("Y-m-d H:i:s");
	
	$fecha=trim($fecha);
	
	$fecha=addslashes($fecha);
	
	/*creamos una variable cont, que se inicializa a 0*/
	$cont=0;
		
	/*PARA EVITAR USUARIOS CONCURRENTES QUE HAN PODIDO COMPRAR EL PRODUCTO*/
	/*Este caso se da cuando el usuario ha añadido ciertos productos a su cesta pero antes de tramitar el pedido se le adelanta
	otro usuario*/
	foreach ($carrito as $id_animales=>$cantidad)
	{
		$query ="SELECT * FROM animales WHERE id_animales=".$id_animales."";
		$resultado=mysql_query($query);
		/*Comprobacion resultado*/
		if(!$resultado){
			echo'<script>alert("ERROR AL SELECCIONAR EL PRODUCTO A MOSTRAR. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
			exit();
		}
		$fila=mysql_fetch_array($resultado);
		
		/*Si la cantidad de la que se dispone es mayo o igual a la que se esta queriendo comprar*/
		if($fila['limite_producto']>=$carrito[$id_animales]['cantidad'])
		{
			++$cont;/*Incrementamos el contador*/	
		}
		/*En caso de que la cantidad sea superior a las unidades que hay disponibles*/
		else{
			/*Eliminamos ese producto del carrito*/
			unset($_SESSION['carrito'][$id_animales]); /*En caso de que no quede mas de ese producto se elimina*/
		}
	}

/*Si el número de productos de carrito, es igual a cont. Es decir si todos los productos 
que hay en el carro pueden ser comprados*/
if($cont == count($_SESSION['carrito']))
{	
		/*Como ya habiamos creado una entrada en la tabla, la actualizamos*/
		$query="UPDATE PEDIDOS SET coste_total=".$coste_total.",fecha='".$fecha."' WHERE id_pedido=".$id_pedido."";
		$resultado=mysql_query($query);
		
		if(!$resultado){
			echo '<script>alert("ERROR AL AÑADIR EL PEDIDO EN LA TABLA PEDIDOS");window.history.back();</script>';
		}	
	
	/*Actualizamos la tabla de animales*/
	foreach ($carrito as $id_animales=>$cantidad)
	{
		$query ="SELECT * FROM animales WHERE id_animales=".$id_animales."";
		$resultado=mysql_query($query);
		/*Comprobacion resultado*/
		if(!$resultado){
			echo '<script>alert("ERROR AL AÑADIR EL PEDIDO EN LA TABLA PEDIDOS");window.history.back();</script>';
		}
		
		$fila=mysql_fetch_array($resultado);
		/*Obtenemos la nueva cantidad que nos queda de un producto*/
		$cantidadProd = $fila['limite_producto']-$carrito[$id_animales]['cantidad'];
		/*Actualizamos la tabla animales*/
		$query="UPDATE animales SET limite_producto=".$cantidadProd." WHERE id_animales=".$id_animales."";
		$resultado=mysql_query($query);
	
		if(!$resultado){
			echo '<script>alert("ERROR AL AÑADIR EL  LIMITE DE ANIMALES");window.history.back();</script>';
		}
				
		/*AÑADIMOS  LOS PRODUCTOS A LA TABLA PEDIDO_ANIMALES*/	
		$query="INSERT INTO pedido_animales VALUES (".$id_pedido.",".$id_animales.",".$carrito[$id_animales]['cantidad'].")";
		$resultado=mysql_query($query);
		if(!$resultado){
			echo '<script>alert("PROBLEMA AL ACTUALIZAR PEDIDO_ANIMALES");window.history.back();</script>';
		}
		

	}
	/*Eliminamos determinadas variables session*/
	unset($_SESSION['carrito']);
	unset($_SESSION['id_pedido']);
	unset($_SESSION['coste_total']);
	unset($_SESSION['limiteProducto']);
	/*Mostramos el mensaje de pedido añadido correctamente*/
	echo'<br><h1 class="mensajeusuario">&#161PEDIDO REALIZADO CORRECTAMENTE!</h1><br>';
}
/*En caso de que alguno de los productos no pueda ser comprado*/
else{
	echo '<script>alert("ERROR, ALGUNO DE LOS PRODUCTOS DE SU CARRO YA NO ESTA DISPONIBLES.");window.location="carritoCompra.php"</script>';
}
	
	
	include('pie.php');
?>