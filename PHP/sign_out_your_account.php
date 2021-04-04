<?php
	session_start();
	unset($_SESSION['login']); //borramos las variables globales de session
	unset($_SESSION['privilegio']);          
	
	include('conexDB.php');
	$coste_elim=0;
	/*Si alguna linea de pedidos tiene coste = 0 se elimina*/
	$query = "DELETE from pedidos where coste_total=".$coste_elim.""; 
	$resultado=mysql_query($query);
	if(!$resultado){
		echo'<script>alert("ERROR AL BORRAR UNA LINEA EN PEDIDOS. POR FAVOR, VUELVA A INTENTARLO");window.history.back();</script>';
		exit();
	}
	session_destroy();
	header('Location:index.php');	
?>