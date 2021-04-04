<?php
	date_default_timezone_set('Europe/Madrid'); //Para que el servidor del laboratorio sepa la zona horaria
?>
<!DOCTYPE html>
<html>
<head>
<title>Mascotas DanJos</title>
<link HREF="../Imagenes/iconoDanJos.jpg" REL="shortcut icon"/>
<link rel="stylesheet" href="../CSS/estilo.css" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> <!--*******CSS de slides*******-->
<!--SCRIPTS-->
<SCRIPT src="../JavaScript/fechayhora.js" type="text/javascript"></SCRIPT>
<!--<SCRIPT src="../JavaScript/calculadora.js" type="text/javascript"></SCRIPT> no funciona, cosa que preguntar-->
<SCRIPT src="../JavaScript/emergente.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../JavaScript/slider.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../JavaScript/comprobar.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../JavaScript/borrarusuario.js" type="text/javascript"></SCRIPT> 
<SCRIPT src="../JavaScript/contadorLetras.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../JavaScript/verificacionDNI.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../JavaScript/version.js" type="text/javascript"></SCRIPT>  
<SCRIPT src="../JavaScript/resolucion.js" type="text/javascript"></SCRIPT>
<SCRIPT> <!--Script de Ajax relacionado con el Top Ventas->
function loadXMLDoc(url)
{

	var xmlhttp;
	var txt,x,xx,xxx,i;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function(){	
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				txt="<TABLE BORDER='1'><TR><TH>Posicion</TH><TH>Animal</TH><TH>Raza</TH><TH>Precio</TH></TR>";
				x=xmlhttp.responseXML.documentElement.getElementsByTagName("Producto");
				
				for (i=0;i<x.length;i++)			
					{
					txt=txt+"<TR>";
					{
					var posicion=parseInt(i)+1;
						try{
						txt=txt + "<TD>" + posicion + "</TD>";
						}
						catch (er)
						{
						txt=txt + "<TD></TD>";
						}
					}	
					xx=x[i].getElementsByTagName("Animal");
					{
						try{
						txt=txt + "<TD>" + xx[0].firstChild.nodeValue+ "</TD>";
						}
						catch (er)
						{
						txt=txt + "<TD></TD>";
						}
					}
					xx=x[i].getElementsByTagName("Raza");
					{
						try{
						txt=txt + "<TD>" + xx[0].firstChild.nodeValue+ "</TD>";
						}
						catch (er)
						{
						txt=txt + "<TD></TD>";
						}
					}
					xx=x[i].getElementsByTagName("Precio");
					{
						try{
						txt=txt + "<TD>" + xx[0].firstChild.nodeValue+ "</TD>";
						}
						catch (er)
						{
						txt=txt + "<TD></TD>";
						}
					}
					txt=txt+"</TR>";
					}
				txt=txt+"</TABLE>";	
				document.getElementById('topventas').innerHTML=txt;				
				}
			}	
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
	}

</SCRIPT>
<!--METADATOS-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Acentos-->
<meta name="Author" content="José María Peña y Daniel Bueno"/>
<meta name="organization" content="ETSIT Universidad de Valladolid"/>
<meta name="keywords" content="mascotas" lang="es"/>
<meta name="robots" content="INDEX,FOLLOW"/><!--Permitimos al buscador que pueda acceder a las páginas que aparecen referenciadas en este html-->
<meta name="revision" content="5;Oct 27, 2016"/>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> <!--Acentos-->
<meta name="viewport" content="width=device-width, initial-scale=1"/> <!--*******Slides*******-->
</head>
<!--*******Cuerpo*******-->
<body>
<div id="fondo"> 
<A NAME="inicio"></A>
<header id="cabecera">
<img id="logo" src="../Imagenes/logo.png" ALT="logo de la tienda de mascotas">
</header>

<!--menu principal-->
<div class="menu">
<NAV>
	<UL CLASS="menu">
		<?php

			if (!$_SESSION['login']) 
			{
					echo '<li><a HREF="index.php#inicio">Inicio</a></li>';
			}
			else 
			{
				echo '<li><a HREF="index2.php#inicio">Inicio</a></li>';
			}
		?>
		<li><a>Perros</a>
			<ul>
				<li><a href="animales.php?tipo_animal=perro&tipo_producto=animal">Perros</a></li>
				<li><a href="animales.php?tipo_animal=perro&tipo_producto=alimentacion">Alimentación</a></li>
				<li><a href="animales.php?tipo_animal=perro&tipo_producto=accesorio">Accesorios</a></li>
			</ul>
		</li>
				
		<li><a>Gatos</a>
			<ul>
				<li><a href="animales.php?tipo_animal=gato&tipo_producto=animal">Gatos</a></li>
				<li><a HREF="animales.php?tipo_animal=gato&tipo_producto=alimentacion">Alimentación</a></li>
				<li><a href="animales.php?tipo_animal=gato&tipo_producto=accesorio">Accesorios</a></li>
			</ul>	
		</li>
		<li><a>Información</a>
			<ul>
				<?php

					if (!$_SESSION['login']) 
						{
							echo '<li><a HREF="index.php#descripcion">Descripción</a></li>
								  <li><a HREF="index.php#donde">Localización</a></li>
								  <li><a HREF="index.php#origenes">Conócenos</a></li>';
						}
					else 
						{
							echo '<li><a HREF="index2.php#descripcion">Descripción</a></li>
								  <li><a HREF="index2.php#donde">Localización</a></li>
								  <li><a HREF="index2.php#origenes">Conócenos</a></li>';
						}
				?>
			</ul>
		</li>
		<li><a href="formulario.php">Formulario</a>
		</li>
	</ul>	
</nav>
</div>
<!--*******Detecta si el usuario tiene instalado javaScript*******-->
<noscript>
 <DIV id="noJava">
  <P>Bienvenido a Mascotas DanJos</P>
  <P>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
  Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</P>
 </DIV>
</noscript>

<!--Fecha-->
<div ID="fecha"></div>
<?php
	if (isset($_SESSION['login']))
	{	
		echo '<DIV STYLE="position:relative"><a href="carritoCompra.php">
		<IMG STYLE="position:relative;float:right;width:70px;heigth:70px" SRC=../Imagenes/carritodelacompra.png ></a></DIV>'; //Mostrar imagen de carrito
	}
	include('calendario.php');
?>