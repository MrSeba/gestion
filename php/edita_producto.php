<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion,"SELECT * FROM supplier WHERE supplierID = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['supplierRut'], 
				1 => $valores2['supplierName'], 
				2 => $valores2['supplierDescrip'], 
				);
echo json_encode($datos);
?>