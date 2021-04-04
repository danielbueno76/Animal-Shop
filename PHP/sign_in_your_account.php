<?php
	session_start();
	include('conexDB.php');	
	$login=$_POST['login'];
	$password=$_POST['password'];	

	$login=trim($login);
	$password=trim($password);
	
	
	$login=addslashes($login);
	$password=addslashes($password);
	
 
	$query ="SELECT * FROM USUARIOS WHERE login='".$login."' AND password='".$password."'";
	//echo"$query";
	$resultado=mysql_query($query);

	$num=mysql_num_rows($resultado);

	if(!$resultado){
		echo'<script>alert("ERROR AL INICIAR SESION. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
		exit();
	}
	//Si existe un usuario con ese login, almacenamos las variables en variables globales session
	if($num==1){
			$fila=mysql_fetch_array($resultado);
			$_SESSION['login']=$login;
			$_SESSION['privilegio']=$fila['privilegio'];
			$coste_elim=0;
			/*eliminamos aquellas entradas de la tabla pedidos con coste igual a 0, ya que son pedidos incompletos*/
			$query = "DELETE from pedidos where coste_total=".$coste_elim.""; 
			$resultado=mysql_query($query);
			
			header('Location:index2.php');		
	}
	else{
		include('cabecera.php');
		echo '<script>alert("USUARIO O CONTRASE&#209A ERRONEA");window.history.back();</script>'; //Para volver a la misma pagina sin que se borren los usuarios
	}

	include('pie.php');
?>