<?php
	include('cabecera.php');
?>
<!--*******Formulario*******-->
<div ID="contactoFormulario">
	<H1>CREACIÓN DE UN USUARIO</H1>
	<FORM NAME="formulario" ACTION="insert_user.php" METHOD="post" autocomplete="on"> 	
	<DIV class="datosTotal">
		<DIV CLASS="datosPersona"><!--*******Login con 6 o mas caracteres*******-->
			<DIV CLASS="opcion">Login:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="login" PLACEHOLDER="Introduzca su login" required pattern="^([0-9a-zA-Z]+){6,}$" TITLE="e.j. Daniel7542" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Password con 6 caracteres,1 numero, una mayuscula y minuscula*******-->
			<DIV CLASS="opcion">Password:</DIV>
			<INPUT CLASS="caja" TYPE="password" size="32" NAME="password" PLACEHOLDER="Introduzca su password " required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" TITLE="Contraseña con un numero minimo de 6 letras, que contenga una mayuscula, una minuscula y un numero al menos" MAXLENGTH="30"> 
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Nombre*******-->
			<DIV CLASS="opcion">Nombre:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="nombre" PLACEHOLDER="Introduzca su nombre" required pattern="^[a-zA-Z]{1,20}$" TITLE="e.j. Daniel" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Apellidos*******-->		
			<DIV CLASS="opcion">Apellidos:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="apellidos" PLACEHOLDER="Introduzca sus apellidos" required pattern="^[a-zA-Z]{1,20}[\s]?[a-zA-Z]{1,20}?$" TITLE="e.j. Bueno Peña" MAXLENGTH="60">
		</DIV>
		<BR>		
		<DIV CLASS="datosPersona"><!--*******Email*******-->
			<DIV CLASS="opcion">E-mail:</DIV>
			<INPUT CLASS="caja" TYPE="email" size="32" NAME="email" PLACEHOLDER="Introduzca su E-mail" required pattern="^[a-z0-9._%+-]{2,}@[a-z0-9.-]{2,}\.[a-z]{2,4}$" TITLE="e.j. tiendamascotas@gmail.com" MAXLENGTH="60">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Teléfono*******-->
			<DIV CLASS="opcion">Nº Teléfono:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="telefono" PLACEHOLDER="Introduzca su Nº teléfono" required pattern="^(\+[0-9]{2})?[0-9]{9}$" TITLE="e.j. +34654983212 ó 654983212" MAXLENGTH="20">
		</DIV>
		<BR>
			<DIV CLASS="datosPersona"><!--*******Dirección*******-->
			<DIV CLASS="opcion">Dirección</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="direccion" PLACEHOLDER="Introduzca su dirección" required pattern="[0-9a-zA-Z,-/ ]+" TITLE="e.j. Calle Eusebio Gonzalez 8 7A" MAXLENGTH="100">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Ciudad*******-->
			<DIV CLASS="opcion">Ciudad:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="ciudad" PLACEHOLDER="Introduzca su ciudad" required pattern="^[a-zA-Z]{1,35}$" TITLE="e.j. Valladolid" MAXLENGTH="30">
		</DIV>
		<BR><BR><BR>
		<DIV>
			<INPUT VALUE="RESTABLECER" TYPE="button" TITLE="Borrar todos los campos" onclick="restablecerusuario(this.form.cajaMensaje);"><!--*******Boton para restablecer formularios*******-->
			<INPUT VALUE="CREAR USUARIO" MAXLENGTH="1000" TYPE="submit" TITLE="Crear Usuario"><!--*******Botón para crear usuario*******-->
		</DIV>
	</DIV>
	</FORM>	
</DIV>
<?php
	include('pie.php');
?>