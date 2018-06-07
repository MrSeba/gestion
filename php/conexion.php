<?php
//$conexion = mysqli_connect('127.0.0.1','root','', 'tienda');
$conexion = mysqli_connect('127.0.0.1','root' ,'','contabilidad');
//mysql_select_db('contabilidad', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>