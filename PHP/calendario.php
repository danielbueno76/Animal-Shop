<?php
	$dia=date('d');
	$mes=date('m');
	$anio=date('Y');
	$bisiesto=date('L');
	$dias_mes=date('t');
	$dia_actual=1;
	$seg_dia1= mktime (0, 0, 0, $mes,$dia_actual, $anio);
	$array_dia1=getdate($seg_dia1);
	$dia_semana_dia1=$array_dia1['wday'];
	if($dia_semana_dia1==0) {
		$dia_semana_dia1=7;
	}
	/*En funcion del numero del mes, asignamos valor string al mes y el numero de dias de ese mes*/
	switch ($mes) {
    case 1:
        $mes="Enero";
		$dia_max=31;
        break;
    case 2:
        $mes="Febrero";
		if($bisiesto==1) {
			$dia_max=29;
		}
		else {
			$dia_max=28;
		}		
        break;
    case 3:
        $mes="Marzo";
		$dia_max=31;
        break;
	case 4:
        $mes="Abril";
		$dia_max=30;
        break;
	case 5:
        $mes="Mayo";
		$dia_max=31;
        break;
	case 6:
        $mes="Junio";
		$dia_max=30;
        break;
	case 7:
        $mes="Julio";
		$dia_max=31;
        break;
	case 8:
        $mes="Agosto";
		$dia_max=31;
        break;
	case 9:
        $mes="Septiembre";
		$dia_max=30;
        break;
	case 10:
        $mes="Octubre";
		$dia_max=31;
        break;
	case 11:
        $mes="Noviembre";
		$dia_max=30;
        break;
	case 12:
        $mes="Diciembre";
		$dia_max=31;
        break;
}
	//Creamos la tabla calendario
	echo '<br><table STYLE="text-align:center;position:relative;left:40%;" BORDER=3 CELLSPACING=3 CELLPADDING=3>';
	echo"<tr>";
	echo'<th COLSPAN="7" ALIGN=center>'.$mes.'-'.$anio.'</th>';
	echo"</tr>";
	echo"<tr>";
	echo"<th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th>";
	echo"</tr>";
	
	echo"<tr>";
	
	for($i=0;$i<$dia_semana_dia1-1;$i++){
		echo"<td ALIGN=center>&nbsp</td>"; //introducimos los espacios de los primeros dias
	}
	for($columnas=$dia_semana_dia1-1;$columnas<7;$columnas++){		//Ponemos el resto de dias de la primera semana		
		if($dia_actual==$dia) {
			echo'<td ALIGN=center style="color:blue;font-weight: bold;">'.$dia_actual.'</td>';
		}
		else {
			echo"<td ALIGN=center>".$dia_actual."</td>";
		}			
		$dia_actual++; //vamos actualizando el dia
	}
	echo"</tr>";	
	$num_sem=ceil(($dias_mes-($dia_actual-1))/7); //Calculamos el numero de semanas
	$max_mes=0;
	for($filas=0;$filas<$num_sem;$filas++){		
		for($columnas=0;$columnas<7;$columnas++){	
			if($max_mes==1) {
				echo"<td ALIGN=center>&nbsp</td>";
			}
			else if($dia_actual==$dia) {
				echo'<td ALIGN=center style="color:blue;font-weight: bold;">'.$dia_actual.'</td>';//escribimos el dia actual en negrita y azul
			}
			else {
				echo"<td ALIGN=center>".$dia_actual."</td>"; //Vamos escribiendo cada dia del mes
			}			
			$dia_actual++;
			if($dia_actual>$dia_max) {
				//echo'<script>alert("'.$dia_max.'");</script>';
				$max_mes=1;
			}
		}
		echo"</tr>";		
		if($max_mes==0){
			echo"<tr>";	
		}		
	}
	echo "</table><br>";

?>