<?php
	
	
	session_start();
	
	include('cabecera.php');
	include('conexDB.php');
	
	/*Tomamos el id_animales pasado en la llamada*/
	$id_animales=$_GET['id_animales'];
	
	$query ="SELECT * FROM animales WHERE id_animales=".$id_animales."";
	$resultado=mysql_query($query);
	/*Comprobación para ver si la peticion a la base de datos ha sido correcta*/
	if(!$resultado){
		echo'<script>alert("ERROR AL SELECCIONAR EL PRODUCTO A MOSTRAR. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
		exit();
	}
	/*Obtenemos el numero de filas en las que aparece el id_animales*/
	$num=mysql_num_rows($resultado);
	
	/*Si solo esta una vez el id_animales en la tabla*/
	if($num==1)
	{
	
		$fila = mysql_fetch_array($resultado);
		
		/*Si la session carrito existe previamente*/
		if(isset($_SESSION['carrito'][$id_animales]))
		{
			$carrito=$_SESSION['carrito'];
			$limiteProducto = $fila['limite_producto'] - $carrito[$id_animales]['cantidad'];
		}
		/*Si la session carrito no existe*/
		else{
			$limiteProducto=$fila['limite_producto'];
		}
		
		/*Si un producto esta agotado*/
		if($limiteProducto==0) {
			echo'<script>alert("PRODUCTO AGOTADO");window.history.back();</script>';
		}
		
		/*Mostramos los datos en forma de tabla*/
		echo '<table>';
		echo '<tr>
			<td STYLE="width:300px;heigth:300px" >
				<IMG STYLE="position:relative" SRC='."../Imagenes".$fila['imagen_ruta'].' CLASS="imagenCompra">
			</td>
			<td STYLE="width:500px">
				<H1 STYLE="position:relative;left:15%">'.stripslashes($fila['descripcion']).'</H1><br3>
				<p STYLE="position:relative;left:15%">Categoria: '.$fila['tipo_producto'].'.</p><br>
				<p STYLE="position:relative;left:15%">Animal: '.$fila['tipo_animal'].'.</p><br>
				<p STYLE="position:relative;left:15%">Nº de unidades: '.$limiteProducto.' unidades.</p><br>
				<p STYLE="position:relative;left:15%">PRECIO: '.$fila['precio'].'€</p>';
			
				echo '
				<FORM NAME="formulario" ACTION="addToCart.php?id_animales='.$fila['id_animales'].'" METHOD="post" autocomplete="on">
				<DIV STYLE="position:relative;left:15%">
				<DIV style="font-weight: bold;">Cantidad:</DIV>
				<INPUT class="caja" TYPE="NUMBER"  NAME="cantidad" PLACEHOLDER="Introduzca la cantidad" min="1" max="'.$limiteProducto.'">
				</DIV><br>
				<DIV>
				<INPUT STYLE="position:relative;left:15%" VALUE="AÑADIR A CARRO" TYPE="submit">
				</DIV>
				<br><br>
				</FORM>
			</td></tr></table>';
			
			/*Creamos una variable global que recoge el numero de productos que disponemos despues de añadir cierta cantidad a el carro.*/
			$_SESSION['limiteProducto']=$limiteProducto;
	}
	/*En caso de que aparezca un numero de veces que no sea 1, mostrará un mensaje de error*/
	else {
		echo'<script>alert("ERROR AL MOSTRAR LA CESTA. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
		exit();
	}
			
		
	include('pie.php');
?>