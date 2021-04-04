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
	@$clave=$_POST['clave'];
	if(!$clave) {
		$query="SELECT * FROM ANIMALES";		
	}
	else {		
		$query="SELECT * FROM ANIMALES WHERE descripcion LIKE '%".$clave."%' OR tipo_animal LIKE '%".$clave."%' OR tipo_producto LIKE '%".$clave."%' OR imagen_ruta LIKE '%".$clave."%' 
		OR limite_producto LIKE '%".$clave."%' OR precio LIKE '%".$clave."%'"; // LIKe va con '' después
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
		echo '<td>'.'<a style="text-decoration:none" href=delete_product.php?id_animales='.$fila['id_animales'].'><INPUT VALUE="BORRAR PRODUCTO" TYPE="button" ONCLICK="return confirmar()"></a>'.'</td>'; //Mostramos los dos botones para borrar producto o modificar el producto correspondiente a la fila del boton
		echo '<td>'.'<a style="text-decoration:none" href=modificar_producto.php?id_animales='.$fila['id_animales'].'><INPUT VALUE="MODIFICAR PRODUCTO" TYPE="button"></a>'.'</td>';
		echo"</tr>";
		}
	echo "</table><br>";

	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>