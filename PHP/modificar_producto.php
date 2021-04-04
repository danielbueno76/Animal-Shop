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

	@$id_animales=$_GET['id_animales'];

	echo '
<DIV ID="contactoFormulario">
	<DIV class="datosTotal">
<H3>MODIFICACION DE UN PRODUCTO. <BR>SI NO RELLENAS UNA DE LAS CAJAS EL ELEMENTO NO SUFRIRA CAMBIOS</H3>
	<FORM NAME="formulario" ACTION="update_product.php" METHOD="post">
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
		<DIV CLASS="opcion">Precio:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="50" NAME="precio" PLACEHOLDER="Introduzca el precio" pattern="[0-9\.]+" TITLE="e.j. 100.98" MAXLENGTH="10">
		</DIV>
		<br><br>
		<DIV>
			<INPUT VALUE="MODIFICAR REGISTROS DE TU BASE DE DATOS DE ANIMALES" TYPE="submit">
			<input type="hidden" name="id_animales" value="'.$id_animales.'" />
		</DIV>
	</FORM>
	</DIV>
</DIV>

	';
	echo '<A HREF="administrador.php"><h3 STYLE="text-align:center">Volver a la pagina de administracion</h3></A>';
	include('pie.php');
?>