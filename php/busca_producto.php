<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM supplier WHERE supplierName LIKE '%$dato%' OR supplierDescrip LIKE '%$dato%' ORDER BY supplierID ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="50">#</th>
                <th width="80"> R.U.T</th>
                <th width="150"> Nombre</th>
                <th width="150"> Descripcion</th>
				<th width="50"> Opciones</th>
            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['supplierID'].'</td>
				<td>'.$registro2['supplierRut'].'</td>
				<td>'.$registro2['supplierName'].'</td>
				<<td>'.$registro2['supplierDescrip'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['supplierID'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['supplierID'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="4">No se encontraron resultados</td>
		  </tr>';
}
echo '</table>';
?>