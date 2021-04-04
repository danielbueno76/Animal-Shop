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
		$query="SELECT * FROM USUARIOS";		
	}
	else {		
		$query="SELECT * FROM USUARIOS WHERE login LIKE '%".$clave."%' OR privilegio LIKE '%".$clave."%' OR nombre LIKE '%".$clave."%' OR apellidos LIKE '%".$clave."%' 
		OR email LIKE '%".$clave."%' OR telefono LIKE '%".$clave."%' OR direccion LIKE '%".$clave."%' OR ciudad LIKE '%".$clave."%'"; //Busqueda por clave
	}
	
	//echo"$query";
	$resultado=mysql_query($query);
	if(!$resultado){
		echo'<script>alert("ERROR AL MOSTRAR LA TABLA DE USUARIOS. POR FAVOR, COMPRUEBA LOS DATOS INTRODUCIDOS");window.history.back();</script>';
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
	echo"<td>Login</td><td>Privilegio</td><td>Nombre</td><td>Apellidos</td><td>E-mail</td><td>Telefono</td><td>Direccion</td><td>Ciudad</td>";
	echo"</tr>";
	for($i=0;$i<$num;$i++){
		$fila=mysql_fetch_array($resultado);
		echo"<tr>";
		echo"<td>".stripslashes($fila['login'])."</td>";
		echo"<td>".stripslashes($fila['privilegio'])."</td>";
		echo"<td>".stripslashes($fila['nombre'])."</td>";
		echo"<td>".stripslashes($fila['apellidos'])."</td>";
		echo"<td>".stripslashes($fila['email'])."</td>";
		echo"<td>".stripslashes($fila['telefono'])."</td>";
		echo"<td>".stripslashes($fila['direccion'])."</td>";
		echo"<td>".stripslashes($fila['ciudad'])."</td>";
		echo '<td>'.'<a style="text-decoration:none" href=delete_user.php?login='.$fila['login'].'><INPUT VALUE="BORRAR USUARIO" TYPE="button" ONCLICK="return confirmar()"></a>'.'</td>'; //Mostramos los dos botones para borrar usuario o modificar el usuario correspondiente a la fila del boton
		echo '<td>'.'<a style="text-decoration:none" href=modificar_usuario.php?login='.$fila['login'].'><INPUT VALUE="MODIFICAR USUARIO" TYPE="button"></a>'.'</td>';
		echo"</tr>";
		}
	echo "</table><br>";

	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>