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
	include('cabecera.php');
	//En cada formulario de los de abajo hacemos el pattern correspondiente para que no nos introduzcan elementos raros
?>

<DIV ID="contactoFormulario">
	<DIV class="datosTotal">
	<H3>SELECCION DE UNA TABLA ENTERA SI NO ESCRIBE UNA PALABRA CLAVE.<BR> ESCRIBA PARA UNA BUSQUEDA POR PALABRA CLAVE</H3>
	<FORM NAME="formulario" ACTION="tabla_animales.php" METHOD="post"> 
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Palabra clave:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="23" NAME="clave" PLACEHOLDER="Introduzca la clave" pattern="[0-9a-zA-Z\.-/ ]+" TITLE="e.j. Pastor Aleman" MAXLENGTH="100">
		</DIV>
		<br><br>
		<DIV>
		<INPUT VALUE="VER TU LISTA DE PRODUCTOS" TYPE="submit">
		</DIV>
		<br><br>
	</FORM>
	<FORM NAME="formulario" ACTION="tabla_usuarios.php" METHOD="post"> 
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Palabra clave:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="23" NAME="clave" PLACEHOLDER="Introduzca la clave" pattern="[0-9a-zA-Z\.@,-/ ]+" TITLE="e.j. dani12" MAXLENGTH="100">
		</DIV>
		<br><br>
		<DIV>
		<INPUT VALUE="VER LA LISTA DE USUARIOS" TYPE="submit">
		</DIV>
	</FORM>
	<br><br>
	<FORM NAME="formulario" ACTION="tabla_pedidos.php" METHOD="post"> 
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Palabra clave:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="23" NAME="clave" PLACEHOLDER="Introduzca la clave" pattern="[0-9a-zA-Z\.(:) ]+" TITLE="e.j. dani12" MAXLENGTH="30">
		</DIV>
		<br><br>
		<DIV>
		<INPUT VALUE="VER LA LISTA DE PEDIDOS" TYPE="submit">
		</DIV>
	</FORM>
	<br><br>
	<FORM NAME="formulario" ACTION="tabla_pedidos_animales.php" METHOD="post"> 
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Palabra clave:</DIV>
			<INPUT CLASS="caja" TYPE="number" size="23" NAME="clave" PLACEHOLDER="Introduzca la clave" max="999">
		</DIV>
		<br><br>
		<DIV>
		<INPUT VALUE="VER LA LISTA DE PEDIDOS ASOCIADOS A ANIMALES" TYPE="submit">
		</DIV>
	</FORM>
	
<br><br><br><br>
	<H3>SELECCION DE UN PRODUCTO POR BUSQUEDA AVANZADA.<BR> INTRODUZCA VARIAS PALABRAS CLAVES PARA LA BUSQUEDA</H3>
	<FORM NAME="formulario" ACTION="tabla_animales_avanzada.php" METHOD="post">
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Descripcion:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="descripcion" PLACEHOLDER="Introduzca la descripcion" pattern="[a-zA-Z ]+" TITLE="e.j. Pastor Belga" MAXLENGTH="60">
		</DIV>
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Tipo de animal:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="tipo_animal" PLACEHOLDER="Introduzca el tipo de animal" pattern="[a-zA-Z]+" TITLE="e.j. perro" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Tipo de producto:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="tipo_producto" PLACEHOLDER="Introduzca el tipo de producto" pattern="[a-zA-Z]+" TITLE="e.j. accesorio" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Ruta de la imagen:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="imagen_ruta" PLACEHOLDER="Introduzca la ruta de la imagen" pattern="[0-9a-zA-Z\.-/]+" TITLE="e.j. /gatos/gatoazul.png" MAXLENGTH="100">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Numero de productos:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="limite_producto" PLACEHOLDER="Introduzca la cantidad de productos" pattern="[0-9]+" TITLE="e.j. 10" MAXLENGTH="10">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Precio maximo:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="preciomax" PLACEHOLDER="Introduzca el precio maximo" pattern="[0-9\.]+" TITLE="e.j. 100.98" MAXLENGTH="10">
		</DIV>
		<br><br>
		<DIV>
			<INPUT VALUE="VER LA LISTA DE PRODUCTOS DE TU BASE DE DATOS DE ANIMALES" TYPE="submit">
		</DIV>
	</FORM>
<br><br><br><br>
	<H3>CREACION DE UN PRODUCTO. INTRODUZCA TODOS LOS DATOS</H3>
	<FORM NAME="formulario" ACTION="insert_product.php" METHOD="post">
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Descripcion:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="descripcion" PLACEHOLDER="Introduzca la descripcion" required pattern="[a-zA-Z ]+" TITLE="e.j. Pastor Belga" MAXLENGTH="60">
		</DIV>
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Tipo de animal:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="tipo_animal" PLACEHOLDER="Introduzca el tipo de animal" required pattern="[a-zA-Z]+" TITLE="e.j. perro" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Tipo de producto:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="tipo_producto" PLACEHOLDER="Introduzca el tipo de producto" required pattern="[a-zA-Z]+" TITLE="e.j. accesorio" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Ruta de la imagen:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="imagen_ruta" PLACEHOLDER="Introduzca la ruta de la imagen" required pattern="[0-9a-zA-Z\.-/]+" TITLE="e.j. /gatos/gatoazul.png" MAXLENGTH="100">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Numero de productos:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="limite_producto" PLACEHOLDER="Introduzca la cantidad de productos" required pattern="[0-9]+" TITLE="e.j. 10" MAXLENGTH="10">
		</DIV>
		<DIV CLASS="datosPersona">
		<DIV CLASS="opcion">Precio:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="precio" PLACEHOLDER="Introduzca el precio" required pattern="[0-9\.]+" TITLE="e.j. 100.98" MAXLENGTH="10">
		</DIV>
		<br><br>
		<DIV>
			<INPUT VALUE="AÑADIR PRODUCTO A TU BASE DE DATOS DE ANIMALES" TYPE="submit">
		</DIV>
	</FORM>
	
<br><br><br><br>
	<H3>CREACION DE UN NUEVO USUARIO</H3>	
	<FORM NAME="formulario" ACTION="insert_user.php" METHOD="post">
		<DIV CLASS="datosPersona"><!--*******Login con 6 o mas caracteres*******-->
			<DIV CLASS="opcion">Login:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="login" PLACEHOLDER="Introduzca su login" required pattern="^([0-9a-zA-Z]+){6,}$" TITLE="e.j. Daniel7542" MAXLENGTH="30">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Password con 6 caracteres,1 numero, una mayuscula y minuscula*******-->
			<DIV CLASS="opcion">Password:</DIV>
			<INPUT CLASS="caja" TYPE="password" size="32" NAME="password" PLACEHOLDER="Introduzca su password " required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" TITLE="Contraseña con un numero minimo de 6 letras, que contenga una mayuscula, una minuscula y un numero al menos" MAXLENGTH="30"> 
		</DIV>
		<DIV CLASS="datosPersona">
			<DIV CLASS="opcion">Privilegio:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="privilegio" PLACEHOLDER="Introduzca su privilegio" required pattern="[1-2]" TITLE="e.j. (1=usuario,2=administrador)" MAXLENGTH="1"> 
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
		<BR><BR>
		<DIV>
			<INPUT VALUE="AÑADIR USUARIO A LA BASE DE DATOS DE USUARIOS" TYPE="submit">
		</DIV>
	</FORM>	
<br><br>
<?php	
	include('pie.php');
?>