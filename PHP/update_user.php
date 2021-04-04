<?php

	session_start();
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	include('conexDB.php');	
	include('cabecera.php');
	@$login=$_POST['login'];
	
	if(strcmp($login,$_SESSION['login'])!=0 && $_SESSION['privilegio']==1) //En caso de que un usuario quiera modificar otro usuario. Aun así no pasa porque la cabecera ya esta definida y no admite cambiarla.
	{
		die(header('Location:index2.php'));
	}
	
	$query="SELECT * FROM USUARIOS WHERE login='".$login."'";
	//echo "<br>".$query;
	$resultado=mysql_query($query);
	$fila=mysql_fetch_array($resultado);
	/*cogemos los datos introducidos por el usuario en los formularios*/
	if($_POST['loginamodificar']) {
		$fila['loginamodificar']=$_POST['loginamodificar'];
	}
	if($_POST['password']) {
		$fila['password']=$_POST['password'];
	}
	if($_SESSION['privilegio']==2) //Administrador 
	{
		if($_POST['privilegio']) {
		$fila['privilegio']=$_POST['privilegio'];
		}
	}
	else {
		$fila['privilegio']=1;
	}
	if($_POST['nombre']) {
		$fila['nombre']=$_POST['nombre'];
	}
	if($_POST['apellidos']) {
		$fila['apellidos']=$_POST['apellidos'];
	}
	if($_POST['email']) {
		$fila['email']=$_POST['email'];
	}
	if($_POST['telefono']) {
		$fila['telefono']=$_POST['telefono'];
	}
	if($_POST['direccion']) {
		$fila['direccion']=$_POST['direccion'];
	}
	if($_POST['ciudad']) {
		$fila['ciudad']=$_POST['ciudad'];
	}

	
	@$loginamodificar=$fila['loginamodificar'];
	@$password=$fila['password'];
	@$privilegio=$fila['privilegio'];
	@$nombre=$fila['nombre'];
	@$apellidos=$fila['apellidos'];
	@$email=$fila['email'];
	@$telefono=$fila['telefono'];
	@$direccion=$fila['direccion'];
	@$ciudad=$fila['ciudad'];
	
	$login=trim($login);	
	$loginamodificar=trim($loginamodificar);
	$password=trim($password);
	$privilegio=trim($privilegio);
	$nombre=trim($nombre);
	$apellidos=trim($apellidos);
	$email=trim($email);
	$telefono=trim($telefono);
	$direccion=trim($direccion);
	$ciudad=trim($ciudad);
	

	$login=addslashes($login);
	$loginamodificar=addslashes($loginamodificar);
	$password=addslashes($password);
	$privilegio=addslashes($privilegio);
	$nombre=addslashes($nombre);
	$apellidos=addslashes($apellidos);
	$login=addslashes($login);
	$email=addslashes($email);
	$telefono=addslashes($telefono);
	$direccion=addslashes($direccion);
	$ciudad=addslashes($ciudad);
	
	$query ="SELECT * FROM USUARIOS WHERE login='".$loginamodificar."'";
	//echo "$query";
	$resultado=mysql_query($query);
	//echo "num: ".mysql_num_rows($resultado);	
	$num=mysql_affected_rows();
	
	if($num==1){		//No pasa nada si estas modificando tu mismo usuario, no otro.
			echo '<script>alert("LOGIN YA CREADO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
		}
	else {
		if(!$_POST['loginamodificar']) {
			$loginamodificar=$login;
		}
	/*Actualizamos la tabla usuarios para un login*/
	$query="UPDATE USUARIOS SET login='".$loginamodificar."', password='".$password."', privilegio=".$privilegio.", nombre='".$nombre."', apellidos='".$apellidos."', email='".$email."', telefono='".$telefono."', direccion='".$direccion."', ciudad='".$ciudad."' WHERE login='".$login."'";
	//echo "<br>".$query."<br>";
	$resultado=mysql_query($query);
	
	if($resultado){
		echo'<br><h1 class="mensajeusuario">&#161Usuario modificado!</h1><br>';	//&#161 es ¡
		}
	else {
		echo '<script>alert("ERROR AL MODIFICAR EL USUARIO, POR FAVOR INTENTELO DE NUEVO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
		}
	}
	if($_SESSION['privilegio']==2) //Administrador 
		{
			echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
		}
	
	include('pie.php');
?>