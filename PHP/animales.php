 <?php
	include('cabecera.php');
	include('conexDB.php');	
	$tipo_animal=$_GET['tipo_animal'];
	$tipo_producto=$_GET['tipo_producto'];	
	
	$query ="SELECT * FROM ANIMALES WHERE tipo_animal='".$tipo_animal."' AND tipo_producto='".$tipo_producto."'";
	//echo"$query";
	$resultado=mysql_query($query);

	$num=mysql_num_rows($resultado);
	echo '<H1 STYLE="text-align:center">LISTA DE '.strtoupper($tipo_animal).'S DISPONIBLES</H1>
	<h2 STYLE="text-align:center">PINCHA EN CUALQUIERA DE LAS IMAGENES PARA AÑADIR EL PRODUCTO DE LA IMAGEN A LA CESTA</h2><br><br>';
	echo '<TABLE id="tablaMascotas">';
	$aux=0; //Sirve para saber cuando empezar y terminar una fila 
	for($i=1;$i<=$num;$i++){
		$fila=mysql_fetch_array($resultado);
		
		//echo"$ruta<br>";
		if($aux == 1  || $i==1) {
			$aux=0;
			//echo'<script>alert('.$i.');</script>';
			echo"<tr>";
		}
		//Vamos mostrando cada producto
		echo '<td CLASS="mascotas"><a href='."cesta.php?id_animales=".$fila['id_animales'].'>
		<IMG SRC='."../Imagenes".$fila['imagen_ruta'].' CLASS="mascotas"></a>
		<br>'.stripslashes($fila['descripcion']).'<br>'.$fila['precio'].'€<br><br><br><br></td>';
		
		if($i % 3 == 0  || $i==$num) {
			//echo'<script>alert('.$i.');</script>';
			echo"</tr>";
			$aux=1;
		}
		
	}
	echo "</table>";
	
	include('pie.php');
?>