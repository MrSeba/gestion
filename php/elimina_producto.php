<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion, "DELETE FROM supplier WHERE supplierID = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion, "SELECT * FROM supplier ORDER BY supplierID ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="50">#</th>
                <th width="80">R.U.T</th>
                <th width="150">Nombre</th>
                <th width="150">Descripcion</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['supplierID'].'</td>
				<td>'.$registro2['supplierRut'].'</td>
				<td>'.$registro2['supplierName'].'</td>
				<td>'.$registro2['supplierDescrip'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['supplierID'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['supplierID'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>