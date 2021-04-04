<?php
	include('cabecera.php');
?>

<!--*******Formulario*******-->
<div ID="contactoFormulario">
	
	<H1>CONTACTA CON NOSOTROS</H1>
	<FORM NAME="formulario" ACTION="mailto:daniel.bueno@alumnos.uva.es" METHOD="post" autocomplete="on" ONSUBMIT="return comprobarDNI()" > 	
	<DIV class="datosTotal">
		<DIV CLASS="datosPersona"><!--*******Nombre*******-->
			<DIV CLASS="opcion">Nombre:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="nombre" PLACEHOLDER="Introduzca su nombre" required pattern="^[a-zA-Z]{1,20}$" TITLE="e.j. Daniel" autofocus>
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Apellidos*******-->		
			<DIV CLASS="opcion">Apellidos:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="apellidos" PLACEHOLDER="Introduzca sus apellidos" required pattern="^[a-zA-Z]{1,20}[\s]?[a-zA-Z]{1,20}?$" TITLE="e.j. Bueno Peña" autofocus>
		</DIV>
		<BR>		
		<DIV CLASS="datosPersona"><!--*******DNI*******-->
			<DIV CLASS="opcion">DNI:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="DNI" PLACEHOLDER="Introduzca su DNI" required pattern="^[0-9]{8}[a-zA-Z]{1}$" TITLE="e.j. 12345678A">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Teléfono*******-->
			<DIV CLASS="opcion">Nº Teléfono:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="telefono" PLACEHOLDER="Introduzca su Nº teléfono" required pattern="^(\+[0-9]{2})?[0-9]{9}$" TITLE="e.j. +34654983212 ó 654983212">
		</DIV>
		<BR>
		<DIV CLASS="datosPersona"><!--*******Provincia*******-->
			<DIV CLASS="opcion">Provincia:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="provincia" PLACEHOLDER="Introduzca su provincia" required pattern="^[a-zA-Z]{1,35}$" TITLE="e.j. Valladolid">
		</DIV>
		<DIV CLASS="datosPersona"><!--*******Código Postal*******-->
			<DIV CLASS="opcion">Código Postal:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="cp" PLACEHOLDER="Introduzca su código postal" required pattern="^[0-9]{5}$" TITLE="e.j. 12345">
		</DIV>
		<BR>
		<DIV CLASS="datosPersona"><!--*******Email*******-->
			<DIV CLASS="opcion">E-mail:</DIV>
			<INPUT CLASS="caja" TYPE="email" size="32" NAME="email" PLACEHOLDER="Introduzca su E-mail" required pattern="^[a-z0-9._%+-]{2,}@[a-z0-9.-]{2,}\.[a-z]{2,4}$" TITLE="e.j. tiendamascotas@gmail.com">
		</DIV>
		<BR>
		<BR>
		<DIV CLASS="datosPersona" ><!--*******Asunto*******-->
			<DIV CLASS="opcion">Asunto:</DIV>
			<INPUT CLASS="caja" TYPE="text" size="32" NAME="asunto" PLACEHOLDER="Introduzca el asunto">
		</DIV>
		<BR><BR>
		<DIV class="duda"><!--*******Mensajes*******-->
			<textarea ID="cajaMensaje" NAME="cajaMensaje" CLASS="cajaMensaje" required= PLACEHOLDER="Escriba su mensaje" maxlength="500" onKeyDown="contadorLetras(this.form.cajaMensaje);" onKeyUp="contadorLetras(this.form.cajaMensaje);"></textarea>
			<DIV id="contador">500/500 caracteres</DIV>
		</DIV>
		<DIV>
			<INPUT VALUE="RESTABLECER" TYPE="button" TITLE="Borrar todos los campos" onclick="restablecer(this.form.cajaMensaje);"><!--*******Boton para restablecer formularios*******-->
			<INPUT VALUE="ENVIAR" MAXLENGTH="500" TYPE="submit" TITLE="Enviar el formulario"><!--*******Botón para enviar la consulta*******-->
		</DIV>
	</DIV>
	</FORM>	
</DIV>
<?php
	include('pie.php');
?>