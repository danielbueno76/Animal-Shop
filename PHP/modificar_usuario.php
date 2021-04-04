<?php
	session_start();
	if(!$_SESSION['login']) 
	{
		die(header('Location:index.php'));
	}
	
	include('cabecera.php');
	@$login=$_GET['login'];
	if(strcmp($login,$_SESSION['login'])!=0 && $_SESSION['privilegio']==1)
	{
		die(header('Location:index2.php')); //si va a modificar otro usuario que no sea tuyo, no dejas.
	}
	//Mostramos todas las cajas con todos las restricciones.
	echo '
<DIV ID="contactoFormulario">
	<DIV class="datosTotal">
	<H3>MODIFICACION DE LOS DATOS DE USUARIO<BR>SI NO RELLENAS UNA DE LAS CAJAS EL ELEMENTO NO SUFRIRA CAMBIOS</H3>	
	<FORM NAME="formulario" ACTION="update_user.php" METHOD="post">
		<DIV CLASS="datosPersona"><!--*******Login con 6 o mas caracteres*******-->
			<DIV CLASS="opcion">Login:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="loginamodificar" PLACEHOLDER="Introduzca login nuevo"  pattern="^([0-9a-zA-Z]+){6,}$" TITLE="e.j. Daniel7542" >
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Password con 6 caracteres,1 numero y una mayuscula y minuscula*******-->
			<DIV CLASS="opcion">Password:</DIV>
			<INPUT CLASS="caja" TYPE="password" size="35" NAME="password" PLACEHOLDER="Introduzca password nuevo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" TITLE="Contraseña con un numero minimo de 6 letras, que contenga una mayuscula, una minuscula y un numero al menos" > 
		</DIV>';
		if($_SESSION['privilegio']==2) //Administrador 
			{
		echo '		
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Privilegio:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="privilegio" PLACEHOLDER="Introduzca privilegio nuevo" pattern="[1-2]" TITLE="e.j. (1=usuario,2=administrador)" > 
		</DIV>';
			}

echo'	<DIV CLASS="datosPersona"><!--*******Nombre*******-->
			<DIV CLASS="opcion">Nombre:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="nombre" PLACEHOLDER="Introduzca nombre nuevo" pattern="^[a-zA-Z]{1,20}$" TITLE="e.j. Daniel" >
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Apellidos*******-->		
			<DIV CLASS="opcion">Apellidos:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="apellidos" PLACEHOLDER="Introduzca apellidos nuevos" pattern="^[a-zA-Z]{1,20}[\s]?[a-zA-Z]{1,20}?$" TITLE="e.j. Bueno Peña" >
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Email*******-->
			<DIV CLASS="opcion">E-mail:</DIV>
			<INPUT CLASS="caja" TYPE="email" size="35" NAME="email" PLACEHOLDER="Introduzca E-mail nuevo" pattern="^[a-z0-9._%+-]{2,}@[a-z0-9.-]{2,}\.[a-z]{2,4}$" TITLE="e.j. tiendamascotas@gmail.com">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Teléfono*******-->
			<DIV CLASS="opcion">Nº Teléfono:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="telefono" PLACEHOLDER="Introduzca Nº teléfono nuevo" pattern="^(\+[0-9]{2})?[0-9]{9}$" TITLE="e.j. +34654983212 ó 654983212">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Dirección*******-->
			<DIV CLASS="opcion">Dirección</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="direccion" PLACEHOLDER="Introduzca dirección nuevo" pattern="[a-zA-Z-_-/]+" TITLE="e.j. Calle Eusebio Gonzalez 8 7ºA">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Ciudad*******-->
			<DIV CLASS="opcion">Ciudad:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="35" NAME="ciudad" PLACEHOLDER="Introduzca ciudad nuevo" pattern="^[a-zA-Z]{1,35}$" TITLE="e.j. Valladolid">
		</DIV>
		<br><br>
		<DIV>
			<INPUT VALUE="MODIFICAR REGISTROS DE TU BASE DE DATOS DE USUARIOS" TYPE="submit">
			<input type="hidden" name="login" value="'.$login.'" />
		</DIV>
	</FORM>	
	</DIV>
</DIV>
	'; //Tambien pasamos el login antiguo por si lo quiere modificar el usuario
	if($_SESSION['privilegio']==2) //Administrador 
		{
			echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
		}
	include('pie.php');
?>