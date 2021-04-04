<?php
	include('cabecera.php');
	
	/*cogemos los valores introducidos en el formulario*/
	@$login=$_POST['login'];
	@$password=$_POST['password'];
	@$nombre=$_POST['nombre'];
	@$apellidos=$_POST['apellidos'];
	@$email=$_POST['email'];
	@$telefono=$_POST['telefono'];
	@$direccion=$_POST['direccion'];
	@$ciudad=$_POST['ciudad'];
	if (isset($_POST['privilegio'])) //Ve si esta creada y su valor es no nulo
	{
		$privilegio=$_POST['privilegio'];
	}
	else {
		$privilegio=1; //Por defecto el privilegio es 1
	}
	
	$login=trim($login);
	$password=trim($password);
	$nombre=trim($nombre);
	$apellidos=trim($apellidos);
	$email=trim($email);
	$telefono=trim($telefono);
	$direccion=trim($direccion);
	$ciudad=trim($ciudad);

	if(!$login || !$password || !$nombre || !$apellidos || !$email || !$telefono || !$direccion || !$ciudad){ //Con el required pattern, no debería haber problemas, pero por si acaso comprobamos
		echo '<script>alert("ERROR AL CREAR EL USUARIO, FALTA ALGUN CAMPO. POR FAVOR, VUELVE A INTENTARLO");window.history.back();</script>';
		exit();
	}
	
	$login=addslashes($login);
	$password=addslashes($password);
	$nombre=addslashes($nombre);
	$apellidos=addslashes($apellidos);
	$email=addslashes($email);
	$telefono=addslashes($telefono);
	$direccion=addslashes($direccion);
	$ciudad=addslashes($ciudad);
	
	include('conexDB.php');		
	
	$query ="SELECT * FROM USUARIOS WHERE login='".$login."'";
	//echo "$query";
	$resultado=mysql_query($query);
	//echo "num: ".mysql_num_rows($resultado);
	if(mysql_num_rows($resultado)==1){		//Si este otro usuario que ya tenga ese login
		echo '<script>alert("USUARIO YA CREADO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
	}
	else {//si  no existe ningun usuario con ese login lo añadimos a la tabla
	$query="INSERT INTO USUARIOS VALUES ('".$login."','".$password."',".$privilegio.",'".$nombre."','".$apellidos."','".$email."','".$telefono."','".$direccion."','".$ciudad."')";
	//echo "<br>".$query."<br>";
	$resultado=mysql_query($query);
	
	if($resultado){
		echo'<br><h1 class="mensajeusuario">&#161Usuario creado!</h1><br>';	//&#161 es ¡
		}
	else {
		echo '<script>alert("ERROR AL CREAR EL USUARIO, POR FAVOR INTENTELO DE NUEVO");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
		}
	}
	if ($privilegio==2) //Si se trata de un administrador
	{
		echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>'; //Muestra texto con enlace par ir a administrador
	}
	include('pie.php');
?>