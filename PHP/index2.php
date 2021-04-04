<?php
	session_start();
	if (!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	include('cabecera.php');
	if($_SESSION['privilegio']==2) //Administrador 
	{
		echo '<br><h3 STYLE="text-align:center"><a href="administrador.php">Pincha en este enlace para administrar tu base de datos</a></h3><br>';
	}
	$login=$_SESSION['login'];
	//mostramos al usuario cerrar sesion, modificar sus parametros o crear una nueva cuenta
echo '
<!--*******Iniciar Sesion*******-->
<div style="position:relative;color:black; width:95%; height:auto;margin:auto;text-align:center;">	
	<H1>&#161SESION INICIADA!</H1>
	<H2><a href="sign_out_your_account.php">Cerrar Sesion</a></H2>
</div>

<div ID="crearusuario"><h3>Pinche aqui para configurar su cuenta</h3>
<a href="modificar_usuario.php?login='.$login.'">Modificar tu usuario</a></div>
<!--Crear Usuario-->

<div ID="crearusuario"><h3>&#161Y si usted quiere, puede crearse una nueva cuenta para poder usar nuestro carrito!</h3>
<a href="crear_usuario.php">Crear usuario</a></div>
';

	include('contenido_principal_index.php');
	include('pie.php');
?>