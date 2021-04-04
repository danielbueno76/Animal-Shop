<?php

	session_start();
	/*Comprobamos que el usuario esta logueado*/
	if (!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	include('cabecera.php');
	include('conexDB.php');	
	
	echo '<H1 STYLE="text-align:center">CARRO DE LA COMPRA</H1>
	<br><br><br>';	
	
	$i=1;
	
	/*Si existe la session carrito y no esta vacia*/
	if((isset($_SESSION['carrito'])) && (count($_SESSION['carrito'])!= 0))
	{
		
		$coste_total = 0;
		$coste_Producto=0;
		
		$carrito=$_SESSION['carrito'];
		
		/*Creamos la tabla*/
		echo '<table STYLE="position:relative;border:2px">';
	
		foreach ($carrito as $id_animales=>$cantidad)
		{
		$coste_Producto=0;
		$query ="SELECT * FROM animales WHERE id_animales=".$id_animales."";
		$resultado=mysql_query($query);
		/*Comprobacion resultado*/
		if(!$resultado){
		echo'<script>alert("ERROR AL SELECCIONAR EL PRODUCTO . POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
		exit();
	}
		
		$fila=mysql_fetch_array($resultado);
		
		/*Calculamos el coste de cada producto*/
		$coste_Producto = $carrito[$id_animales]['cantidad'] * $fila['precio'];
		
		// echo $_SESSION['id_pedido'];
		
		$aux[$i]=$id_animales;

		echo '<tr STYLE="position:relative;padding-top:5px">
			  <td STYLE="width:400px"><IMG STYLE="position:relative;width:400px;height:300px" SRC='."../Imagenes".$fila['imagen_ruta'].'></td>
			  <td STYLE="min-width:500px"><p STYLE="position:relative;left:30%"> Producto: '.stripslashes($fila['descripcion']).'. Precio: '.$fila['precio'].' €/unidad. Cantidad:'.$carrito[$id_animales]['cantidad'].' unidades. Coste= '.$coste_Producto.' €</p></td>
			  <td STYLE="width:500px;text-decoration:none;"><a href='."empty_product.php?id_eliminar=".$aux[$i].'><IMG STYLE="position:relative;width:30px;height:30px;left:75%" SRC="../Imagenes/borrar.png"></a></td>
			  </tr>';
			  
			  /*calculamos el coste total del carro*/
			  $coste_total = $coste_Producto + $coste_total;
			  
			  ++$i;
				
		}
	
		echo '</table>';
	
		/*Creamos una variable session para guardar el coste total*/
		$_SESSION['coste_total']=$coste_total;
		
		echo '<p STYLE="position:relative;left:75%">COSTE TOTAL='.$coste_total.' €</p>';
		
		echo '<a href="addPedido.php"><INPUT VALUE="TERMINAR COMPRA" type="button" STYLE="position:relative;left:75%"></a>';
	}
	else 
	{
		echo '<H1 STYLE="text-align:center">NO TIENE NINGUN PRODUCTO AÑADIDO A SU CARRO</H1>';
	}
	
	
	
	
	include('pie.php');
	
?>