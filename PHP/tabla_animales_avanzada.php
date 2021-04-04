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
	@$preciomax=$_POST['preciomax'];

	$descripcion=trim($descripcion);
	$tipo_animal=trim($tipo_animal);
	$tipo_producto=trim($tipo_producto);
	$imagen_ruta=trim($imagen_ruta);
	$limite_producto=trim($limite_producto);
	$preciomax=trim($preciomax);


	// if(!$descripcion || !$tipo_animal || !$tipo_producto || !$imagen_ruta || !$limite_producto || !$preciomax){
		// echo '<script>alert("ERROR AL CREAR EL PRODUCTO, FALTA ALGUN CAMPO. POR FAVOR, VUELVE A INTENTARLO");window.history.back();</script>';
		// exit();
	// }
	
	$descripcion=addslashes($descripcion);
	$tipo_animal=addslashes($tipo_animal);
	$tipo_producto=addslashes($tipo_producto);
	$imagen_ruta=addslashes($imagen_ruta);
	$limite_producto=addslashes($limite_producto);
	$preciomax=addslashes($preciomax);
	$query="SELECT * FROM ANIMALES WHERE descripcion LIKE '%".$descripcion."%' AND tipo_animal LIKE '%".$tipo_animal."%' AND tipo_producto LIKE '%".$tipo_producto."%' AND imagen_ruta LIKE '%".$imagen_ruta."%' 
		AND limite_producto LIKE '%".$limite_producto."%'"; //busqueda avanzada
	if($preciomax) {//Si existe añadimos precio
		 $query=$query." AND precio <= ".$preciomax;
	}
	//echo"$query";
	$resultado=mysql_query($query);
	if(!$resultado){
		echo'<script>alert("ERROR AL MOSTRAR LA TABLA DE ANIMALES. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
		exit();
	}	
	$num=mysql_num_rows($resultado);
	
	if($num==0){
		echo'<script>alert("NO SE HA ENCONTRADO NINGUN DATO CON ESA DESCRIPCION, POR FAVOR INTENTELO DE NUEVO");window.history.back();</script>';
		exit();
	}
	echo '<div STYLE="text-align:center;">El numero de resultados son:</div><br>';
	echo '<table STYLE="text-align:center;position:relative;left:0%;" border="1">';
	echo"<tr>";
	echo"<td>ID del producto</td><td>Descripcion</td><td>Tipo de animal</td><td>Tipo de producto</td><td>Ruta de la imagen</td><td>Cantidad de productos</td><td>Precio</td>";
	echo"</tr>";
	for($i=0;$i<$num;$i++){
		$fila=mysql_fetch_array($resultado);
		echo"<tr>";
		echo"<td>".stripslashes($fila['id_animales'])."</td>";
		echo"<td>".stripslashes($fila['descripcion'])."</td>";
		echo"<td>".stripslashes($fila['tipo_animal'])."</td>";
		echo"<td>".stripslashes($fila['tipo_producto'])."</td>";
		echo"<td>".stripslashes($fila['imagen_ruta'])."</td>";
		echo"<td>".stripslashes($fila['limite_producto'])."</td>";
		echo"<td>".stripslashes($fila['precio'])."</td>";
		echo '<td>'.'<a style="text-decoration:none" href=delete_product.php?id_animales='.$fila['id_animales'].'><INPUT VALUE="BORRAR PRODUCTO" TYPE="button" ONCLICK="return confirmar()"></a>'.'</td>';
		echo '<td>'.'<a style="text-decoration:none" href=modificar_producto.php?id_animales='.$fila['id_animales'].'><INPUT VALUE="MODIFICAR PRODUCTO" TYPE="button"></a>'.'</td>';
		echo"</tr>";
		}
	echo "</table><br>";

	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>