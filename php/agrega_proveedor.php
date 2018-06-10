<?php
include('conexion.php');
$id = $_POST['id-prov'];
$proceso = $_POST['pro'];
$rutprov= $_POST['rut'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descrip'];
$estado = "1";

//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		$sql="INSERT INTO supplier (supplierRut, supplierName, supplierDescrip, supplierStatus, process) VALUES ('$rutprov','$nombre','$descripcion','$estado', '$proceso')";
		
		$result = mysqli_query($conexion,"SELECT * FROM supplier WHERE supplierRut='$rutprov'"); 
        echo mysqli_num_rows($result);
		if (mysqli_num_rows($result)>0)
		{
			    echo"	<script>alert('Registro ya existe')</script>";
		} else {
			mysqli_query($conexion,$sql);
            
		
		}



		
	




	break;
		/*$res= mysqli_query($conexion,"SELECT COUNT() from supplier where supplierRut='$rutprov'");
		echo $res;
		if($res>0){
			echo "Posee Registro";
			break;
		}else {
        mysqli_query($conexion,"INSERT INTO supplier (supplierRut, supplierName, supplierDescrip, supplierStatus, process)VALUES('$rutprov','$nombre','$descripcion','$estado', '$proceso')");
        	break;
		}*/
		
	case 'Edicion':
	/*	$sql2="UPDATE supplier SET supplierRut = '$rutprov', supplierName = '$nombre', supplierDescrip = '$descripcion' , process = '$proceso' WHERE supplierID = '$id'";*/
	$sql2="UPDATE `supplier` SET supplierRut='".$rutprov."', supplierName ='".$nombre."', supplierDescrip='".$descripcion."', process='".$proceso."' WHERE supplierID='".$id."'";
		mysqli_query($conexion,$sql2);
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM supplier ORDER BY supplierID ASC");

//CREAMOS NUESTRA VISTA YX LA DEVOLVEMOS AL AJA

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