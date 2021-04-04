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
		$query="SELECT * FROM PEDIDO_ANIMALES";		
	}
	else {		
		$query="SELECT * FROM PEDIDO_ANIMALES WHERE id_pedido LIKE '%".$clave."%' OR id_animales LIKE '%".$clave."%' OR cantidad LIKE '%".$clave."%'";
	}

	//echo"$query";
	$resultado=mysql_query($query);
	if(!$resultado){
		echo'<script>alert("ERROR AL MOSTRAR LA TABLA DE PEDIDO_ANIMALES. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
		exit();
	}	
	$num=mysql_num_rows($resultado);
	
	if($num==0){
		echo'<script>alert("NO SE HA ENCONTRADO NINGUN DATO CON ESA DESCRIPCION, POR FAVOR INTENTELO DE NUEVO");window.history.back();</script>';
		exit();
	}
	echo '<div STYLE="text-align:center;">El numero de resultados son:</div><br>';
	echo '<table STYLE="text-align:center;position:relative;left:36%;" border="1">';
	echo"<tr>";
	echo"<td>ID del pedido</td><td>ID del producto</td><td>Cantidad</td>";
	echo"</tr>";
	for($i=0;$i<$num;$i++){
		$fila=mysql_fetch_array($resultado);
		echo"<tr>";
		echo"<td>".stripslashes($fila['id_pedido'])."</td>";
		echo"<td>".stripslashes($fila['id_animales'])."</td>";
		echo"<td>".stripslashes($fila['cantidad'])."</td>";
		echo"</tr>";
		}
	echo "</table><br>";

	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>