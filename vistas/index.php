<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<script src="../js/validarRUT.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <header>Sistema de Facturas</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Busca un producto por: Nombre o Tipo" id="bs-prod"/></td>
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
                <th width="150">Fecha Registro</th>
                <th width="50">Opciones</th>

            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysqli_query($conexion,"SELECT * FROM productos"); 
            while($registro2 = mysqli_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nomb_prod'].'</td>
                        <td>'.$registro2['tipo_prod'].'</td>
                        <td>S/. '.$registro2['precio_unit'].'</td>
                        <td>S/. '.$registro2['precio_dist'].'</td>
                        <td>'.fechaNormal($registro2['fecha_reg']).'</td>
                        <td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro(rut);">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prov" name="id-prov" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                        <td>*Rut Proveedor: </td>
                        <td><input type="text" id="rut" name="rut" required="required" oninput="checkRut(this)" placeholder="INGRESE RUT PROVEEDOR"></td>
                    </tr>
                    <tr>
                    	<td>*Nombre Proveedor: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                        <td>Descripción: </td>
                        <td><textarea  name="descrip" id="descrip" row="10" cols="40" maxlength="400"></textarea> </td>
                    </tr>
                    
                   
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registro" class="btn btn-success" id="reg" />
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                
            </div>
            </form>
          </div>
        </div>
      </div>
      

</body>
</html>
