<?php
//Conexion para laboratorio
/*
$hostDB="vulcano.tel.uva.es";
$loginDB="ldst004";
$passDB="ct528w9a";
$nameDB="ldst004";
$dB=mysql_pconnect($hostDB,$loginDB,$passDB);
*/
//Conexion para casa

$hostDB="localhost";
$loginDB="root";
$nameDB="ldst004";
$dB=mysql_pconnect($hostDB,$loginDB);

/*Comprobamos que no haya ningun error al conectar con la base*/
if(!$dB){
	echo "Error al conectarse a la Base de Datos";
	exit();
}
mysql_select_db($nameDB); //Use de SQL
?>