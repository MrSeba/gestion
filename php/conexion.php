<?php
$conexion = mysqli_connect('127.0.0.1','root','', 'tienda');

//mysql_select_db('tienda', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>