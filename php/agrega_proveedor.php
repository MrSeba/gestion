<?php
include('conexion.php');
$id = $_POST['id-prov'];
$rutprov= $_POST['rut'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$decripcion = $_POST['descrip'];
$estado = "1";

//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		$res= mysqli_query($conexion,"SELECT COUNT(supplierRut) from supplier where supplierRut=$rut prov");
		if($res>0){
			echo "Posee Registro";
			break;
		}else {
        mysqli_query($conexion,"INSERT INTO supplier (supplierRut, supplierName, )VALUES('$nombre','$tipo','$precio_uni','$precio_dis', '$fecha')");
        	break;
		}
		
	
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE productos SET nomb_prod = '$nombre', tipo_prod = '$tipo', precio_unit = '$precio_uni', precio_dist = '$precio_dis' WHERE id_prod = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA YX LA DEVOLVEMOS AL AJA

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
				<td>'.$registro2['tipo_prod'].'</td>
				<td>S/. '.$registro2['precio_unit'].'</td>
				<td>S/. '.$registro2['precio_dist'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>