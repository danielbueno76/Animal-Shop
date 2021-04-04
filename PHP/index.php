<?php
	session_start();	
	if (isset($_SESSION['login'])) //Ve si esta creada y su valor es no nulo
	{
		die(header('Location:index2.php'));
	}
	include('cabecera.php');
?>
<!--*******Iniciar Sesion*******-->
<div style="position:relative;color:black; width:95%; height:auto;margin:auto;text-align:center;">	
	<H1>INICIAR SESION</H1>
	<FORM NAME="formulario" ACTION="sign_in_your_account.php" METHOD="post" autocomplete="on"> 	
	<DIV class="datosTotal">
		 <DIV CLASS="datosPersona"><!--*******Login con 6 o mas caracteres*******-->
			<DIV CLASS="opcion2">Login:</DIV>
			<INPUT CLASS="caja2" TYPE="text" size="32" NAME="login" PLACEHOLDER="Introduzca su login" required pattern="^([0-9a-zA-Z]+){6,}$" TITLE="e.j. Daniel7542" MAXLENGTH="30" autofocus>
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Password con 6 caracteres,1 numero y una mayuscula y minuscula*******-->
			<DIV CLASS="opcion2">Password:</DIV>
			<INPUT CLASS="caja2" TYPE="password" size="32" NAME="password" PLACEHOLDER="Introduzca su password " required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" TITLE="Contraseña con un numero minimo de 6 letras, que contenga una mayuscula, una minuscula y un numero al menos" MAXLENGTH="30" autofocus> 
		</DIV>	
		<BR><BR>
		<DIV>
			<INPUT VALUE="INICIAR SESION" MAXLENGTH="1000" TYPE="submit" TITLE="Iniciar Sesion"><!--*******Botón para iniciar sesión*******-->
		</DIV>
	</DIV>
	</FORM>	
</DIV>
<!--Crear Usuario-->

<div ID="crearusuario"><h3>&#161Y si no esta registrado, crease una cuenta para poder usar nuestro carrito!</h3>
<a href="crear_usuario.php">Crear usuario</a></div>
<?php
	include('contenido_principal_index.php');
	include('pie.php');
?>